<?php

use App\Post;
use App\post_likes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    

    $posts = Post::latest()->take(5)->get();
    // dd($posts);

    $generalITCount = Post::all()->where('postedAtForum', 'generalIT')->count();

    $ITNewsCount = Post::all()->where('postedAtForum', 'ITNews')->count();

    $introduceCount = Post::all()->where('postedAtForum', 'introduce')->count();

    $IRLcount = Post::all()->where('postedAtForum', 'realLife')->count();

    $hardwareCount = Post::all()->where('postedAtForum', 'hardware')->count();

    $videogamesCount = Post::all()->where('postedAtForum', 'videoGames')->count();


    return view('welcome', ['descPosts' => $posts, 'user' => Auth::user(), 'generalITCount' => $generalITCount, 'ITNewsCount' => $ITNewsCount, 'introduceCount' => $introduceCount, 'IRLcount' => $IRLcount, 'hardwareCount' => $hardwareCount, 'videogamesCount' => $videogamesCount]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get("/{section}", 'HomeController@section');

// Make a post
Route::get("/makePost/{section}", 'HomeController@makePost');
Route::post("makePost/{section}", 'HomeController@makePostPost');
//  End

// See post
Route::get("/post/{id}", 'HomeController@showPost');


// Make a reply to a post
Route::post('/post/{id}/replyToPost', 'HomeController@replyToPost');


// Testing Iframe, ignore the "upvote", its not just for that
Route::get("/vote/upvote/{id}", function($id){

    $voteOptions = post_likes::all()->where('votedToPostID', $id)->where('votedByUser', Auth::user()->username)->first();

    // dd($voteOptions);

    $onlyLikes = post_likes::all()->where('votedAmount', '!=', '0')->where('votedToPostID', '==', $id);

    return view('vote_system/upvote', ['OP' => Auth::user() ,'id' => $id, 'voteOptions' => $voteOptions, 'onlyLikes' => $onlyLikes]);
});

Route::post("/vote/{option}/{id}", 'HomeController@voteSystem' );


Route::get("/profile/{id}", 'HomeController@profile');


// Change passwords
Route::get('/change/password', function(){

    return view('changePassword', ['userInfo' => Auth::user()]);

});

Route::post('/changePassword', 'HomeController@changePassword');