<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password','adminRole'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime', ];

        /**
     * one-to-many relation with post
     * one profile, many posts
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * one-to many relation with comments
     * one user, many comments
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Get the user that owns the code.
     */
    public function code()
    {
        return $this->HasOne('App\Models\Code'); //requires use App\Models\User
    }
}
