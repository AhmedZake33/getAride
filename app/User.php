<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','Mobile','city','profile_pic','profile_id','confirmed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function trips()
    {
        return $this->hasMany('App\Trip');
    }
    public function states()
    {
        return $this->hasMany('App\State');
    }
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
    public function messages()
{
  return $this->hasMany(Message::class);
}
    
    
}
