<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

       #maindiv{
        margin-top: 100px;
        background-color: red
       }
       .x{
        background-color: yellow;
        color: black;
        font-weight: bold
       }

     

  </style>
  <title>Requests</title>
      <link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/home.css')}}">
    <script src="{{asset('src/js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('src/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('src/css/notification.css')}}">
<!-- icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('src/css/notification.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('src/css/notifications.css')}}">  

   <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>
<body>
<!--      <notification :unreads="{{auth()->user()->unreadnotifications}}"></notification>
 -->

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
        <span></span>Request <span class="badge"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

          <h4></h4>

         <div class="notification">
          <ol>

          
          </ol>
        
          </div>



         
          <!-- <h6><a href="{{url('request')}}" >All requests</a></h6> -->
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
        <span class="glyphicon glyphicon-bell"></span>Request <span class="badge"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

          <h4></h4>

         <div class="notification">
          <ol>
          </ol>
        
          </div>



         
<!--           <h6><a href="{{url('request')}}" >All requests</a></h6>
 -->        </div>
      </div>
  </li>

       <li><a href="{{url('map')}}">Map </a></li>

        <li class="text-center"><a href="{{route('logout')}}"><span class="glyphicon glyphicon-off"></span>ut </a></li>
       
</div> 

      
       
         </div>
      </ul>

</div>
<header>
  
<div class="container">
    <div style="margin-top: 90px" class="main">
  <h1 style="color: slategrey">Requests</h1>
<!--
  @foreach($NotificationsRequests as $value)
  
  {{$value['data']['test']}}
  @endforeach
<-->
 

  @for($i = 0 ; $i < count($id) ; $i++)
  <div style="background-color: #49bda6;color: white;font-weight: bold;padding:10px;margin-top: 5px ">
    <img sizes="" src="{{$id[$i][0]['profile_pic']}}" style="height: 60px;width: 60px;border-radius: 50%">
    <a style="color: white" href="{{url('profile',['id'=>$id[$i][0]['id']])}}">{{$id[$i][0]['name']}}</a>

    @if($tests[$i] == 'true')

    Accept Your Request <a class="btn btn-primary x" style="background-color: yellow;color: black;font-weight: bold" href="{{url('profile',['id'=>$id[$i][0]['id']])}}">Chat</a>
    
    @else
  Refuse Your Request
    @endif
</div>
    <br>
       
  @endfor

  


</header>


 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="{{asset('src/js/home.js')}}"></script>
 <script src="{{asset('src/owlcarousel/dist/owl.carousel.min.js')}}"></script>  
          <!-- Include all compiled plugins (below), or include individual files as needed -->

 <script type="text/javascript">function openNav() {
    document.getElementById("mySidenav").style.height = "320px ";


}

function closeNav() {
    document.getElementById("mySidenav").style.height = "0";
}</script>

  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN6o9n94k4s0TVSjVbzguAVdP9vMvkOs8&callback=initMap"
    async defer></script>


    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>

    
  

</body>
</html>