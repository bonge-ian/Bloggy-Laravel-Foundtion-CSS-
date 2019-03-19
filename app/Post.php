<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'message', 'user_id', 'image'];
    /**
     * User - a post belongs to a user
     * @return  user who owns the post
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
