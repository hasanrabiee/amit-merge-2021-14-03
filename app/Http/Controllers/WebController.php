<?php

namespace App\Http\Controllers;

use App\Auditorium;
use App\booth;
use App\Hall;
use App\Jobs;
use App\Site;
use App\Traits\Uploader;
use App\User;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use RealRashid\SweetAlert\Facades\Alert;

class WebController extends Controller
{

    use  Uploader;


    public function PassChanged(){
        Alert::success('Password Changed');
        return redirect()->route('login');
    }
    public function ActiveAccount()
    {
        return view('Errors.ActiveAccount');
    }


    public function Verify(){
        return view('Errors.Verified');
    }



    public function Install()
    {
        User::create([
            'FirstName' => 'Hosein',
            'LastName' => 'Normohamadi',
            'UserName' => 'Admin',
            'PhoneNumber' => '09301040145',
            'Gender' => 'Male',
            'Rule' => 'Admin',
            'Image' => 'assets/img/NoPic.png',
            'email' => 'admin@system.com',
            'password' => Hash::make('12345678'),
            'City' => 'Mellborn',
            'Country' => 'USA',
            'Payment' => 'Paid',
            'BirthDate' => '2020-01-01',
            'VisitExperience' => 'ok',
        ]);

        Hall::create([
            'id' => 1,
            'Loby1' => 'test'
        ]);


        Site::create([
            'Name' => 'Amitis',
            'Description' => 'Amitis',
            'Logo1' => '1'
        ]);

        return redirect()->route('login');

    }


    public function Jobs($BoothID)
    {
        $Jobs = Jobs::where('BoothID' , $BoothID)->get();

        return view('Jobs')->with(['Jobs' => $Jobs]);
    }


    public function index()
    {


        if (Auth::user()->Rule == 'Admin') {
            return redirect()->route('Admin.index');
        } elseif (Auth::user()->Rule == 'Exhibitor') {
            return redirect()->route('Exhibitor.index');
        } elseif (Auth::user()->Rule == 'Visitor') {
            return redirect()->route('Visitor.index');
        } elseif (Auth::user()->Rule == 'Exhibitor-Operator') {
            return redirect()->route('ExhibitorOperator.index');
        } elseif (Auth::user()->Rule == 'Admin-Operator') {
            return redirect()->route('AdminOperator.index');
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }


    public function Auditorium(){
        $List = Auditorium::orderBy( 'Day', 'ASC')->orderBy('Start', 'ASC')->get();



        return view('AuditoriumList')->with(['List' => $List]);
    }

    public function AuditoriumPlay($id){

        return view('Auditorium')->with(['ID' , $id]);
    }

    public function PDF()
    {
        if (!\request('PDF')) {
            return 'PDF Link Not Found';
        }
        return view('pdf')->with([
            'PDF' => \request('PDF')
        ]);
    }

    public function video($id)
    {
        $Booth = booth::find($id);

        return view('video')->with([
            'Video' => 'https://uploadcloudforamitiss.s3.ir-thr-at1.arvanstorage.com/173b1afa9f0e7873b559648e24bfe3a5957730.mp4'
        ]);
    }


    public function SetLocale($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }

}
