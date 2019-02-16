<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .iframeForm {
            display: inline;
            
        }

        .myButton {
	background-color:#6cbbf0;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #ffffff;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;

	padding:5px 15px;
	text-decoration:none;
    text-shadow:0px 1px 0px #50d63c;
    
   
}
     </style>

       

    @if (!empty($voteOptions) && $voteOptions->votedAmount != 0 && $OP->username == $voteOptions->votedByUser)
         <form class="iframeForm" action="{{$id}}" method="post">
        {{csrf_field()}}
        <input type="hidden" value="unlike" name="option">
        <button class="myButton" type="submit">Unlike</button>
 
    </form>
    @else
     <form class="iframeForm" action="{{$id}}" method="post">
        {{csrf_field()}}
        <input type="hidden" value="like" name="option">
        <button class="myButton" type="submit">Like</button>
 
    </form>


        

    @endif

    <span> 
    Likes: {{ count($onlyLikes) }}
    </span>
   


       
    


    </body>
</html>