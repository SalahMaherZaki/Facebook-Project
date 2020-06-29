<?php

namespace VoiceBook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'body',
    ];

    /**
     * Get the user that owns the post.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('VoiceBook\User');
    }

    /**
     * Get the likes of the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function likes()
    {
        return $this->morphToMany('VoiceBook\User', 'likeable');
    }

    public function comments()
    {
        return $this->hasMany('VoiceBook\Comment');
    }

    /**
     * Check if the post is liked.
     *
     * @return bool
     */
    public function isLiked()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();

        return isset($like) ? true : false;
    }

}
