<?php

namespace App\Http\Controllers;

use App\booth;
use App\Invitation;
use App\Jobs;
use App\Mail\InviteOperators;
use App\Mail\SpeakerRegister;
use App\Site;
use App\Speaker;
use App\Traits\Uploader;
use App\User;
use Aws\S3\S3Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BoothController extends Controller
{
    use Uploader;

    public function Booth()
    {
        return booth::where('UserID', Auth::id())->get()[0];
    }


    public function Register()
    {
        return view('auth.register-Exhibitor');
    }


    public function RegisterOne(Request $request)
    {
        $myvar = 1;
        $request->validate([
            'password' => 'required|string|min:8|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*]).*$/',
            'CompanyName' => 'required|string|unique:booths',
            'City' => 'required|string',
            'CountryCode' => 'required',
            'email' => 'required|string|email|unique:users',
            'Country' => 'required|string',
            'PhoneNumber' => 'required',
            'WebSite' => 'string|nullable',
        ]);
        $Payment = Site::find(1)->ExhabitorPayment;

        $PhoneNumber = preg_replace('/-/', '', $request->PhoneNumber);
        $PhoneNumber = preg_replace('/\(/', '', $PhoneNumber);
        $PhoneNumber = preg_replace('/\)/', '', $PhoneNumber);
        $User = User::create([
            'UserName' => $request->CompanyName,
            'FirstName' => 'System',
            'LastName' => 'User',
            'password' => Hash::make($request->password),
            'City' => $request->City,
            'email' => $request->email,
            'Gender' => 'Company',
            'Country' => $request->Country,
            'PhoneNumber' => $PhoneNumber,
            'AccountStatus' => 'Suspend',
            'Payment' => $Payment > 0 ? 'UnPaid' : 'Paid',
            'Rule' => 'Exhibitor',
            'Image' => '/assets/img/DefaultPic.png',
            'PositionUser' => $request->PositionUser ? $request->PositionUser : ''

        ]);
        $Booth = booth::create([
            'CompanyName' => $request->CompanyName,
            'Representative' => $request->Representative,
            'WebSite' => $request->WebSite != null ? $request->WebSite : '',
            'Status' => 'DeActive',
            'UserID' => $User->id,
        ]);


        return view('Errors.ActiveAccount', compact('myvar'));
    }

    public function RegisterTo()
    {
        $BoothID = booth::where('UserID', Auth::id())->get()[0];
        $UserID = Auth::id();
        if ($BoothID->StepTwo == 'Waiting') {
            return view('auth.register-ExhibitorStepTwo')->with(['UserID' => $UserID, 'BoothID' => $BoothID->id]);

        } else {
            return redirect()->back();
        }


    }

    public function RegisterTwo(Request $request)
    {


        dd($request->all());


        $request->validate([
            'OperatorEmails' => 'array',
            'UserID' => 'required|string',
            'BoothID' => 'required|string'
        ]);

        if (isset($request->OperatorEmails) || @$request->OperatorEmails[0] != null) {
            foreach ($request->OperatorEmails as $operatorEmail) {
                if ($operatorEmail == "" || empty($operatorEmail)) {
                    Alert::error('You Must Fill Operator Email Filed');
                    return redirect()->back();
                }
            }
        }
        if (@$request->OperatorEmails != null || @$request->OperatorEmails[0] != null) {

            $i = 0;
            foreach ($request->OperatorEmails as $email) {
                if ($i <= Site::find(1)->ExhibitorMaximumOperator) {
                    $Invite = Invitation::create([
                        'email' => $email,
                        'token' => Str::random(20),
                        'Rule' => 'ExhibitorOperator',
                        'ParentID' => $request->BoothID
                    ]);
                    Mail::to($email)->send(new InviteOperators($Invite->token));
                    $i++;
                }
            }
        }

        if ($request->need_live_conf) {
            $request->validate([
                'SpeakerName' => 'required|string',
                'SpeakerUserName' => 'required|string',
                'password' => 'required|string|min:8|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*]).*$/',
                'SpeechTitle' => 'required|string',
                'PreferredDate1' => 'required|date',
                'PreferredDate2' => 'required|date',
                'PreferredDate3' => 'required|date',
                'email' => 'required|email',
            ]);
            $Speaker = Speaker::create([
                'Name' => $request->SpeakerName,
                'UserName' => $request->SpeakerUserName,
                'password' => $request->password,
                'SpeechTitle' => $request->SpeechTitle,
                'SpeakerName' => $request->SpeakerName,
                'PreferredDate1' => $request->PreferredDate1,
                'PreferredDate2' => $request->PreferredDate2,
                'PreferredDate3' => $request->PreferredDate3,
                'BoothID' => $request->BoothID,
                'email' => $request->email,
            ]);

            /*$data = [
                'Name' => $request->SpeakerName,
                'UserName' => $request->SpeakerUserName,
                'password' => $request->password,
                'Speech Title' => $request->SpeechTitle,
                'Speaker Name' => $request->SpeakerName,
                'Preferred Date 1' => $request->PreferredDate1,
                'Preferred Date 2' => $request->PreferredDate2,
                'Preferred Date 3' => $request->PreferredDate3,
                'email' => $request->email,
            ];
            Mail::to($Speaker->email)->send(new SpeakerRegister($data));
       */
        }
        $Booth = booth::find($request->BoothID);
        $Booth->StepTwo = 'Passed';
        $Booth->save();

        return redirect()->route('Exhibitor.index');
    }

    public function RegisterThree()
    {
        $Booth = $this->Booth();
        return view('auth.register-ExhibitorStepThree')->with(['Booth' => $Booth]);
    }


    public function RegisterThreePost(Request $request)
    {

        $request->validate([
            'Logo' => 'image',
            'Description' => 'required|string',
            'Position' => 'required|string',
            'HeaderName' => 'required|string',
            'WebSiteColor' => 'required|string',
            'Color1' => 'required|string',
            'Color2' => 'required|string',
            'Mode' => 'required|string'
        ]);
        $HallConvertor = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4
        ];


        $Convertor = [
            'booth_01' => 10,
            'booth_02' => 12,
            'booth_03' => 14,
            'booth_04' => 11,
            'booth_05' => 13,
            'booth_06' => 15,
            'booth_07' => 16,
            'booth_08' => 19,
            'booth_09' => 17,
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


        $D = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        $A = array(10, 11, 12, 13, 14, 15);
        $B = array(16, 17, 18, 19);
        $C = array(20, 21, 22, 23, 24, 25);
        $Position = $Convertor[$request->Position];
        $Type = '';
        if (in_array($Position, $A)) {
            $Type = 'A';
        } elseif (in_array($Position, $B)) {
            $Type = 'B';
        } elseif (in_array($Position, $C)) {
            $Type = 'C';
        } elseif (in_array($Position, $D)) {
            $Type = 'D';
        }
        $Booth = $this->Booth();
        $Booth->Logo = $request->hasFile('Logo') ? $this->S3($request, 'Logo') : $Booth->Logo;
        $Booth->Description = $request->Description;
        $Booth->Type = $Type;
        $Booth->HeaderName = $request->HeaderName;
        $Booth->WebSiteColor = $request->WebSiteColor;
        $Booth->Color1 = $request->Color1;
        $Booth->Color2 = $request->Color2;
        $Booth->Position = $Position;
        $Booth->Hall = $HallConvertor[$request->Hall];
        $Booth->save();
        if ($request->Mode == 'Test') {
            Alert::success('Settings Saved');
            return redirect()->back();
        } elseif ($request->Mode == 'Finish') {
            $Booth->Status = 'Active';
            $Booth->save();
            return redirect()->route('Exhibitor.index');
        }
    }


}
