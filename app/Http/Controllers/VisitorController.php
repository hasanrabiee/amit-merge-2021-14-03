<?php

namespace App\Http\Controllers;

use App\AdminChat;
use App\booth;
use App\Meeting;
use App\MeetingRequest;
use App\Site;
use App\Statistics;
use App\Traits\Uploader;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class VisitorController extends Controller
{
    use Uploader;

    public function join_meeting($meeting){



        $meeting = Meeting::where('meeting_id', $meeting)->first();

        if($meeting->is_started == false){

            Alert::error('Meeting Not Started yet');
            return redirect()->back();
        }

        $role = 1;

        return view('zoom.start', compact('meeting', 'role'));


    }


    public function leave_meeting(){


    }




    public function MeetingScheduleIndex($company_id){




        $available_meetings = [];


        $already_requested_meeting = MeetingRequest::where('user_id', Auth::user()->id)->where('exhibitor_id', $company_id)->orderBy('id','DESC')->first();

        if($already_requested_meeting != null && $already_requested_meeting->status == 'none'){

            $message = "You're request is being checked by the company ";

            return view('Visitor.alreadyRequestedMeeting')->with(['message'=>$message]);

        }
        elseif($already_requested_meeting != null && $already_requested_meeting->status == 'accepted'){

            $message = "You've been accepted for your meeting, go to your dashboard";

            return view('Visitor.alreadyRequestedMeeting')->with(['message'=>$message]);

        }


        if(\request()->has('Day')){





        $available_meetings = Meeting::where('owner_id', $company_id)
            ->where('type','meeting')
            ->whereDate( 'start_time', Carbon::parse(\request()->Day)->format('Y-m-d') )
            ->where('reserved', false)->get(['start_time']);


        }


        if (\request()->exists('time') && \request()->exists('Day')) {


            $meet_req = new MeetingRequest();
            $meet_req->user_id = Auth::user()->id;
            $the_date = Carbon::parse(\request()->Day . ' ' . \request()->time)->format('Y-m-d H:i:s');
            $meet_req->request_time = $the_date;
            $meet_req->exhibitor_id = (int)$company_id;
            $meet_req->status = 'none';
            $meet_req->save();


            return redirect()->back();



        }



        $StartDate = Site::find(1)->StartDate;
        $Days = [];
        for ($i = 0; $i < 10; $i++) {
            $Days[] = Carbon::parse($StartDate)->format('Y-m-d');
            $StartDate = Carbon::parse($StartDate)->addDay();
        }


        $intervals = CarbonInterval::minutes(30)->toPeriod('09:00', '17:00');
        $times = [];
        foreach ($intervals as $date) {
            $times[] = $date->format('H:i');
        }









        return view('Visitor.requestMeeting')->with([
            'Days' => $Days,
            'times' => $available_meetings,
        ]);
    }



    public function MeetingsIndex(Request $request){


        $meetings_request = [];

        if($request->has('search')){

            $searchTerm = $request->has('search');

            $booths = booth::where('CompanyName', 'LIKE', "%{$searchTerm}%")->get(['id']);

            $booths_id = [];
            foreach ($booths as $booth){
                $booths_id[] = $booth->id;
            }


            $meetings_request = MeetingRequest::where('user_id', Auth::user()->id)->whereIn('exhibitor_id', $booths_id )->get();


        }else{

            $meetings_request = MeetingRequest::where('user_id', Auth::user()->id)->get();


        }


        $selected_meeting = [];
        $selected_company = [];
        $meeting_exhibitor = [];

        if(\request()->has('rid')){


            $selected_meeting = MeetingRequest::where('id', $request->rid)->first();

            $meeting_exhibitor = Meeting::where('reserved_by', Auth::user()->id)
                ->whereDate('start_time', Carbon::parse($selected_meeting->request_time)->toDateString())
                ->whereTime('start_time', Carbon::parse($selected_meeting->request_time)->toTimeString())
                ->first();






            $selected_company = \App\booth::where('UserID', $selected_meeting->exhibitor_id)->first();



        }





        return view('Visitor.meeting')->with([

            'meetings' => $meetings_request,

            'selected_meeting' => $selected_meeting,
            'selected_company' => $selected_meeting,
            'meeting_exhibitor' => $meeting_exhibitor,



        ]);
    }

    public function __construct()
    {
        $this->middleware('verified');
    }


    public function Resume(Request $request)
    {


        $this->validate($request,
            [
                'resume' => 'required|mimes:pdf'
            ]
        );


        $user = Auth::user();
        $user->resume = $request->hasFile('resume') ? $this->S3Doc($request, 'resume') : $user->resume;

        $user->save();

        Alert::success('Ok');
        return redirect()->back();


    }


    public function index()
    {
        return view('Visitor.index');
    }

    public function UpdateAvatar(Request $request)
    {
        $request->validate([
            'Avatar' => 'image|required'
        ]);
        $User = Auth::user();
        $User->Image = $this->UploadPic($request, 'Avatar', 'UserProfiles', 'Profile');
        $User->save();
        return redirect()->back();
    }

    public function ChangePassword(Request $request)
    {
        $request->validate([
            'OldPassword' => 'required',
            'password' => 'required|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*]).*$/',
        ]);
        if (Hash::check($request->OldPassword, Auth::user()->password)) {
            Auth::user()->password = Hash::make($request->password);
            Auth::user()->save();
            Auth::logout();
            Alert::success('Password Changed Successfully');

            return redirect()->route('login');
        }
        return redirect()->back();


    }

    public function VisitExperience(Request $request)
    {
        $request->validate([
            'VisitExperience' => 'required|string'
        ]);
        Auth::user()->VisitExperience = $request->VisitExperience;
        Auth::user()->save();
        return redirect()->back();
    }


    public function VisitHistory()
    {
        $Statistic = Statistics::where('UserID', Auth::id())->get();
        $Booths = [];
        $uniques = array();
        foreach ($Statistic as $obj) {
            $uniques[$obj->BoothID] = $obj;
        }
        foreach ($uniques as $item) {


            $Booths[] = booth::find($item->BoothID);
        }

        if (\request()->CompanyID) {
            $Booth = booth::find(\request()->CompanyID);
            return view('Visitor.VisitHistory')->with(['Booths' => $Booths, 'Booth' => $Booth]);
        }

        if (\request()->search) {

            $search_booths = [];

            foreach ($Booths as $one_booth) {

                if (Str::contains($one_booth->CompanyName, \request()->search)) {

                    $search_booths[] = $one_booth;

                }


            }

            return view('Visitor.VisitHistory')->with(['Booths' => $search_booths]);


        }


        return view('Visitor.VisitHistory')->with(['Booths' => $Booths]);
    }


    public function Payment()
    {
        return view('Visitor.Payment');
    }

    public function Contact()
    {
        $Chats = AdminChat::where('ReceiverID', Auth::id())->get();
        return view('Visitor.ContactUs')->with(['Chats' => $Chats]);
    }

    public function ChatGet()
    {
        $Chats = AdminChat::where('ReceiverID', Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ], 200);
    }

    public function Chat(Request $request)
    {
        $request->validate([
            'Text' => ['required', 'max:255']
        ]);
        $Owner = User::where(['Rule' => 'Admin-Operator', 'ChatMode' => 'Available'])->orderBy('ActiveSlave', 'ASC')->first();
        if ($Owner == null) {
            $Owner = User::where('Rule', 'Admin')->get()[0]->id;
        } else {
            $Owner->ActiveSlave = $Owner->ActiveSlave + 1;
            $Owner->save();
            $Owner = $Owner->id;
        }
        AdminChat::create([
            'Text' => $request->Text,
            'UserID' => $Owner,
            'ReceiverID' => Auth::id(),
            'Sender' => 'Visitor',
        ]);
        $Chats = AdminChat::where('ReceiverID', Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ], 200);
    }
}
