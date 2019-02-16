<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_likes extends Model
{
    //

    protected $fillable = [
        'votedToPostID', 'votedByUser' ,'votedByUserID', 'votedAmount'
    ];
}
