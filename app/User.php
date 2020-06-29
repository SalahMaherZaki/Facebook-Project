<?php

namespace VoiceBook;

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
        'username',
        'email',
        'birthday',
        'location',
        'phone',
        'password',
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
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Get the posts for the user.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany('VoiceBook\Post');
    }

    /**
     * Get the comments for the user.
     *
     * @return HasMany
     */
    public function comments() {
        return $this->hasMany('VoiceBook\Comment');
    }

    /**
     * Get the liked posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function likedPosts()
    {
        return $this->morphedByMany('VoiceBook\Post', 'likeable');
    }

}
