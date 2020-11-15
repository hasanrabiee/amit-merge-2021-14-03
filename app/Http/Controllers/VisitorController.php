<?php

namespace App\Http\Controllers;

use App\AdminChat;
use App\booth;
use App\Statistics;
use App\Traits\Uploader;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class VisitorController extends Controller
{
    use Uploader;



    public function __construct()
    {
        $this->middleware('verified');
    }






    public function index(){
        return view('Visitor.index');
    }

    public function UpdateAvatar(Request $request){
        $request->validate([
            'Avatar' => 'image|required'
        ]);
        $User = Auth::user();
        $User->Image = $this->UploadPic($request , 'Avatar' , 'UserProfiles' , 'Profile');
        $User->save();
        return redirect()->back();
    }

    public function ChangePassword(Request $request){
        $request->validate([
            'OldPassword' => 'required',
            'password' => 'required|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*]).*$/',
        ]);
        if (Hash::check($request->OldPassword,Auth::user()->password)){
            Auth::user()->password = Hash::make($request->password);
            Auth::user()->save();
            Auth::logout();
            Alert::success('Password Changed Successfully');

            return redirect()->route('login');
        }
        return redirect()->back();


    }

    public function VisitExperience(Request $request){
        $request->validate([
            'VisitExperience' => 'required|string'
        ]);
        Auth::user()->VisitExperience = $request->VisitExperience;
        Auth::user()->save();
        return redirect()->back();
    }

    public function VisitHistory(){
        $Statistic = Statistics::where('UserID' , Auth::id())->get();
        $Booths = [];
        $uniques = array();
        foreach ($Statistic as $obj) {
            $uniques[$obj->BoothID] = $obj;
        }
        foreach ($uniques as $item) {
            $Booths[] = booth::find($item->BoothID);
        }

        if (\request()->CompanyID){
            $Booth = booth::find(\request()->CompanyID);
            return view('Visitor.VisitHistory')->with(['Booths' => $Booths , 'Booth' => $Booth]);
        }
        return view('Visitor.VisitHistory')->with(['Booths' => $Booths]);
    }


    public function Payment(){
        return view('Visitor.Payment');
    }

    public function Contact(){
        $Chats = AdminChat::where('ReceiverID' , Auth::id())->get();
        return view('Visitor.ContactUs')->with(['Chats' => $Chats]);
    }

    public function ChatGet(){
        $Chats = AdminChat::where('ReceiverID' , Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ],200);
    }

    public function Chat(Request $request){
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
            'Sender' => 'Visitor',
        ]);
        $Chats = AdminChat::where('ReceiverID' , Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ],200);
    }
}
