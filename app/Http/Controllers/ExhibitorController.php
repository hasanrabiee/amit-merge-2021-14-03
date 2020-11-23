<?php

namespace App\Http\Controllers;

use App\AdminChat;
use App\booth;
use App\Chat;
use App\Invitation;
use App\Jobs;
use App\Mail\InviteOperators;
use App\Site;
use App\Statistics;
use App\Traits\Uploader;
use App\User;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ExhibitorController extends Controller
{
    use  Uploader;

    public function __construct()
    {
        $this->middleware('verified');


        $this->middleware(function ($request, $next) {
            if (booth::where('UserID', Auth::id())->get()[0]->StepTwo == 'Passed') {
                return $next($request);
            }
            return redirect()->route('Exhibitor-Register-To');
        });


        $this->middleware(function ($request, $next) {
            if ($this->Booth()->Status != 'Active') {
                return redirect()->route('Exhibitor-Register-Three');
            }
            return $next($request);
        });
    }

    public function Booth()
    {
        return booth::where('UserID', Auth::id())->get()[0];

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

    public function UpdateJob(Request $request){


        $request->validate([
            'Title' => 'required|string',
            'Description' => 'required|string',
            'Number' => 'required|integer',
            'Salary' => 'nullable',
            'ID' => 'required|integer'
        ]);


        $Job = Jobs::find($request->ID);
        $Job->Title = $request->Title;
        $Job->Description = $request->Description;
        $Job->Number = $request->Number;
        $Job->Salary = $request->Salary ?? '';
        $Job->save();
        return redirect()->back();

    }

    public function AddJob(Request $request)
    {
        $request->validate([
            'Title' => 'required|string',
            'Description' => 'required|string',
            'Number' => 'required|integer',
            'Salary' => 'nullable',
        ]);
        Jobs::create([
            'Title' => $request->Title,
            'Description' => $request->Description,
            'Number' => $request->Number,
            'Salary' => $request->Salary ?? '',
            'BoothID' => $this->Booth()->id
        ]);
        Alert::success(__("message.jobcreated"));
        return redirect()->back();
    }

    public function index()
    {
        $Booth = $this->Booth();
        return view('Exhibitor.index')->with(['Booth' => $Booth]);
    }

    public function Statistics()
    {
        $Statistic = Statistics::where('BoothID', $this->Booth()->id)->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get(array(
                \DB::raw('Date(created_at) as date'),
                \DB::raw('COUNT(*) as "views"')
            ));
        $Profession = Statistics::where('BoothID', $this->Booth()->id)->groupBy('Profession')
            ->orderBy('Profession', 'ASC')
            ->get(array(
                \DB::raw('Profession'),
                \DB::raw('COUNT(*) as "views"'),
            ));

        return view('Exhibitor.Statistics')->with([
            'Booth' => $this->Booth(),
            'Statistic' => $Statistic,
            'Profession', $Profession
        ])->with('Profession', $Profession);

    }

    public function Payment()
    {

        return view('Exhibitor.Payment')->with(['Booth' => $this->Booth()]);
    }

    public function Confirmation()
    {
        return view('Exhibitor.Confrimation')->with(['Booth' => $this->Booth()]);

    }

    public function ContactUs()
    {
        $Chats = AdminChat::where('ReceiverID', Auth::id())->get();
        return view('Exhibitor.ContactUS')->with(['Booth' => $this->Booth(), 'Chats' => $Chats]);
    }

    public function ChatGet()
    {
        $Chats = AdminChat::where('ReceiverID', Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ], 200);
    }

    public function ChatAdmin(Request $request)
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
            'Sender' => 'Exhibitor',
        ]);
        $Chats = AdminChat::where('ReceiverID', Auth::id())->get();
        return response()->json([
            'Chat' => $Chats
        ], 200);
    }


    public function InboxGet(Request $request)
    {
        $request->validate([
            'UserID' => 'required'
        ]);
        $Chat = Chat::where('BoothID', $request->BoothID)->where('UserID', $request->UserID)->get();
        return response()->json([
            'Chat' => $Chat
        ], 200);


    }

    public function Inbox(Request $request)
    {
        if (\request()->Mode) {
            switch (\request()->Mode) {
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
            $Chats = Chat::where('BoothID', $Booth->id)->where('Sender', 'Visitor')->get();
            foreach ($Chats as $obj) {
                $UniqueUser[$obj->UserID] = $obj->UserID;
            }
            $Users = User::whereIn('id',$UniqueUser)->paginate(10);

        }

        if (\request()->UserID) {
            $Chat = Chat::where('BoothID', $Booth->id)->where('UserID', \request()->UserID)->get();
            $CHatsssss = Chat::where('BoothID', $Booth->id)->where('UserID', \request()->UserID)->get();
            foreach ($CHatsssss as $ch) {
                $ch->Status = 'Viewed';
                $ch->save();
            }
            return view('Exhibitor.inbox')->with(['Booth' => $Booth, 'Users' => $Users, 'Chat' => $Chat]);
        }


        if (\request()->SearchTerm) {
            $UsersAll = User::where('UserName', 'LIKE', '%' . \request()->SearchTerm . '%')->get();
            foreach ($UsersAll as $user) {
                $Users[] = User::find($user->id);
            }
        }
        return view('Exhibitor.inbox')->with(['Booth' => $Booth, 'Users' => $Users]);
    }


    public function InboxPost(Request $request)
    {
        if (Chat::where('BoothID', $request->BoothID)->where('UserID', $request->UserID)->get()[0]->Owner != null) {
            $Owner = Chat::where('BoothID', $request->BoothID)->where('UserID', $request->UserID)->first()->Owner;
        } else {
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


    public function History()
    {
        $Booth = $this->Booth();
        if (\request()->SearchTerm) {
            $UserName = User::where('UserName', 'LIKE', '%' . \request()->SearchTerm . '%')->get();

            if ($UserName->count() <= 0) {
                return redirect()->back();
            }
            $Statistic = Statistics::where('UserID', $UserName[0]->id)->where('BoothID', $Booth->id)->get();
        } else {
            $Statistic = Statistics::where('BoothID', $Booth->id)->get();
        }
        $Users = [];
        $uniques = array();
        foreach ($Statistic as $obj) {
            $uniques[$obj->UserID] = $obj;
        }
        foreach ($uniques as $item) {
            $Users[] = User::find($item->UserID);
        }

        if (\request()->UserID) {
            $User = User::find(\request()->UserID);
            return view('Exhibitor.History')->with(['Booth' => $Booth, 'Users' => $Users, 'User' => $User]);
        }
        return view('Exhibitor.History')->with(['Booth' => $Booth, 'Users' => $UserName]);


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
            Alert::success("Password Changed Successfully");
            return redirect()->route('PassChanged');

        }
        Alert::error("Change Password failed, Try again");

        return redirect()->back();


    }

    public function AboutCompany(Request $request)
    {
        $request->validate([
            'Description' => 'required|string'
        ]);
        $Booth = $this->Booth();
        $Booth->Description = $request->Description;
        $Booth->save();
        return redirect()->back();

    }


    public function Chat(Request $request)
    {
        if (Chat::where('BoothID', $this->Booth()->id)->where('UserID', $request->UserID)->get()[0]->Owner != null) {
            $Owner = Chat::where('BoothID', $this->Booth()->id)->where('UserID', $request->UserID)->first()->Owner;
        } else {
            $Owner = Auth::id();
        }
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


    public function MyBooth()
    {
        return view('Exhibitor.BoothInfo')->with(['Booth' => $this->Booth()]);
    }


    public function UpdateBooth(Request $request)
    {


        $Booth = $this->Booth();
        $Booth->Poster1 = $request->hasFile('Poster1') ? $this->S3($request, 'Poster1') : $Booth->Poster1;
        $Booth->Poster2 = $request->hasFile('Poster2') ? $this->S3($request, 'Poster2') : $Booth->Poster2;
        $Booth->Poster3 = $request->hasFile('Poster3') ? $this->S3($request, 'Poster3') : $Booth->Poster3;
        $Booth->Logo = $request->hasFile('Logo') ? $this->S3($request, 'Logo') : $Booth->Logo;
        $Booth->Doc1 = $request->hasFile('PdfFile') ? $this->S3Doc($request, 'PdfFile') : $Booth->Doc1;
        if ($request->Video) {
            $Booth->Video = preg_match('/.*embed.*/', $request->Video) ? $request->Video : preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "https://www.youtube.com/embed/$1", $request->Video);
        }
        $Booth->Color1 = $request->Color1;
        $Booth->Color2 = $request->Color2;
        $Booth->WebSiteColor = $request->WebSiteColor;
        $Booth->save();
        Alert::success('Changes Saved');
        return redirect()->back();
    }

    public function DeleteJob($id)
    {
        $Job = Jobs::find($id);
        $Job->delete();
        Alert::success('Job Deleted SuccessFully');

        return redirect()->back();
    }
}
