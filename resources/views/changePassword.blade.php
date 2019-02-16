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

            #mainDiv{
                text-align: center;
              margin-top: 240px;
            }
        </style>
    </head>
    <body>
        <div class="">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Forum</a>
                        <a href='{{ url("/profile/$userInfo->id") }}'>Profile</a>
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

            <div id="mainDiv">

            

            <h4>Change your password</h4>
            <br>

            <form action="{{ url('/changePassword') }}" method="post">
                {{csrf_field()}}
                
                <input required type="password" name="newPass" placeholder="New Password" >
                <input required type="password" name="newPass_confirmation" placeholder="Confirm Password" >
                <input type="submit" value="Submit">
            </form>


            <br>


            @if ($errors->any())
            <ul class="errorsDisplay"> 
            @foreach($errors->all() as $error)
                <li> {{$error}}  </li>
            
            
            @endforeach
            </ul>
            @endif
        

        </div>

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
