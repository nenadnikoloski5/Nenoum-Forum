<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [
        'postedAtForum', 'postedBy', 'postedByID', 'postBody', 'postTitle', 'likesAmount'
    ];

    public function postReplies(){

        return $this->hasMany("App\post_replies", "replyToPostID");
    }

}
