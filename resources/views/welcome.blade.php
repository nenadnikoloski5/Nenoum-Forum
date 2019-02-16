<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nenoum</title>

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
        </style>
    </head>
    <body>

          
            
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Forum</a>
                        <a href='{{ url("/profile/$user->id") }}'>Profile</a>
                        <!-- <a href="{{ url('http://localhost/forum/public/logout') }}">Logout</a> -->


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

            

               

                <ul class="forumSection">


                    <li class="forumOptionHeader">
                        IT</li>



                    <li class="forumIndSection">
                        <a href="generalIT" class="forumASection">General IT</a>
                        <div>
                            A place where we can talk about General IT
                        </div>

                        <div class="forumPostsAmount">
                            Posts: {{$generalITCount}}
                        </div>
                    </li>

                    <li class="forumIndSection">
                        <a href="ITNews" class="forumASection">IT News</a>
                    
                        <div>
                            Looking to talk about IT News? You are in the right place
                        </div>

                        <div class="forumPostsAmount">
                            Posts: {{$ITNewsCount}}
                        </div>
                    </li>


                    <li class="forumOptionHeader">
                        Life</li>


                    <li class="forumIndSection">
                        <a href="introduce" class="forumASection">Introduce Yourselves</a>
                        
                        <div>
                            Get to know each other!
                        </div>

                        <div class="forumPostsAmount">
                            Posts: {{$introduceCount}}
                        </div>
                    </li>
                    <li class="forumIndSection">
                        <a href="realLife" class="forumASection">Real Life</a>
                        
                        <div>
                            Planning on inviting people to a picnic? Write here
                        </div>

                        <div class="forumPostsAmount">
                            Posts: {{$IRLcount}}
                        </div>
                    </li>


                    <li class="forumOptionHeader">
                        PC</li>


                    <li class="forumIndSection">
                        <a href="hardware" class="forumASection">Hardware</a>
                    
                        <div>
                            Want to show off the new GPU that you just bought? This is the place
                        </div>

                        <div class="forumPostsAmount">
                            Posts: {{$hardwareCount}}
                        </div>
                    </li>
                    <li class="forumIndSection">
                        <a href="videoGames" class="forumASection">Video Games</a>
                        
                        <div>
                            Still playing World of Warcraft? Find others here!
                        </div>

                        <div class="forumPostsAmount">
                            Posts: {{$videogamesCount}}
                        </div>
                    </li>
                </ul>

                <br>
                <br>

                <ul class="newestPostsUl">
                    <h4 class="newestPostsHeader">Newest Posts</h4>
                    @foreach ($descPosts as $posts)
                        <li class="newestPostsLi">
                            <a href='{{ url("/post/$posts->id") }}'>
                             {{$posts->postTitle}}
                            </a>
                              
                            </li>
                            <hr>
                    @endforeach
                </ul>


            @else

           <div class="content">
                <div class="title m-b-md">
                    Nenoum
                </div>

                <div class="links">
                <a href="login">Login</a>
                <a href="register">Register</a>
                    
                   
                </div>
            </div>

            @endauth

           
        </div>
    </body>
</html>
