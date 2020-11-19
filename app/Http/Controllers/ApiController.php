<?php

namespace App\Http\Controllers;

use App\AdminChat;
use App\AuditoriumChat;
use App\booth;
use App\Chat;
use App\ContactUs;
use App\Hall;
use App\Jobs;
use App\Lounge;
use App\LoungeChat;
use App\Statistics;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{

    public function AudituriumChatGet(Request $request){
        $Chats = AuditoriumChat::where('auditoriaID' , $request->auditoriaID)->get(['UserID','Text','Username']);
        return response()->json([
            'Chat' => $Chats
        ]);
    }

    public function WhatIsUserName($user_id = 999){
        return User::find($user_id)->UserName;
    }

    public function AudituriumChat(Request $request){
        $request->validate([
            'UserID' => 'required|string',
            'Username' => 'required|string',
            'auditoriaID' => 'required|string',
            'Text' => 'required|string'
        ]);
         AuditoriumChat::create([
            'UserID' => $request->UserID,
            'Username' => $request->Username,
            'auditoriaID' => $request->auditoriaID,
            'Text' => $request->Text
        ]);
         $Chats = AuditoriumChat::where('auditoriaID' , $request->auditoriaID)->get(['UserID', 'Username', 'Text']);
        return response()->json([
            'Status' => 'Success',
            'Chat' => $Chats
        ],200);

    }


    public function LoungeCount(Request $request){


        $array =  Lounge::where('id', "1")->get(["Members"])->first()->Members;
        eval("\$myarray = $array;");

        $count = count($myarray);


        return response()->json([
                'Count' => $count,
                'ID' => $request->LoungeID
        ]);
    }
    public function LoungeGet(LoungeChat $lounge){

        $Chats = $lounge->get(["Text", "UserID", "Username"]);




        return response()->json([
            'Chat' => $Chats
        ]);
    }

    public function LoungePost(Request $request){


         LoungeChat::create($request->all());
         $Chats = LoungeChat::where('LoungeID' , $request->LoungeID)->get();
        return response()->json([
            'Status' => 'Success',
            'Chat' => $Chats
        ],200);

    }


    public function JobDetails($JobID){
        $Job = Jobs::find($JobID);
        return json_encode($Job);
    }


    public function HallIsFull($HallName)
    {

        $Booth = booth::where('Hall', $HallName)->count();
        if ($Booth >= 25) {
            return json_encode('Full');
        }
        return json_encode('NotFull');
    }

    public function PositionIsAvailable($HallID,$Position){

        $Convertor = [
            'booth_1' => 10,
            'booth_2' => 12,
            'booth_3' => 14,
            'booth_4' => 11,
            'booth_5' => 13,
            'booth_6' => 15,
            'booth_7' => 16,
            'booth_8' => 19,
            'booth_9' => 17,
            'booth_10' => 18,
            'booth_11' => 20,
            'booth_12' => 22,
            'booth_13' => 24,
            'booth_14' => 21,
            'booth_15' => 23,
            'booth_16' => 25,
            'booth_17' => 1,
            'booth_18' => 2,
            'booth_19' => 3,
            'booth_20' => 4,
            'booth_21' => 5,
            'booth_22' => 6,
            'booth_23' => 7,
            'booth_24' => 8,
            'booth_25' => 9
        ];


        $Booth = booth::where('Hall' , $HallID)->where('Position' , $Convertor[$Position])->count();
        if ($Booth >= 1){
            return json_encode('Full');
        }
        return json_encode('NotFull');
    }

    public function Images()
    {


        $Main = Hall::find(1);
        $LoginData = $Main->only('Main1', 'Main2', 'Main3', 'Main4', 'Main5', 'Main6');
        $LobyData = $Main->only('Loby1', 'Loby2', 'Loby3', 'Loby4');
        $PanPosterData = $Main->only('Panposter1', 'Panposter2', 'Panposter3');
        $WallPosterData = $Main->only('Wallposter1', 'Wallposter2', 'Wallposter3', 'Wallposter4', 'Wallposter5', 'Wallposter6', 'Wallposter7', 'Wallposter8');
        $StandData = $Main->only('Stand1', 'Stand2', 'Stand3', 'Stand4', 'Stand5', 'Stand6', 'Stand7');
        $BillBoardData = $Main->only('Billboard1', 'Billboard2', 'Billboard3', 'Billboard4', 'Billboard5', 'Billboard6');
        $RotationposterData = $Main->only('Rotationposter1', 'Rotationposter2', 'Rotationposter3', 'Rotationposter4', 'Rotationposter5', 'Rotationposter6', 'Rotationposter7', 'Rotationposter8', 'Rotationposter9', 'Rotationposter10', 'Rotationposter11', 'Rotationposter12', 'Rotationposter13', 'Rotationposter14', 'Rotationposter15', 'Rotationposter16', 'Rotationposter17', 'Rotationposter18', 'Rotationposter19', 'Rotationposter20', 'Rotationposter21', 'Rotationposter22', 'Rotationposter23', 'Rotationposter24');
        $TextData = $Main->only('Text1', 'Text2', 'Text3');
        foreach ($LoginData as $item => $value) {
            $Login[] = $value;
        }
        foreach ($LobyData as $item => $lobyDatum) {
            $Loby[] = $lobyDatum;
        }
        foreach ($WallPosterData as $item => $value) {
            $WallPoster[] = $value;
        }
        foreach ($BillBoardData as $item => $value) {
            $BillBoard[] = $value;
        }
        foreach ($StandData as $item => $value) {
            $Stand[] = $value;
        }
        foreach ($PanPosterData as $item => $value) {
            $PanPoster[] = $value;
        }
        foreach ($RotationposterData as $item => $value) {
            $Rotationposter[] = $value;
        }
        foreach ($TextData as $item => $value) {
            $Text[] = $value;
        }

        return response()->json(
            ['Data' => array(
                'Login' => $Login,
                'Loby' => $Loby,
                'Hall' => array(
                    'WallPoster' => $WallPoster,
                    'Billboard' => $BillBoard,
                    'Stand' => $Stand,
                    'Panposter' => $PanPoster,
                    'Rotationposter' => $Rotationposter,
                    'Text' => $Text
                )
            )]
            , 200);
    }


    public function Login(Request $request)
    {
        $User = User::where('email', $request->email)->orWhere('UserName' , $request->email)->first();
        if ($User == null || empty($User) || $User->count() <= 0) {
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'User not Found',
                'User' => null
            ], 200);
        }
        if ($User->AccountStatus == 'Suspend'){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Account Suspended',
                'User' => null
            ], 200);
        }
        if ($User->email_verified_at == null){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Please Active Your Account From Email',
                'User' => null
            ], 200);
        }
        if (Hash::check($request->password, $User->password)) {
            return response()->json([
                'Status' => 'Success',
                'Message' => 'User Logged in',
                'User' => $User
            ], 200);
        } else {
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Password not match',
                'User' => null
            ], 200);
        }

    }

    public function ChatStore(Request $request)
    {




        if (Chat::where('BoothID' , $request->BoothID)->where('UserID' , $request->UserID)->count() > 0){
            $Owner = Chat::where('BoothID' , $request->BoothID)->where('UserID' , $request->UserID)->first()->Owner;
        }
        else{

            $Owner = User::where(['CompanyID' => $request->BoothID , 'ChatMode' => 'Available' , 'AccountStatus' => 'Active'])->orderBy('ActiveSlave', 'ASC')->first();
            if ($Owner == null){
                $Owner = booth::find($request->BoothID)->UserID;
            }else{
                $Owner->ActiveSlave = $Owner->ActiveSlave + 1;
                $Owner->save();
                $Owner = $Owner->id;
            }

            /*$Users = booth::Oprators($request->BoothID);
            $Users[10000] = booth::find($request->BoothID)->User;
            $Chats = Chat::where('BoothID' , $request->BoothID)->where('Sender' , 'Visitor')->get();
            foreach ($Chats as $obj) {
                $UniqueUser[$obj->UserID] = $obj->Owner;
            }
            $OwnerOFCompany = booth::find($request->BoothID)->User;
            $UniqueUser[$OwnerOFCompany->id] = $OwnerOFCompany->id;
            $uniqUsers = array_count_values($UniqueUser);
            $keys = array_keys($uniqUsers);
            sort($uniqUsers);
            $FinallUniqUsers = array_combine($keys, array_values($uniqUsers));
            $Owner = array_key_first($FinallUniqUsers);*/
        }

        $User = User::find($request->UserID);

        $Chat = Chat::create([
            'UserID' => $User->id,
            'BoothID' => $request->BoothID,
            'Text' => $request->Text,
            'Sender' => 'Visitor',
            'Owner' => $Owner,
            'UserName' => $User->UserName
        ]);


        if ($Chat->id > 0) {
            return response()->json(
                ['Status' => 'OK']
                , 202);
        } else {
            return response()->json(
                ['Status' => 'Failed']
                , 400);
        }
    }

    public function ChatGet(Request $request)
    {
        $request->validate([
            'UserID' => 'required|integer',
            'BoothID' => 'required|integer',
        ]);
        $Chat = Chat::where('UserID', $request->UserID)->where('BoothID', $request->BoothID)->where('Sender' , 'Exhibitor')->latest('id')->first();
        return response()->json(
            ['Chat' => $Chat]
            , 200);
    }


    public function ChatStoreAdmin(Request $request)
    {

        $request->validate([
            'Text' => ['required', 'max:255']
        ]);
        $ID = User::where('Rule' , 'Admin')->get()[0]->id;
        $Chat = AdminChat::create([
            'Text' => $request->Text,
            'UserID' => $ID ,
            'ReceiverID' => $request->UserID,
            'Sender' => 'Visitor',
        ]);




        if ($Chat->id > 0) {
            return response()->json(
                ['Status' => 'OK']
                , 202);
        } else {
            return response()->json(
                ['Status' => 'Failed']
                , 400);
        }
    }

    public function ChatGetAdmin(Request $request)
    {
        $request->validate([
            'UserID' => 'required|integer',
        ]);
        $ID = User::whereIn('Rule', ['Admin', 'Admin-Operator'] )->get()[0]->id;
        $Chats = AdminChat::where('UserID', $ID)->where('ReceiverID', \request()->UserID)->whereIn('Sender' , ['Admin' , 'Admin-Operator'])->latest('id');

        return response()->json(
            ['Chat' => $Chats]
            , 200);
    }



    public function UserDetails($id)
    {

        $User = User::find($id);
        return response()->json(
            $User
            , 200);
    }


    public function BoothGet($id)
    {
        //---------------------
        $BoothA = range(1,25);
        $BoothAFinal = [];
        foreach ($BoothA as $item) {
            if (booth::where('Position' , $item)->where('Hall' , 1)->count() > 0){
                if (booth::where('Position' , $item)->where('Hall' , 1)->first()->User->AccountStatus == 'Active'){
                    $BoothAFinal[] = booth::where('Position' , $item)->where('Hall' , 1)->get()[0];
                }else{
                    $BoothAFinal[] = null;
                }
            }else{
                $BoothAFinal[] = null;
            }
        }
        $BoothAFinal = array_values($BoothAFinal);
        //---------------------
        $BoothB = range(1,25);
        $BoothBFinal = [];
        foreach ($BoothB as $item) {
            if (booth::where('Position' , $item)->where('Hall' , 2)->count() > 0){
                if (booth::where('Position' , $item)->where('Hall' , 2)->first()->User->AccountStatus == 'Active') {
                    $BoothBFinal[] = booth::where('Position', $item)->where('Hall', 2)->get()[0];
                }else{
                    $BoothBFinal[] = null;
                }
            }else{
                $BoothBFinal[] = null;
            }
        }
        $BoothBFinal = array_values($BoothBFinal);
        //---------------------
        $BoothC = range(1,25);
        $BoothCFinal = [];
        foreach ($BoothC as $item) {
            if (booth::where('Position' , $item)->where('Hall' , 3)->count() > 0){
                if (booth::where('Position' , $item)->where('Hall' , 3)->first()->User->AccountStatus == 'Active') {
                    $BoothCFinal[] = booth::where('Position', $item)->where('Hall', 3)->get()[0];
                }else{
                    $BoothCFinal[] = null;

                }
            }else{
                $BoothCFinal[] = null;
            }
        }
        $BoothCFinal = array_values($BoothCFinal);
        //---------------------
        $BoothD = range(1,25);
        $BoothDFinal = [];
        foreach ($BoothD as $item) {
            if (booth::where('Position' , $item)->where('Hall' , 4)->count() > 0){
                if (booth::where('Position' , $item)->where('Hall' , 4)->first()->User->AccountStatus == 'Active') {
                    $BoothDFinal[] = booth::where('Position', $item)->where('Hall', 4)->get()[0];
                }else{
                    $BoothDFinal[] = null;
                }
            }else{
                $BoothDFinal[] = null;
            }
        }
        $BoothDFinal = array_values($BoothDFinal);
        //---------------------
        $Data = array(
            'Hall-A' => $BoothAFinal,
            'Hall-B' => $BoothBFinal,
            'Hall-C' => $BoothCFinal,
            'Hall-D' => $BoothDFinal,
        );
        return response()->json(
            ['Data' => $Data]
            , 200);
    }


    public function test(Request $request)
    {
        $Test = 'https://www.youtube.com/watch?v=cyVJyAEgfbY';



        if (preg_match('/.*embed.*/',$Test)){
            $Url = $Test;
        }else{
            $Url = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","https://www.youtube.com/embed/$1",$Test);
        }
        dd($Url);

        $User = User::latest()->get();

        return response()->json(
            ['Data' => $User]
            , 200);

        return response()->json(
            ['Data' => 'test']
            , 200);


        $User = User::find(2);
        dd($User->Company->Booth);
        return $request->all();
    }


    public function ContactUs(Request $request)
    {
        $request->validate([
            'Name' => 'required|string',
            'Email' => 'required|string|email',
            'Text' => 'required|string',
        ]);
        $Item = ContactUs::create([
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Text' => $request->Text,
        ]);
        return response()->json(
            $Item
            , 200);
    }


    public function Statistics(Request $request)
    {


        if (Statistics::whereDate('created_at', Carbon::today())->where('UserID' , $request->UserID)->where('BoothID' ,$request->BoothID)->count() <= 0){
            $Statistics = Statistics::create([
                'UserID' => $request->UserID,
                'BoothID' => $request->BoothID,
                'Profession' => User::find($request->UserID)->Profession != null ? User::find($request->UserID)->Profession : 'Visitor',
                'Gender' => User::find($request->UserID)->Gender != null ? User::find($request->UserID)->Gender : 'No Gender'
            ]);
            return response()->json(
                $Statistics
                , 200);
        }
        return response()->json(
            ['Data' => 'Visited Today']
            , 200);
    }

    public function hexToRgb($hex)
    {
        $length = strlen($hex);
        $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
        $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
        $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
        $rgb['a'] = 1;
        return response()->json(
            $rgb
            , 200);
    }

}
