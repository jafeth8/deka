<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable , Billable;
    
    protected static function boot () {
		parent::boot();
		static::creating(function (User $user) {
			if( ! \App::runningInConsole()) {
				$user->slug = str_slug($user->name . " " . $user->last_name, "-");
			}
		});
	}
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pathAttachment () {
    	return "/images/users/" . $this->picture;
    }

    public static function navigation () {
    	return auth()->check() ? auth()->user()->role->name : 'guest';
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role () {
    	return $this->belongsTo(Role::class);
    }

    public function student () {
    	return $this->hasOne(Student::class);
    }

    public function teacher () {
    	return $this->hasOne(Teacher::class);
    }

    public function socialAccount () {
    	return $this->hasOne(UserSocialAccount::class);
    }
}
