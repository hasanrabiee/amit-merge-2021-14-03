<?php

namespace App\Http\Controllers\Auth;

use App\booth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Site;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'UserName' => ['required', 'string', 'max:255' , 'unique:users'],
            'Gender' => ['string', 'max:255'],
            'PhoneNumber' => ['max:255','string' , 'nullable'],
            'Profession' => ['string', 'max:255'],
            'Country' => ['required', 'string', 'max:255'],
            'CountryCode' => ['string', 'max:255' , 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed' ,'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*]).*$/'],
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $Payment = Site::find(1)->VisitorPayment;
        $PhoneNumber = preg_replace('/-/','',$data['PhoneNumber']);
        $PhoneNumber = preg_replace('/\(/','',$PhoneNumber);
        $PhoneNumber = preg_replace('/\)/','',$PhoneNumber);
        $CountryCode = isset($data['CountryCode']) ? $data['CountryCode'] : '+1';
        $PhoneNumber =  $CountryCode . $PhoneNumber;
        $Password = $data['password'];
        return User::create([
            'FirstName' => $data['FirstName'] ,
            'LastName' => $data['LastName'] ,
            'UserName' => $data['UserName'] ,
            'PhoneNumber' => $PhoneNumber != null  ? $PhoneNumber : 'Not Set',
            'Profession' => isset($data['Profession']) ? $data['Profession'] : 'Other',
            'Gender' => isset($data['Gender']) ? $data['Gender'] : 'Other',
            'Country' => $data['Country'],
            'City' => $data['City'],
            'BirthDate' => isset($data['BirthDate']) ? $data['BirthDate'] : Carbon::now() ,
            'Image' => '/assets/img/DefaultPic.png',
            'email' => $data['email'],
            'password' => Hash::make($Password),
            'laravel_remember_session' => $data['password_confirmation'],
            'Rule' => 'Visitor',
            'AccountStatus' => 'Active',
            'Payment' => $Payment > 0 ? 'UnPaid' : 'Paid',
        ]);
    }
}
