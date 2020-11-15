<?php

namespace App\Http\Controllers;

use App\Auditorium;
use App\AuditoriumChat;
use App\Jobs\FinishStream;
use App\Site;
use App\Speaker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuditoriumController extends Controller
{


    public function ChangePassword(Request $request){
        $request->validate([
            'OldPassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $Speaker = Speaker::find(Session::get('Speaker')->id);
            if ($Speaker->password === $request->OldPassword) {
            $Speaker->password = $request->password;
            $Speaker->save();
            Session::forget('Speaker');
            Alert::success('Password Changed Successfully');

            return redirect()->route('Auditorium.Login');

        }else{
            return redirect()->back()->withErrors(['msg' => 'Enter Correct Old Password']);

        }


    }

    public function StreamKey(Request $request){
        /*$Speaker = Speaker::find($request->SpeakerID);
        $Slug = $Speaker->Name . rand(10000,99999);
        $Data = array (
            'title' => "$Speaker->SpeechTitle",
            'slug' => "$Slug",
            'fps' => '30',
            'convert_info' =>
                array (
                    0 => array(
                        'audio_bitrate' => '32',
                        'video_bitrate' => '100',
                        'resolution_width' => '480',
                        'resolution_height' => '480',
                    ),
                    1 => array(
                        'audio_bitrate' => '64',
                        'video_bitrate' => '200',
                        'resolution_width' => '720',
                        'resolution_height' => '720',
                    ),
                    2 => array(
                        'audio_bitrate' => '128',
                        'video_bitrate' => '400',
                        'resolution_width' => '1080',
                        'resolution_height' => '1080',
                    )
                ),
            'mode' => 'push',
            'type' => 'low_latency',
        );
        $ch = curl_init();
        $headers = array();
        $headers[] = 'Authorization: Apikey 8df667a1-a1ed-46b1-9005-6a43237f0715';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, 'https://napi.arvancloud.com/live/2.0/streams');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Data));
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $Res = json_decode($result,true);
*/
        $Speaker = Speaker::find($request->SpeakerID);
        $Site = Site::find(1);
            $Speaker->StreamID = $Site->StreamKey;
            $Speaker->StreamUrl = $Site->RtmpAddress;
            $Speaker->HaveStreamKey = 'Yes';
            $Speaker->save();
            Carbon::now()->diffInMinutes(Carbon::parse($Speaker->End));
            FinishStream::dispatch($Speaker->id)->delay(now()->addMinutes(Carbon::parse($Speaker->Speak->Start)->diffInMinutes(Carbon::parse($Speaker->Speak->End))));
            Alert::success('Rtmp Address Url =>' . $Site->RtmpAddress . '<br>' . 'Secret Key =>' .$Site->StreamKey);
            return redirect()->back();

    }


    public function Login(){
        return view('Auditorium.login');
    }
    public function LoginPost(Request $request){
        $request->validate([
            'UserName' => 'required|string',
            'password' => 'required'
        ]);
        $User = Speaker::where('UserName' , $request->UserName)->orWhere('email'  , $request->UserName)->get();
        if (!empty($User[0])){
            if ($request->password == $User[0]->password){
                unset($User[0]->password);
                Session::put('Speaker', $User[0]);
                return redirect()->route('Auditorium.Index');
            }
            else{
                return redirect()->back()->withErrors(['msg' => 'These credentials do not match our records']);
            }
        }
        else{
            return redirect()->back()->withErrors(['msg' => 'These credentials do not match our records']);
        }
    }

    public function LogOut(){
        Session::forget('Speaker');
        return redirect()->route('Auditorium.Login');

    }
    public function Index(){
        if (Session::get('Speaker') != null){
            return view('Auditorium.main');
        }else{
            return redirect()->route('Auditorium.Login');
        }
    }
    public function Chats($ID){
        $Auditorium = Auditorium::where('SpeakerID' , $ID)->get();
        if ($Auditorium[0] == null || empty($Auditorium[0]) || $Auditorium->count() <= 0) {
            Alert::error('You Havent Any Speak');
            return redirect()->back();
        }else{


            return view('Auditorium.Chats')->with('SpeakeID' , $Auditorium[0]->id);
        }
    }

    public function ChatGet(Request $request){
        $Chats = AuditoriumChat::where('auditoriaID' , $request->AuditoriumID)->get();
        return response()->json([
            'Chat' => $Chats
        ]);
    }

}
