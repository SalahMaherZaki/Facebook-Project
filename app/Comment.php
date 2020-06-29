<?php

namespace VoiceBook;


use Illuminate\Database\Eloquent\Model;




class Comment extends Model
    {
        protected $fillable = ['body', 'user_id', 'post_id'];

        public function user() {
            return $this->belongsTo('VoiceBook\User');
        }
        public function post() {
            return $this->belongsTo('VoiceBook\Post');
        }
    }
