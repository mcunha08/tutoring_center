<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'role_id', 'rating', 'location', 'majors', 'profile_picture', 'date_of_birth', 'availability', 'calendar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        $this->belongsTo(Role::class);
    }
    public function referrerUser()
    {
        return $this->belongsTo('App\User', 'id', 'referrer_id');
    }

    public function referredUsers()
    {
        return $this->hasMany('App\User', 'referrer_id', 'id');
    }
}
