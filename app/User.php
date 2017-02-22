<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

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

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Check if user has the role within views
     * @param $role
     * @return bool
     */
    public function hasLevel($level)
    {
        $user = $this->roles;

        return $user[0]->level <= $level;
    }

    /**
     * Check if user has the role within views
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        $user = $this->roles;

        return $user[0]->slug == $role;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function device(Device $device)
    {
        $this->devices()->save($device);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function upload(Upload $upload)
    {
        $this->uploads()->save($upload);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
