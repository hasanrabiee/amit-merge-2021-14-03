<?php

namespace App\Http\Controllers;

use App\AdminChat;
use App\booth;
use App\Chat;
use App\Statistics;
use App\Traits\Uploader;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ExhibitorOperatorController extends Controller
{

    public function __construct()
    {
        $this->middleware('verified');
    }


    use Uploader;


    public function Booth()
    {
        return booth::find(Auth::user()->CompanyID);
    }

    public function index()
    {
        return view('Exhibitor-Operator.index')->with(['Booth' => $this->Booth()]);
    }



    public function GetUsers(Request $request)
    {
        $Users = [];
        $UniqueUser = array();
        $Chats = Chat::where('BoothID', $request->BoothID)->where('Sender', 'Visitor')->get();
        foreach ($Chats as $obj) {
            $UniqueUser[$obj->UserID] = $obj;
        }
        foreach ($UniqueUser as $user) {
            $Users[] = User::find($user->UserID);
        }
        return response()->json([
            'Users' => $Users
        ], 200);
    }

    public function ChatCount()
    {

        if (\request()->UserID && \request()->BoothID) {
            return Chat::where(['UserID' => \request()->UserID, 'BoothID' => \request()->BoothID])->where('Status', 'New')->count();
        }

    }


    public function ChangeChatStatus(Request $request){
        if ($request->BoothID && $request->UserID) {
            $CHatsssss = Chat::where('BoothID', $request->BoothID)->where('UserID', $request->UserID)->get();
            foreach ($CHatsssss as $ch) {
                $ch->Status = 'Viewed';
                $ch->save();
            }
            return response()->json([
                'msg' => 'Done'
            ],200);
        }else{
            return response()->json([
                'msg' => 'Error'
            ],200);

        }

    }


    public function InboxPost(Request $request){
        if (Chat::where('BoothID' , $request->BoothID)->where('UserID' , $request->UserID)->get()[0]->Owner != null){
            $Owner = Chat::where('BoothID' , $request->BoothID)->where('UserID' , $request->UserID)->first()->Owner;
        }else{
            $Owner = Auth::id();
        }
        $request->validate([
            'Text' => 'required|string',
            'UserID' => 'required|integer'
        ]);

        Chat::create([
            'UserID' => $request->UserID,
            'BoothID' => $request->BoothID,
            'Text' => $request->Text,
            'Sender' => 'Exhibitor',
            'Owner' => $Owner,

        ]);
    }

    public function InboxGet(Request $request){
        $request->validate([
            'UserID' => 'required'
        ]);
        $Chat = Chat::where('BoothID', $request->BoothID)->where('UserID', $request->UserID)->get();
        return response()->json([
            'Chat' => $Chat
        ],200);


    }


    public function inbox(Request $request)
    {
        if (Auth::user()->AccountStatus != 'Active'){
            return view('Exhibitor-Operator.Inbox-Deactive')->with(['Booth' => $this->Booth()]);
        }



         if (\request()->Mode){
            switch (\request()->Mode){
                case 'Available':
                    Auth::user()->ChatMode = 'Available';
                    Auth::user()->save();
                    break;
                case 'Busy':
                    Auth::user()->ChatMode = 'Busy';
                    Auth::user()->save();
                    break;
            }
        }
        $Booth = $this->Booth();
        $Users = [];


        if ($request->ajax()) {
            // prepare users

            if ($request->SearchTerm){

                $UniqueUser = array();
                $Chats = Chat::where('BoothID', $Booth->id)->where('Sender', 'Visitor')->where('UserName','LIKE','%'.$request->SearchTerm.'%')->get();
                foreach ($Chats as $obj) {
                    $UniqueUser[$obj->UserID] = $obj->UserID;
                }
                $Users = User::whereIn('id',$UniqueUser)->paginate(10);


            }

            else{
                $UniqueUser = array();
                $Chats = Chat::where('BoothID', $Booth->id)->where('Sender', 'Visitor')->get();
                foreach ($Chats as $obj) {
                    $UniqueUser[$obj->UserID] = $obj->UserID;
                }
                $Users = User::whereIn('id',$UniqueUser)->paginate(10);

            }



            $users_list_view = view('Exhibitor.user-list-data', compact('Users' , 'Booth'))->render();


            // end prepare users


            return response()->json(['Users' => $users_list_view]);

        }




        if (Auth::user()->ChatMode == 'Available') {
            $UniqueUser = array();
            $Chats = Chat::where('BoothID' , $Booth->id)->where('Owner',Auth::id())->where('Sender' , 'Visitor')->get();
            foreach ($Chats as $obj) {
                $UniqueUser[$obj->UserID] = $obj->UserID;
            }
            $Users = User::whereIn('id',$UniqueUser)->paginate(10);

        }

        if (\request()->UserID) {
            $Chat = Chat::where('BoothID', $Booth->id)->where('UserID', \request()->UserID)->where('Owner',Auth::id())->get();
            $Chatssss = Chat::where('BoothID', $Booth->id)->where('UserID', \request()->UserID)->where('Owner',Auth::id())->get();
            foreach ($Chatssss as $ch) {
                $ch->Status = 'Viewed';
                $ch->save();
            }
            return view('Exhibitor-Operator.Inbox')->with(['Booth' => $Booth, 'Users' => $Users, 'Chat' => $Chat]);
        }


        if (\request()->SearchTerm) {
            $UsersAll = User::where('UserName', 'LIKE', '%' . \request()->SearchTerm . '%')->get();
            foreach ($UsersAll as $user) {
                $Users[] = User::find($user->id);
            }
        }
        return view('Exhibitor-Operator.Inbox')->with(['Booth' => $Booth, 'Users' => $Users]);


        }


    public function Chat(Request $request)
    {
        $Owner = Auth::id();
        $request->validate([
            'Text' => 'required|string',
            'UserID' => 'required|integer'
        ]);

        Chat::create([
            'UserID' => $request->UserID,
            'BoothID' => $this->Booth()->id,
            'Text' => $request->Text,
            'Sender' => 'Exhibitor',
            'Owner' => $Owner
        ]);
        return redirect()->back();
    }






    public function ChatGet(){
        $Chats = AdminChat::where('ReceiverID' , Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ],200);
    }


    public function ChatAdmin(Request $request){
        $request->validate([
            'Text' => ['required', 'max:255']
        ]);
        $Owner = User::where(['Rule' => 'Admin-Operator' , 'ChatMode' => 'Available'])->orderBy('ActiveSlave', 'ASC')->first();
        if ($Owner == null){
            $Owner = User::where('Rule' , 'Admin')->get()[0]->id;
        }else{
            $Owner->ActiveSlave = $Owner->ActiveSlave + 1;
            $Owner->save();
            $Owner = $Owner->id;
        }
        AdminChat::create([
            'Text' => $request->Text,
            'UserID' => $Owner ,
            'ReceiverID' => Auth::id(),
            'Sender' => 'Exhibitor-Operator',
        ]);
        $Chats = AdminChat::where('ReceiverID' , Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ],200);
    }


    public function Statistics()
    {
        $Statistic = Statistics::where('BoothID',$this->Booth()->id)->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                \DB::raw('Date(created_at) as date'),
                \DB::raw('COUNT(*) as "views"')
            ));
        $Profession = Statistics::where('BoothID',$this->Booth()->id)->groupBy('Profession')
            ->orderBy('Profession', 'ASC')
            ->get(array(
                \DB::raw('Profession'),
                \DB::raw('COUNT(*) as "views"'),
            ));

        return view('Exhibitor-Operator.Statistics')->with([
            'Booth' => $this->Booth(),
            'Statistic' => $Statistic,
            'Profession', $Profession
        ])->with('Profession', $Profession);

    }


    public function History(){
        $Booth = $this->Booth();
        if (\request()->SearchTerm){
            $UserName = User::where('UserName' , 'LIKE' , '%' . \request()->SearchTerm  . '%')->get();
            if ($UserName->count() <= 0){
                return redirect()->back();
            }
            $Statistic = Statistics::where('UserID' , $UserName[0]->id)->where('BoothID' , $Booth->id)->get();
        }else{
            $Statistic = Statistics::where('BoothID' , $Booth->id )->get();
        }
        $Users = [];
        $uniques = array();
        foreach ($Statistic as $obj) {
            $uniques[$obj->UserID] = $obj;
        }
        foreach ($uniques as $item) {
            $Users[] = User::find($item->UserID);
        }

        if (\request()->UserID){
            $User = User::find(\request()->UserID);
            return view('Exhibitor-Operator.History')->with(['Booth' => $Booth , 'Users' => $Users , 'User' => $User]);
        }
        return view('Exhibitor-Operator.History')->with(['Booth' => $Booth , 'Users' => $Users]);


    }



    public function ContactUs(){
        $Chats = AdminChat::where('ReceiverID' , Auth::id())->get();

        return view('Exhibitor-Operator.ContactUS')->with(['Chats' => $Chats, 'Booth' => $this->Booth()]);
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
            return redirect()->route('PassChanged');
        }
        Alert::error('please try again');

        return redirect()->back();


    }
}
