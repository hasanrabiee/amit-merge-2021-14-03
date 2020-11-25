<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FirstName', 'LastName', 'email', 'UserName',
        'PhoneNumber', 'Position', 'Gender', 'password',
        'Image','AccountStatus','City','Country','Payment',
        'BirthDate','CompanyID','VisitExperience','Rule',
        'Profession','City','ChatMode','PositionUser','email_verified_at', 'laravel_remember_session'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Booth(){
        return $this->hasOne(booth::class,'UserID','id');
    }

    public function AuditoriumChat() {

        return $this->hasMany('App\AuditoriumChat');

    }

}
