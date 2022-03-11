
<!DOCTYPE html>
<html lang="en">
  <head class="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{$user[0]['name']}}</title>

    <!-- Bootstrap -->
    <link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/home.css')}}">
    <script src="{{asset('src/js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('src/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/profile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/notification.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/notifications.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/chating.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/emoji.css')}}">
    
    



    <style type="text/css">
   
    </style>




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->






  </head>
  <body>
     <nav class="navbar">

        <div class="container">

        <div class="navbar-header col-md-2 col-sm-3 col-xs-4 ">

          <a class="navbar-brand" href="#"> <img src="{{asset('src/img/anylogo.png')}}"></a>
          
     
        
    </div>

    <div class="links">



      <ul>

        <li id="menu"><a  onclick="openNav();" id="coolaps"> <span></span> <span></span> <span></span></a></li>

          <div class="hide-link">
            

        <li ><a class="neadernav" href="{{url('profile',['id' => Auth::User()->id])}}" id="profile">{{Auth::User()->name}}</a></li>
        <li><a class="neadernav" href="{{url('/')}}">Home</a></li>
        <li><a class="neadernav" href="{{url('trips')}}">Trips</a></li>
        <li><a class="neadernav" href="{{url('chat')}}">Inbox</span></a></li>
           <li>
      <div class="dropdown">
        <a onclick="fun();" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span></span>Request <span class="badge">{{count(auth()->user()->unreadnotifications)}} </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

          <h4></h4>

         <div class="notification">
          <ol>

          @for($i = 0 ; $i < count($notication_ids) ; $i++)


          <li><img style="height: 30px;width: 30px;border-radius: 50px" src="{{$array[$i][0]['profile_pic']}}"><a class="name" href="#">{{$array[$i][0]['name']}}</a> WantTo get  ride With you .


           <a id="notificationaccept" class="notificationlink" href="{{ url('AcceptRequest',['user_id' => $array[$i][0]['id'] , 'notifiable' => $notication_ids[$i]]) }}"><span style="margin-right: 7px" class="glyphicon glyphicon-ok"></span></a>

            <a class="notificationlink"   href="{{ url('RefuseRequest',['user_id' => $array[$i][0]['id'] , 'notifiable' => $notication_ids[$i]]) }}"><span style="margin-right: 7px" class="glyphicon glyphicon-remove"></span></a>
            </li>


          @endfor

          @for($i = 0 ; $i < count($array2) ; $i++)

          @if($array3[$i] == 'false')


         <li style="color: red"><img src="{{$array2[$i][0]['profile_pic']}}" style="height: 30px;width: 30px;border-radius: 50px"> <span style="margin-right: 7px" class="fa fa-close"></span><a  class="namerefuse" href="{{url('profile',['id'=>$array2[$i][0]['id']])}}">{{$array2[$i][0]['name']}}</a> Refuse Your Request . <br> </li>

          @else

          <li style="color: green"><img src="{{$array2[$i][0]['profile_pic']}}" style="height: 30px;width: 30px;border-radius: 50px"><span style="margin-right: 7px" class="fa fa-check-square"></span><a  class="nameaccept" href="{{url('profile',['id'=>$array2[$i][0]['id']])}}">{{$array2[$i][0]['name']}}</a> Accept Your Request . <br> </li>

          @endif

          @endfor

          </ol>
        
          </div>



         
          <h6><a href="{{url('request')}}" >All requests</a></h6>
        </div>
      </div>
  </li>

       <li><a class="neadernav" href="{{url('map')}}">Map </a></li>

        <li class="text-center"><a href="{{route('logout')}}"><span class="glyphicon glyphicon-off"></span>ut </a></li>
          </div>
       
      </ul>
      
    </div>
      </div>
    </nav>

  
    

     <div id="mySidenav" class="sidenav text-center">
  
  <ul class="slide_menu">
        <div class="">
        <li><a href="javascript:void(0)" id="close" class=" text-center" onclick="closeNav()">&times;</a></li> 
        <div class="scroll"> 
         <li ><a href="{{url('profile',['id' => Auth::User()->id])}}" id="profile">{{Auth::User()->name}}</a></li>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('trips')}}">Trips</a></li>
        <li><a href="#">Inbox</span></a></li>
           <li>
          <div class="dropdown">
        <a onclick="fun();" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span></span>Request <span class="badge">{{count(auth()->user()->unreadnotifications)}} </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

          <h4>Requests</h4>

         

          @for($i = 0 ; $i < count($array2) ; $i++)

          @if($array3[$i] == 'false')


          {{$array2[$i][0]['name']}} Refuse Your Request . <br> 

          @else

          {{$array2[$i][0]['name']}} Accept Your Request . <br> 

          @endif

          @endfor


          <h6  style="text-align: center;margin-top: 10px"><a href="{{url('request')}}" style="color: blue">All requests</a></h6>
        </div>
      </div>
  </li>

       <li><a href="{{url('map')}}">Map </a></li>

        <li class="text-center"><a href="{{route('logout')}}"><span class="glyphicon glyphicon-off"></span>ut </a></li>
       
</div> 

      
       
         </div>
</ul>

</div>
<script type="text/javascript">


  function fun()
  {
    $.get('markasread');
  }

   
  </script>

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form
                            v-on:messagesent="addMessage"
                            :user="{{ Auth::user() }}"
                        ></chat-form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="{{asset('src/js/home.js')}}"></script>
       <script src="{{asset('src/owlcarousel/dist/owl.carousel.min.js')}}"></script>    <!-- Include all compiled plugins (below), or include individual files as needed -->


<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

  <script type="text/javascript">


        function fun()
        {
          $.get('markasread');

        }

   
  </script>


        <script type="text/javascript">function openNav() {
    document.getElementById("mySidenav").style.height = "320px ";

}


  

function closeNav() {
    document.getElementById("mySidenav").style.height = "0";
}</script>





    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>

   <script type="text/javascript" src="{{asset('src/js/profile.js')}}"></script>

   <script type="text/javascript" src="{{asset('src/js/emojiPicker.js')}}"></script>

  <script>
    (() => {
      new EmojiPicker()
    })()
  </script>

   
  </body>
</html>