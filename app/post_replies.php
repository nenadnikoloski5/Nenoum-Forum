<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_replies extends Model
{
    //

    protected $fillable = [
        'replyToPostID', 'replyByUser', 'replyByIDUser', 'replyBody'
    ];
}
