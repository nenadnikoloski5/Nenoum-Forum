<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Post;
use App\post_replies;
use App\post_likes;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function section($section){

        
        $posts = Post::all()->where('postedAtForum', $section);
        // dd($posts);

        $userInfo = Auth::user();
       
        return view('section', ['userInfo' => $userInfo ,'section' => $section, 'posts' => $posts]);
    }

    public function makePost($section){
        // dd(Auth::user());

        $OP = Auth::user();

        return view('makePost', ['OP'=>$OP,'section'=> $section]);
    }

    public function makePostPost($section){
        // dd($section);

        request()->validate([
            'postTitle' => ['required', 'string', 'min:4', 'max:50'],
            'postBody' => ['required', 'string', 'min:4', 'max:50']
        ]);
        
        Post::create([
            'postedAtForum' => $section,
            'postedBy' => Auth::user()->username,
            'postedByID' => Auth::user()->id,
            'postBody' => request('postBody'),
            'postTitle' => request('postTitle'), 
            'likesAmount' => 0,
        ]);

        return redirect("$section");

    }

    public function showPost($id){

        $post = Post::all()->where('id', $id);
        // dd(User::all()->where('id', $post->postedByID));

        

        $OP = Auth::user();

        return view('post', ['post' => $post, 'postID' => $id, 'OP' => $OP]);
    }


    public function replyToPost($id ){
        // dd(request());

        request()->validate([
            'replyBody' => ['required', 'string', 'min:4', 'max:50']
        ]);

        post_replies::create([
            'replyToPostID' => $id,
            'replyByUser' => Auth::user()->username,
            'replyByIDUser' => Auth::user()->id,
            'replyBody' => request('replyBody')
        ]);


        return redirect("post/$id");
    }


    public function voteSystem($option, $id){

        // dd("what");
        if(request('option') === 'like'){
            
            

            $sqlstring = post_likes::all()->where('votedToPostID', $id)->where('votedByUserID', Auth::user()->id)->first();

            // dd(5);

            // default one:  || $sqlstring[0]->exists()
            if( !empty($sqlstring)){


                // dd(5555);

                $sqlstring->update([
                    'votedAmount' => 1
                ]);
            } else {

                // dd(10);
                post_likes::create([
                    'votedToPostID' => $id,
                    'votedByUser' => Auth::user()->username,
                    'votedByUserID' => Auth::user()->id,
                    'votedAmount' => 1
                ]);
            
            
            }
 
            // dd("anele");

        
               
           } else if(request('option') === 'unlike'){

            // dd(5324234234);

               $changeToUnlike = post_likes::all()->where('votedToPostID', $id)->where('votedByUserID', Auth::user()->id)->first();

            //    dd($changeToUnlike[0]);

               $changeToUnlike->update([
                'votedAmount' => 0
               ]);
           }

        //    dd("END");
        return redirect("vote/upvote/$id");

    }


    public function profile($id){

        // $userInfo = User::all()->where('id', $id);

        // dd(Auth::user());

        $path = "../../public/assets/profilePics/defaults/";

        // dd($path . Auth::user()->profilePic);

        return view('profile', ['path' => $path, 'userInfo' => Auth::user()]);
    }


    public function changePassword(){
        request()->validate([
            'newPass' => ['confirmed', 'required', 'alpha_num', 'min:6', 'max:50']
        ]);

        $sqlstring = User::all()->where('id', Auth::id())->first();

        // dd($sqlstring);

        $sqlstring->update([
            'password' => Hash::make(request('newPass'))
        ]);

        return redirect("/");
    }
}
