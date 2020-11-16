<?php

namespace App\Http\Controllers;

use App\AdminChat;
use App\Auditorium;
use App\AuditoriumChat;
use App\booth;
use App\Chat;
use App\Exports\AuditoriumExport;
use App\Hall;
use App\Invitation;
use App\Jobs;
use App\Lounge;
use App\LoungeChat;
use App\Mail\AuditoriumPublish;
use App\Mail\InviteOperators;
use App\Mail\SpeakerRegister;
use App\Site;
use App\Speaker;
use App\Statistics;
use App\Traits\Uploader;
use App\User;
use Carbon\Carbon;
use DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Response;
use \Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    use Uploader;


    public function CompanyList()
    {
        if (\request()->SearchTermBooth) {

            $Booths = booth::select('id', "UserID", "CompanyName")->where('CompanyName', 'LIKE', '%' . \request()->SearchTermBooth . '%')->get();
        } else {
            $Booths = booth::select('id', "UserID", "CompanyName")->get();
        }
        return response()->json([
            'Booths' => $Booths
        ], 200);
    }

    public function ChangeChatStatus(Request $request)
    {
        if ($request->ID && $request->UserID) {
            $Chatsssss = AdminChat::where('UserID', $request->UserID)->where('ReceiverID', $request->ID)->get();

            foreach ($Chatsssss as $ch) {
                $ch->Status = 'Viewed';
                $ch->save();
            }
            return response()->json([
                'msg' => 'Done'
            ], 200);
        } else {
            return response()->json([
                'msg' => 'Error'
            ], 200);

        }
    }

    public static function ChatCount($id)
    {
        $Count = AdminChat::where([
            ['ReceiverID', $id],
            ['Status', 'New'],
        ])->count();
        //$Count = AdminChat::where('ReceiverID', $id)->where('Status', 'New')->count();
        if ($Count > 0) {
            return $Count;
        } else {
            return 0;
        }
        // return AdminChat::where('ReceiverID', $id)->where('Status', 'New')->count();
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->SearchTermBooth)
                $booth_list = booth::select('id', "UserID", "CompanyName")->where('CompanyName', 'LIKE', '%' . \request()->SearchTermBooth . '%')->paginate(10);
            else
                $booth_list = booth::select('id', "UserID", "CompanyName")->paginate(10);
            $booth_list_view = view('company-list-data', compact('booth_list'))->render();

            if ($request->SearchTermUser)
                $users_list = User::select("id", "UserName")->where('UserName', 'LIKE', '%' . \request()->SearchTermUser . '%')->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->paginate(10);
            else
                $users_list = User::select("id", "UserName")->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->paginate(10);
            $users_list_view = view('user-list-data', compact('users_list'))->render();
            return response()->json(['booth_list' => $booth_list_view, 'users_list' => $users_list_view]);

        }


        if (\request()->CompanyID) {
            $ID = booth::find(\request()->CompanyID)->UserID;
            $Chats = AdminChat::where('UserID', Auth::id())->where('ReceiverID', $ID)->get();
            $Chatsssss = AdminChat::where([
                ['ReceiverID', $ID],
                ['Status', 'New'],
            ])->get();
            foreach ($Chatsssss as $ch) {

                $ch->Status = 'Viewed';

                $ch->save();
            }

            $selected_booth = booth::select('id', "UserID", "CompanyName")->where("id", \request()->CompanyID)->first();
            $booth_list = booth::select('id', "UserID", "CompanyName")->where("id", "!=", \request()->CompanyID)->paginate(10);


            $collection = collect();

            $collection->push($selected_booth);


            foreach ($booth_list as $bl)
                $collection->push($bl);

            $booth_list = $collection;


        } else {

            if (\request()->SearchTermBooth) {
                $booth_list = booth::where('CompanyName', 'LIKE', '%' . \request()->SearchTermBooth . '%')->get(['id', "UserID", "CompanyName"]);
            } else {
                $booth_list = booth::select('id', "UserID", "CompanyName")->paginate(10);

            }

        }


        if (\request()->UserID) {
            $Chats = AdminChat::where('UserID', Auth::id())->where('ReceiverID', \request()->UserID)->get();
            $Chatsssss = AdminChat::where([
                ['ReceiverID', \request()->UserID],
                ['Status', 'New'],
            ])->get();
            foreach ($Chatsssss as $chatsssss) {
                $chatsssss->Status = 'Viewed';
                $chatsssss->save();
            }


            $users_list = User::select("id", "UserName")->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->where('id', '!=', \request()->UserID)->paginate(10);
            $selected_user = User::select("id", "UserName")->where("id", \request()->UserID)->first();


            $collection = collect();

            $collection->push($selected_user);


            foreach ($users_list as $ul)
                $collection->push($ul);

            $users_list = $collection;


        } else {

            if (\request()->SearchTermUser) {

                $users_list = User::where('UserName', 'LIKE', '%' . \request()->SearchTermUser . '%')->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->get(["id", "UserName"]);


            } else {
                $users_list = User::select("id", "UserName")->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->paginate(10);

            }


        }


        if (isset($Chats))

            return view('Admin.index', compact('booth_list', 'users_list', 'Chats'));
        else
            return view('Admin.index', compact('booth_list', 'users_list'));


    }


    public function UserList()
    {


        if (\request()->SearchTermUser) {
            $Users = User::select("id", "UserName")->where('UserName', 'LIKE', '%' . \request()->SearchTermUser . '%')->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->get();


        } else {
            $Users = User::select("id", "UserName")->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->get();
        }
        return response()->json([
            'Users' => $Users
        ], 200);
    }

    public function InboxChatGet(Request $request)
    {
        $request->validate([
            'Mode' => ['required'],
            'ID' => ['required'],
            'UserID' => ['required'],
        ]);
        if ($request->Mode == 'Company') {
            $ID = booth::find($request->ID)->UserID;
        } else {
            $ID = $request->ID;
        }
        $Chats = AdminChat::where('ReceiverID', $ID)->get();
        return response()->json([
            'Chat' => $Chats
        ], 200);
    }


    public function SendMessage(Request $request)
    {
        $request->validate([
            'Text' => ['required', 'max:255'],
            'UserID' => ['required'],
            'ID' => ['required'],
        ]);
        if ($request->Mode == 'Company') {
            $ID = booth::find($request->ID)->UserID;
        } else {
            $ID = $request->ID;
        }
        AdminChat::create([
            'Text' => $request->Text,
            'UserID' => $request->UserID,
            'ReceiverID' => $ID,
            'Sender' => 'Admin',
            'Status' => 'Viewed'
        ]);
        $Chats = AdminChat::where('ReceiverID', $ID)->get();
        return response()->json([
            'Chat' => $Chats
        ], 200);
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
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function UserPaid(Request $request)
    {
        $User = User::find($request->UserID);

        if ($User->Payment == 'Paid') {
            $User->Payment = 'UnPaid';
            $User->AccountStatus = 'Suspend';
        } else {
            $User->Payment = 'Paid';
            $User->AccountStatus = 'Active';
        }
        $User->save();
        Alert::success('Changes Saved');
        return redirect()->back();
    }

    public function BackUp()
    {
        Artisan::call('backup:run');
        Alert::success('BackUp Created Successfully');
        return redirect()->back();
    }


    public function Export(){


        return Excel::download(new UsersExport, 'users.xlsx');



    }

    public function Restore()
    {
        //Final need Restore
    }


    public function Reset()
    {
        File::cleanDirectory(public_path('Uploads'));
        foreach (LoungeChat::all() as $item) {
            $item->delete();
        }
        foreach (Lounge::all() as $item) {
            $item->delete();
        }
        foreach (Chat::all() as $item) {
            $item->delete();
        }
        foreach (Statistics::all() as $item) {
            $item->delete();
        }
        foreach (Jobs::all() as $item) {
            $item->delete();
        }
        foreach (booth::all() as $item) {
            $item->delete();
        }
        foreach (User::all() as $item) {
            if ($item->Rule != 'Admin') {
                $item->delete();
            }
        }
        Alert::success('Site Reset SuccessFull');


        return redirect()->back();
    }


    public function History()
    {
        if (\request()->SearchTermBooth) {
            $Booths = booth::where('CompanyName', 'LIKE', '%' . \request()->SearchTermBooth . '%')->get();
        } else {
            $Booths = booth::all();
        }

        if (\request()->SearchTermUser) {
            $User = User::where('UserName', 'LIKE', '%' . \request()->SearchTermUser . '%')->whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->get();
        } else {
            $User = User::whereIn('Rule', ['Visitor', 'Exhibitor-Operator'])->get();
        }


        if (\request()->CompanyID) {
            $ID = booth::find(\request()->CompanyID)->UserID;
            $Chats = AdminChat::where('UserID', Auth::id())->where('ReceiverID', $ID)->get();
            return view('Admin.History')->with(['Booths' => $Booths, 'Chats' => $Chats, 'Users' => $User]);
        }
        if (\request()->UserID) {
            $Chats = AdminChat::where('UserID', Auth::id())->where('ReceiverID', \request()->UserID)->get();

            return view('Admin.History')->with(['Booths' => $Booths, 'Chats' => $Chats, 'Users' => $User]);
        }

        return view('Admin.History')->with(['Booths' => $Booths, 'Users' => $User]);
    }

    public function Lounge()
    {
        $Lounges = Lounge::all();
        if (\request()->LoungID) {
            $Lounge = Lounge::find(\request()->LoungID);
            $Chats = LoungeChat::where('LoungeID', \request()->LoungID)->get();
            return view('Admin.Lounge')->with(['Lounges' => $Lounges, 'Lounge' => $Lounge, 'Chats' => $Chats]);
        }
        if (\request()->RemoveUser) {
            $Lounge = Lounge::find(\request()->LoungeID);
            $Members = json_decode($Lounge->Members);
            if (($key = array_search(\request()->RemoveUser, $Members)) !== false) {
                unset($Members[$key]);
            }
            $Lounge->Members = $Members;
            $Lounge->save();
            Alert::success('Member Removed From Lounge  Created!!!');

            return redirect()->back();
        }
        return view('Admin.Lounge')->with(['Lounges' => $Lounges]);
    }


    public function SendMessagetoLounge($LoungeID, Request $request)
    {
        $request->validate([
            'Text' => ['required', 'max:255']
        ]);
        LoungeChat::create([
            'UserID' => Auth::id(),
            'LoungeID' => $LoungeID,
            'Text' => $request->Text
        ]);

        return redirect()->back();

    }

    public function CreateLounge(Request $request)
    {
        $request->validate([
            'Name' => 'required|string',
        ]);
        $Members = [Auth::id()];

        Lounge::create([
            'Name' => $request->Name,
            'Members' => json_encode($Members)
        ]);
        Alert::success('Lounge  Created!!!');

        return redirect()->back();
    }

    public function RemoveLounge($id)
    {
        $Lounge = Lounge::find($id);
        $Lounge->delete();
        Alert::success('Lounge  Removed!!!');

        return redirect()->route('Admin.Lounge');
    }

    public function RemoveLoungeWithUrl($id)
    {
        $Lounge = Lounge::find($id);
        $Lounge->delete();
        Alert::success('Lounge  Removed!!!');

        return redirect()->back();
    }


    public function RemoveExhibitor($id)
    {
        $Booth = booth::find($id);
        $User = User::find($Booth->UserID);
        $Users = User::where('CompanyID', $Booth->id)->get();
        foreach ($Users as $user) {
            $user->delete();
        }
        $Booth->delete();
        $User->delete();
        Alert::success('Exhibitor  Removed!!!');

        return redirect()->route('Admin.RegisteredExhibitor');
    }

    public function Statistics()
    {
        $Date = Statistics::groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                \DB::raw('Date(created_at) as date'),
                \DB::raw('COUNT(*) as "views"')
            ));
        $Company = Statistics::limit(9)->groupBy('BoothID')
            ->orderBy('BoothID', 'ASC')
            ->get(array(
                \DB::raw('BoothID'),
                \DB::raw('COUNT(*) as "views"'),
            ));
        $Profession = Statistics::groupBy('Profession')
            ->orderBy('Profession', 'ASC')
            ->get(array(
                \DB::raw('Profession'),
                \DB::raw('COUNT(*) as "views"'),
            ));
        $Gender = Statistics::groupBy('Gender')
            ->orderBy('Gender', 'ASC')
            ->get(array(
                \DB::raw('Gender'),
                \DB::raw('COUNT(*) as "views"'),
            ));
        $AllCompany = Statistics::groupBy('BoothID')
            ->orderBy('BoothID', 'ASC')
            ->get(array(
                \DB::raw('BoothID'),
                \DB::raw('COUNT(*) as "views"'),
            ));

        $AllGroups = Lounge::all();

        return view('Admin.statistics')->with([
            'Company' => $Company,
            'Gender' => $Gender,
            'Profession' => $Profession,
            'Date' => $Date,
            'AllCompany' => $AllCompany,
            'AllGroups' => $AllGroups
        ]);
    }

    public function Auditorium()
    {

        $StartDate = Site::find(1)->StartDate;
        $Days = [];
        for ($i = 0; $i < 10; $i++) {
            $Days[] = Carbon::parse($StartDate)->format('Y-m-d');
            $StartDate = Carbon::parse($StartDate)->addDay();
        }
        if (\request()->Day) {
            $Day = \request()->Day;
            $Speakers = Speaker::where('Status', 'None')->get();
            $Speakers2 = Speaker::where('Status', 'None')->where('PreferredDate1', $Day)
                ->orWhere('PreferredDate2', $Day)
                ->orWhere('PreferredDate3', $Day)->get();
            $RegisteredSpeakers = Auditorium::where('Day', $Day)->get();
            return view('Admin.Auditorium')->with(['Speakers2' => $Speakers2 ,'Days' => $Days, 'Day' => $Day, 'Speakers' => $Speakers, 'RegisteredSpeakers' => $RegisteredSpeakers]);
        }
        return view('Admin.Auditorium')->with(['Days' => $Days]);
    }

    public function SpeakerPost(Request $request)
    {
        $request->validate([
            'Name' => 'required|string',
            'email' => 'required|string|unique:speakers',
            'UserName' => 'required|string|unique:speakers',
            'password' => 'required|string|min:8|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*]).*$/',
            'SpeechTitle' => 'required|string',
            'Day' => 'required|date',
        ]);

        $Speaker = Speaker::create([
            'Name' => $request->Name,
            'email' => $request->email,
            'UserName' => $request->UserName,
            'password' => $request->password,
            'SpeechTitle' => $request->SpeechTitle,
            'PreferredDate1' => $request->Day
        ]);

        $data = [
            'Name' => $request->Name,
            'email' => $request->email,
            'UserName' => $request->UserName,
            'password' => $request->password,
            'Speech Title' => $request->SpeechTitle,
            'Speach Date' => $request->Day
        ];
        Mail::to($Speaker->email)->send(new SpeakerRegister($data));

        Alert::success('Speaker Saved Successful');

        return redirect()->back();


    }

    public function RemoveSpeaker($id)
    {


        $Auditorium = Auditorium::where('SpeakerID', $id)->get()[0];
        $chats = AuditoriumChat::where('auditoriaID', $Auditorium->id)->get();
        foreach ($chats as $chat) {
            $chat->delete();
        }
        $Auditorium->delete();
        $Speaker = Speaker::find($id);
        $Speaker->Status = 'none';
        $Speaker->save();
        Alert::success('Speaker removed Successfully');
        return redirect()->back();


    }


    public function AuditoriumExport()
    {
        return Excel::download(new AuditoriumExport, 'FinalTable.xlsx');
    }

    public function AuditoriumPublish()
    {
        Excel::store(new AuditoriumExport(), 'FinalTableExport.xlsx', 'Export');
        $Users = User::all();

        foreach ($Users as $user) {
            Jobs\SendPublishEmail::dispatch($user->email);
        }
        $Auditoria = Auditorium::all();

        foreach ($Auditoria as $user) {


            $Speaker = Speaker::find($user->SpeakerID);

            if ($Speaker->email) {
                $data = [
                    'Name' => $Speaker->SpeakerName,
                    'UserName' => $Speaker->SpeakerUserName,
                    'password' => $Speaker->password,
                    'Speech Title' => $Speaker->SpeechTitle,
                    'Speaker Name' => $Speaker->SpeakerName,
                    'email' => $Speaker->email,
                    'Start' => $user->Start,
                    'End' => $user->End,
                    'Day' => $user->Day,
                ];
                Jobs\publishforspeaker::dispatch($data);
            }


        }
        Alert::success('Sending emails Started');
        unlink(public_path('Export/FinalTableExport.xlsx'));
        return redirect()->back();


    }

    public function AuditoriumPost(Request $request)
    {
        $request->validate([
            'Start' => 'required|date_format:H:i',
            'End' => 'required|date_format:H:i',
            'SpeakerID' => 'required',
            'Day' => 'required|date'
        ]);
        $Start = Carbon::parse($request->Start)->format('H:i');
        $End = Carbon::parse($request->End)->format('H:i');
        if ($Start > $End) {
            return redirect()->back()->withErrors(['Msg' => 'the end must be after start']);
        }

        Auditorium::create([
            'Start' => $request->Start,
            'End' => $request->End,
            'SpeakerID' => $request->SpeakerID,
            'Status' => 'Incoming',
            'Day' => $request->Day
        ]);
        $Speaker = Speaker::find($request->SpeakerID);
        $Speaker->Status = 'Selected';
        $Speaker->save();
        $data = [
            'Start Time' => $request->Start,
            'End Time' => $request->End,
            'Day' => $request->Day,
        ];
        Mail::to($Speaker->email)->send(new \App\Mail\Speaker($data));
        Alert::success('Speak Saved Successful');

        return redirect()->back();
    }

    public function RegisteredVisitor()
    {
        if (\request()->SearchTerm) {
            $Users = User::where('Rule', 'Visitor')->where('UserName', 'LIKE', '%' . \request()->SearchTerm . '%')->get();

        } else {
            $Users = User::where('Rule', 'Visitor')->get();
        }
        if (\request()->UserID) {
            $User = User::find(\request()->UserID);
            return view('Admin.visitors')->with(['Users' => $Users, 'User' => $User]);

        }
        return view('Admin.visitors')->with(['Users' => $Users]);
    }

    public function RegisteredExhibitor()
    {
        if (\request()->SearchTerm) {
            $Booths = booth::where('CompanyName', 'LIKE', '%' . \request()->SearchTerm . '%')->get();

        } else {
            $Booths = booth::all();
        }
        if (\request()->BoothID) {
            $Booth = booth::find(\request()->BoothID);
            return view('Admin.exhibitors')->with(['Booths' => $Booths, 'Booth' => $Booth]);
        }
        return view('Admin.exhibitors')->with(['Booths' => $Booths]);
    }

    public function Setting()
    {
        if (\request()->DeleteOperator) {
            $User = User::find(\request()->DeleteOperator);
            $User->delete();
            Alert::success('Operator Deleted');
            return redirect()->back();
        }

        $Site = Site::find(1);
        $Operators = User::where('Rule', 'Admin-Operator')->get();
        $Backups = File::allFiles(public_path('BackUp'));
        //dd();
        //dd($Backups[0]->getrelativePathname());
        return view('Admin.Setting')->with(['Site' => $Site, 'Operators' => $Operators, 'Backups' => $Backups]);
    }

    public function SettingPost(Request $request)
    {

        $request->validate([
            'Logo1' => 'image',
            'StartDate' => 'string',
            'Logo2' => 'image',
            'Logo3' => 'image',
            'AdminBackground' => 'image',
            'Terms' => 'string',
            'AdminTel' => 'string',
            'AdminLocation' => 'string',
            'AdminAddress' => 'string',
            'OperatorEmails' => 'array',
            'SiteName' => 'string'
        ]);
        try {
            $Site = Site::find(1);
            $Site->Terms = $request->Terms;

            $Site->Logo1 = $request->hasFile('Logo1') ? $this->S3Setting($request, 'Logo1') : $Site->Logo1;
            $Site->Logo2 = $request->hasFile('Logo2') ? $this->S3Setting($request, 'Logo2') : $Site->Logo2;
            $Site->Logo3 = $request->hasFile('Logo3') ? $this->S3Setting($request, 'Logo3') : $Site->Logo3;
            $Site->AdminBackground = $request->hasFile('AdminBackground') ? $this->S3Setting($request, 'AdminBackground') : $Site->AdminBackground;
            $Site->AdminTel = $request->AdminTel;
            $Site->StartDate = $request->StartDate;
            $Site->AdminLocation = $request->AdminLocation;
            $Site->AdminAddress = $request->AdminAddress;
            $Site->Name = $request->SiteName;
            if ($request->OperatorEmails[0] != null) {
                foreach ($request->OperatorEmails as $operatorEmail) {
                    $Invite = Invitation::create([
                        'email' => $operatorEmail,
                        'token' => Str::random(20),
                        'Rule' => 'AdminOperator',
                        'ParentID' => Auth::id()
                    ]);
                    Mail::to($operatorEmail)->send(new InviteOperators(route('OperatorRegister', $Invite->token)));

                }
            }

            $Site->StreamKey = $request->StreamKey;
            $Site->RtmpAddress = $request->RtmpAddress;
            $Site->PlaybackUrl = $request->PlaybackUrl;
            $Site->save();
            Alert::success('Settings Saved Successful');

            return redirect()->back();
        } catch (\Exception $exception) {
            Alert::error('Please Try Again');

            return redirect()->back();
        }
    }

    public function Gallery()
    {
        $path = public_path('Uploads');
        $files = \File::allFiles($path);
        return view('Admin.Gallery')->with(['Files' => $files]);
    }

    public function Signin()
    {
        $Site = Site::find(1);
        return view('Admin.Signin')->with(['Site' => $Site]);
    }

    public function SigninPost(Request $request)
    {
        $request->validate([
            'ExhabitionTitle' => 'string|nullable',
            'SigninBackground' => 'image',
        ]);
        $Site = Site::find(1);
        $Site->ExhabitionTitle = $request->ExhabitionTitle == '' ? '' : $request->ExhabitionTitle;
        $Site->SigninBackground = $request->hasFile('SigninBackground') ? $this->S3Setting($request, 'SigninBackground') : $Site->SigninBackground;
        $Site->save();
        Alert::success('Settings Saved Successful');

        return redirect()->back();


    }


    public function VisitorSetting()
    {
        $Site = Site::find(1);
        return view('Admin.VisitorSetting')->with(['Site' => $Site]);
    }

    public function VisitorSettingPost(Request $request)
    {
        $request->validate([
            'VisitorBackGround' => 'image',
            'VisitorWelcome' => 'required|string',
            'VisitorAbout' => 'required|string',
            'VisitorProfession' => 'required|string',
            'VisitorAboutPayment' => 'required|string',
            'VisitorPayment' => 'required|integer',
            'VisitorGender' => 'required|string',
            'MoneyType' => 'required',
        ]);
        $Site = Site::find(1);
        $Site->VisitorBackGround = $request->hasFile('VisitorBackGround') ? $this->S3Setting($request, 'VisitorBackGround') : $Site->VisitorBackGround;
        $Site->VisitorWelcome = $request->VisitorWelcome;
        $Site->VisitorAbout = $request->VisitorAbout;
        $Site->VisitorProfession = $request->VisitorProfession;
        $Site->VisitorAboutPayment = $request->VisitorAboutPayment;
        $Site->VisitorPayment = $request->VisitorPayment;
        $Site->VisitorGender = $request->VisitorGender;
        $Site->MoneyType = $request->MoneyType;
        $Site->save();
        Alert::success('Settings Saved Successful');

        return redirect()->back();

    }


    public function ExhibitorSetting()
    {
        $Site = Site::find(1);
        return view('Admin.ExhibitorSetting')->with(['Site' => $Site]);
    }

    public function ExhibitorSettingPost(Request $request)
    {
        $request->validate([
            'ExhibitorBackGround' => 'image',
            'ExhibitorWelcome' => 'required|string',
            'ExhibitorAbout' => 'required|string',
            'ExhibitorAboutPayment' => 'required|string',
            'ExhibitorPayment' => 'required|integer',
            'ExhibitorMaximumOperator' => 'required|integer',
            'MoneyType' => 'required',
        ]);
        $Site = Site::find(1);
        $Site->ExhibitorBackGround = $request->hasFile('ExhibitorBackGround') ? $this->S3Setting($request, 'ExhibitorBackGround') : $Site->ExhibitorBackGround;
        $Site->ExhibitorWelcome = $request->ExhibitorWelcome;
        $Site->ExhibitorAbout = $request->ExhibitorAbout;
        $Site->ExhibitorAboutPayment = $request->ExhibitorAboutPayment;
        $Site->ExhibitorPayment = $request->ExhibitorPayment;
        $Site->ExhibitorMaximumOperator = $request->ExhibitorMaximumOperator;
        $Site->MoneyType = $request->MoneyType;
        $Site->save();
        Alert::success('Settings Saved Successful');

        return redirect()->back();

    }


    public function AppAdjustment()
    {
        return view('Admin.AppAdjustment');
    }

    public function AppAdjustmentPost(Request $request)
    {
        $request->validate([
            'Main1' => 'image',
            'Main2' => 'image',
            'Main3' => 'image',
            'Main4' => 'image',
            'Main5' => 'image',
            'Main6' => 'image',
            'Loby1' => 'image',
            'Loby2' => 'image',
            'Loby3' => 'image',
            'Loby4' => 'image',
            'Panposter1' => 'image',
            'Panposter2' => 'image',
            'Panposter3' => 'image',
            'Auditorium1' => 'image',
            'Auditorium2' => 'image',
            'Lounge1' => 'image',
            'Lounge2' => 'image',
            'Wallposter1' => 'image',
            'Wallposter2' => 'image',
            'Wallposter3' => 'image',
            'Wallposter4' => 'image',
            'Wallposter5' => 'image',
            'Wallposter6' => 'image',
            'Wallposter7' => 'image',
            'Wallposter8' => 'image',
            'Billboard1' => 'image',
            'Billboard2' => 'image',
            'Billboard3' => 'image',
            'Billboard4' => 'image',
            'Billboard5' => 'image',
            'Billboard6' => 'image',
            'Stand1' => 'image',
            'Stand2' => 'image',
            'Stand3' => 'image',
            'Stand4' => 'image',
            'Stand5' => 'image',
            'Stand6' => 'image',
            'Stand7' => 'image',
            'Rotationposter1' => 'image',
            'Rotationposter2' => 'image',
            'Rotationposter3' => 'image',
            'Rotationposter4' => 'image',
            'Rotationposter5' => 'image',
            'Rotationposter6' => 'image',
            'Rotationposter7' => 'image',
            'Rotationposter8' => 'image',
            'Rotationposter9' => 'image',
            'Rotationposter10' => 'image',
            'Rotationposter11' => 'image',
            'Rotationposter12' => 'image',
            'Rotationposter13' => 'image',
            'Rotationposter14' => 'image',
            'Rotationposter15' => 'image',
            'Rotationposter16' => 'image',
            'Rotationposter17' => 'image',
            'Rotationposter18' => 'image',
            'Rotationposter19' => 'image',
            'Rotationposter20' => 'image',
            'Rotationposter21' => 'image',
            'Rotationposter22' => 'image',
            'Rotationposter23' => 'image',
            'Rotationposter24' => 'image',
        ]);

        $Hall = Hall::find(1);

        $Hall->Main1 = $request->hasFile('Main1') ? $this->S3($request, 'Main1') : $Hall->Main1;

        $Hall->Main2 = $request->hasFile('Main2') ? $this->S3($request, 'Main2') : $Hall->Main2;
        $Hall->Main3 = $request->hasFile('Main3') ? $this->S3($request, 'Main3') : $Hall->Main3;
        $Hall->Main4 = $request->hasFile('Main4') ? $this->S3($request, 'Main4') : $Hall->Main4;
        $Hall->Main5 = $request->hasFile('Main5') ? $this->S3($request, 'Main5') : $Hall->Main5;
        $Hall->Main6 = $request->hasFile('Main6') ? $this->S3($request, 'Main6') : $Hall->Main6;
        $Hall->Loby1 = $request->hasFile('Loby1') ? $this->S3($request, 'Loby1') : $Hall->Loby1;
        $Hall->Loby2 = $request->hasFile('Loby2') ? $this->S3($request, 'Loby2') : $Hall->Loby2;
        $Hall->Loby3 = $request->hasFile('Loby3') ? $this->S3($request, 'Loby3') : $Hall->Loby3;
        $Hall->Loby4 = $request->hasFile('Loby4') ? $this->S3($request, 'Loby4') : $Hall->Loby4;
        $Hall->Auditorium1 = $request->hasFile('Auditorium1') ? $this->S3($request, 'Auditorium1') : $Hall->Auditorium1;
        $Hall->Auditorium2 = $request->hasFile('Auditorium2') ? $this->S3($request, 'Auditorium2') : $Hall->Auditorium2;
        $Hall->Lounge1 = $request->hasFile('Lounge1') ? $this->S3($request, 'Lounge1') : $Hall->Lounge1;
        $Hall->Lounge2 = $request->hasFile('Lounge2') ? $this->S3($request, 'Lounge2') : $Hall->Lounge2;
        $Hall->Wallposter1 = $request->hasFile('Wallposter1') ? $this->S3($request, 'Wallposter1') : $Hall->Wallposter1;
        $Hall->Wallposter2 = $request->hasFile('Wallposter2') ? $this->S3($request, 'Wallposter2') : $Hall->Wallposter2;
        $Hall->Wallposter3 = $request->hasFile('Wallposter3') ? $this->S3($request, 'Wallposter3') : $Hall->Wallposter3;
        $Hall->Wallposter4 = $request->hasFile('Wallposter4') ? $this->S3($request, 'Wallposter4') : $Hall->Wallposter4;
        $Hall->Wallposter5 = $request->hasFile('Wallposter5') ? $this->S3($request, 'Wallposter5') : $Hall->Wallposter5;
        $Hall->Wallposter6 = $request->hasFile('Wallposter6') ? $this->S3($request, 'Wallposter6') : $Hall->Wallposter6;
        $Hall->Wallposter7 = $request->hasFile('Wallposter7') ? $this->S3($request, 'Wallposter7') : $Hall->Wallposter7;
        $Hall->Wallposter8 = $request->hasFile('Wallposter8') ? $this->S3($request, 'Wallposter8') : $Hall->Wallposter8;
        $Hall->Billboard1 = $request->hasFile('Billboard1') ? $this->S3($request, 'Billboard1') : $Hall->Billboard1;
        $Hall->Billboard2 = $request->hasFile('Billboard2') ? $this->S3($request, 'Billboard2') : $Hall->Billboard2;
        $Hall->Billboard3 = $request->hasFile('Billboard3') ? $this->S3($request, 'Billboard3') : $Hall->Billboard3;
        $Hall->Billboard4 = $request->hasFile('Billboard4') ? $this->S3($request, 'Billboard4') : $Hall->Billboard4;
        $Hall->Billboard5 = $request->hasFile('Billboard5') ? $this->S3($request, 'Billboard5') : $Hall->Billboard5;
        $Hall->Billboard6 = $request->hasFile('Billboard6') ? $this->S3($request, 'Billboard6') : $Hall->Billboard6;
        $Hall->Stand1 = $request->hasFile('Stand1') ? $this->S3($request, 'Stand1') : $Hall->Stand1;
        $Hall->Stand2 = $request->hasFile('Stand2') ? $this->S3($request, 'Stand2') : $Hall->Stand2;
        $Hall->Stand3 = $request->hasFile('Stand3') ? $this->S3($request, 'Stand3') : $Hall->Stand3;
        $Hall->Stand4 = $request->hasFile('Stand4') ? $this->S3($request, 'Stand4') : $Hall->Stand4;
        $Hall->Stand5 = $request->hasFile('Stand5') ? $this->S3($request, 'Stand5') : $Hall->Stand5;
        $Hall->Stand6 = $request->hasFile('Stand6') ? $this->S3($request, 'Stand6') : $Hall->Stand6;
        $Hall->Stand7 = $request->hasFile('Stand7') ? $this->S3($request, 'Stand7') : $Hall->Stand7;
        $Hall->Panposter1 = $request->hasFile('Panposter1') ? $this->S3($request, 'Panposter1') : $Hall->Panposter1;
        $Hall->Panposter2 = $request->hasFile('Panposter2') ? $this->S3($request, 'Panposter2') : $Hall->Panposter2;
        $Hall->Panposter3 = $request->hasFile('Panposter3') ? $this->S3($request, 'Panposter3') : $Hall->Panposter3;
        $Hall->Rotationposter1 = $request->hasFile('Rotationposter1') ? $this->S3($request, 'Rotationposter1') : $Hall->Rotationposter1;
        $Hall->Rotationposter2 = $request->hasFile('Rotationposter2') ? $this->S3($request, 'Rotationposter2') : $Hall->Rotationposter2;
        $Hall->Rotationposter3 = $request->hasFile('Rotationposter3') ? $this->S3($request, 'Rotationposter3') : $Hall->Rotationposter3;
        $Hall->Rotationposter4 = $request->hasFile('Rotationposter4') ? $this->S3($request, 'Rotationposter4') : $Hall->Rotationposter4;
        $Hall->Rotationposter5 = $request->hasFile('Rotationposter5') ? $this->S3($request, 'Rotationposter5') : $Hall->Rotationposter5;
        $Hall->Rotationposter6 = $request->hasFile('Rotationposter6') ? $this->S3($request, 'Rotationposter6') : $Hall->Rotationposter6;
        $Hall->Rotationposter7 = $request->hasFile('Rotationposter7') ? $this->S3($request, 'Rotationposter7') : $Hall->Rotationposter7;
        $Hall->Rotationposter8 = $request->hasFile('Rotationposter8') ? $this->S3($request, 'Rotationposter8') : $Hall->Rotationposter8;
        $Hall->Rotationposter9 = $request->hasFile('Rotationposter9') ? $this->S3($request, 'Rotationposter9') : $Hall->Rotationposter9;
        $Hall->Rotationposter10 = $request->hasFile('Rotationposter10') ? $this->S3($request, 'Rotationposter10') : $Hall->Rotationposter10;
        $Hall->Rotationposter11 = $request->hasFile('Rotationposter11') ? $this->S3($request, 'Rotationposter11') : $Hall->Rotationposter11;
        $Hall->Rotationposter12 = $request->hasFile('Rotationposter12') ? $this->S3($request, 'Rotationposter12') : $Hall->Rotationposter12;
        $Hall->Rotationposter13 = $request->hasFile('Rotationposter13') ? $this->S3($request, 'Rotationposter13') : $Hall->Rotationposter13;
        $Hall->Rotationposter14 = $request->hasFile('Rotationposter14') ? $this->S3($request, 'Rotationposter14') : $Hall->Rotationposter14;
        $Hall->Rotationposter15 = $request->hasFile('Rotationposter15') ? $this->S3($request, 'Rotationposter15') : $Hall->Rotationposter15;
        $Hall->Rotationposter16 = $request->hasFile('Rotationposter16') ? $this->S3($request, 'Rotationposter16') : $Hall->Rotationposter16;
        $Hall->Rotationposter17 = $request->hasFile('Rotationposter17') ? $this->S3($request, 'Rotationposter17') : $Hall->Rotationposter17;
        $Hall->Rotationposter18 = $request->hasFile('Rotationposter18') ? $this->S3($request, 'Rotationposter18') : $Hall->Rotationposter18;
        $Hall->Rotationposter19 = $request->hasFile('Rotationposter19') ? $this->S3($request, 'Rotationposter19') : $Hall->Rotationposter19;
        $Hall->Rotationposter20 = $request->hasFile('Rotationposter20') ? $this->S3($request, 'Rotationposter20') : $Hall->Rotationposter20;
        $Hall->Rotationposter21 = $request->hasFile('Rotationposter21') ? $this->S3($request, 'Rotationposter21') : $Hall->Rotationposter21;
        $Hall->Rotationposter22 = $request->hasFile('Rotationposter22') ? $this->S3($request, 'Rotationposter22') : $Hall->Rotationposter22;
        $Hall->Rotationposter23 = $request->hasFile('Rotationposter23') ? $this->S3($request, 'Rotationposter23') : $Hall->Rotationposter23;
        $Hall->Rotationposter24 = $request->hasFile('Rotationposter24') ? $this->S3($request, 'Rotationposter24') : $Hall->Rotationposter24;
        $Hall->save();
        Alert::success('Images Saved Successful');
        return redirect()->back();
    }

    public function SuspendUser($UserID)
    {
        $User = User::find($UserID);

        if (\request()->has('AccountStatus')) {
            $User->AccountStatus = 'Suspend';
            $User->ChatMode = 'Busy';
        } else {
            $User->AccountStatus = 'Active';
        }
        $User->save();
        Alert::success('User Suspended Successful');

        return redirect()->back();
    }

    public function SuspendUserWithUrl($UserID)
    {
        $User = User::find($UserID);

        if ($User->AccountStatus == 'Active') {
            $User->AccountStatus = 'Suspend';
            $User->ChatMode = 'Busy';

        } else {
            $User->AccountStatus = 'Active';
        }
        $User->save();
        return redirect()->back();
    }

    public function SuspendBooth($BoothID)
    {
        $Booth = booth::find($BoothID);
        $User = User::find($Booth->UserID);

        if (\request()->has('BoothStatus')) {
            $User->AccountStatus = 'Active';
            if ($User->email_verified_at == null) {
                $User->sendEmailVerificationNotification();
            }
        } else {
            $User->AccountStatus = 'Suspend';
        }
        $User->save();
        Alert::success('User Changed Successful');

        return redirect()->back();
    }
}
