<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
             <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            iframe {
                height: 43px;
                float: right;
            }

            .postReply {
                background: #e1e0e0;
            }

             textarea{
	width: 98%;	
	padding: 10px;
	
	border: solid 3px #98d4f3;	
	
}

.myButton {
    position: static
}

.forumSection {
    margin: auto;
    margin-top: 44px;
}
        </style>
    </head>
    <body>
        <div class="">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Forum</a>
                        <a href='{{ url("/profile/$OP->id") }}'>Profile</a>
                        <!-- <a href="{{ url('/logout') }}">Logout</a> -->

                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>

                     
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            @auth

            <br>
            <br>
           


            

            <ul class="forumSection">
                @foreach ($post as $post)
                    {{-- <li> 
                    {{$post->postTitle}}
                    <br>
                    {{$post->postBody}}
                     </li> --}}

              <li class="forumIndSection">
                 <span href="generalIT" class="forumASection">
                 {{$post->postedBy}}
                 ||
                 {{$post->postTitle}}

                 </span>
                <div>
                <hr>
                
                   {{$post->postBody}}

                    <iframe src='{{ url("/vote/upvote/$postID") }}' frameborder="0"></iframe> 
                   </div>

                 
                    </li>
                    
                    
                @endforeach

                @foreach ($post->postReplies as $reply)
               

                    <li class="forumIndSection postReply">
                            <span href="generalIT" class="forumASection">
                             {{$reply->replyByUser}}
                            
           
                            </span>
                           <div>
                           <hr>
                           
                           {{$reply->replyBody}}
           
                              
                              </div>
           
                            
                               </li>
                
    
               @endforeach

               <form action="{{$postID}}/replyToPost" method="post">
                {{csrf_field()}}
                <textarea name="replyBody" placeholder="Reply Body" id="" cols="30" rows="10">{{old("replyBody")}}</textarea>
                <input class="myButton" type="submit" value="Submit">
            </form>

            @if ($errors->any())
            <ul class="errorsDisplay"> 
            @foreach($errors->all() as $error)
                <li> {{$error}}  </li>
            
            
            @endforeach
            </ul>
            @endif
            <br>
            <br> 

            </ul>


             

           


           <br>
           <br><br>

          


            @else

           <div class="content">
                <div class="title m-b-md">
                    Nenoum
                </div>

                <div class="links">
                    <a href="login">Login</a>
                   
                </div>
            </div>

            @endauth

           
        </div>
    </body>
</html>
