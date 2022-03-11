<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trips</title>

 <link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/home.css')}}">
    <script src="{{asset('src/js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('src/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/notification.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('src/css/notifications.css')}}">

<style type="text/css">
  .trip{
    margin-top: 80px
  }
  .chat{
  padding: 5px 5px;
  background-color: #00AFF5;
    color: white;
    font-size: 18px;
    border-radius: 8px;
    transition: 0.75s;
    width: 150px
}

</style>



<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
	
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



         
<!--           <h6><a href="{{url('request')}}" >All requests</a></h6>
 -->        </div>
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
           <div class="notification">
          <ol>

          @for($i = 0 ; $i < count($notication_ids) ; $i++)


          <li>{{$array[$i][0]['name']}} WantTo get  ride With you .


           <a class="notificationlink" href="{{ url('AcceptRequest',['user_id' => $array[$i][0]['id'] , 'notifiable' => $notication_ids[$i]]) }}"><span style="margin-right: 7px" class="glyphicon glyphicon-ok"></span></a>

            <a class="notificationlink"   href="{{ url('RefuseRequest',['user_id' => $array[$i][0]['id'] , 'notifiable' => $notication_ids[$i]]) }}"><span style="margin-right: 7px" class="glyphicon glyphicon-remove"></span></a>
            </li>


          @endfor

          @for($i = 0 ; $i < count($array2) ; $i++)

          @if($array3[$i] == 'false')


         <li style="color: red"> <span style="margin-right: 7px" class="glyphicon glyphicon-remove-circle"></span>{{$array2[$i][0]['name']}} Refuse Your Request . <br> </li>

          @else

          <li style="color: green"><span style="margin-right: 7px" class="glyphicon glyphicon-ok-sign 
  "></span>{{$array2[$i][0]['name']}} Accept Your Request . <br> </li>

          @endif

          @endfor

          </ol>
        
          </div>
         
 
<!--           <h6  style="text-align: center;margin-top: 10px"><a href="{{url('request')}}" style="color: blue">All requests</a></h6>
 -->        </div>
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





@foreach($trips as $trip)

<div class="container">
<div class="trip">

  <div class="trip_post trip_body2 col-md-12 col-sm-12 col-xs-12">

          <div class="col-md-3 col-xs-12 col-sm-3 text-center  info" style="padding: 30px">

            <a href="{{url('profile',['id' => $trip->user['id']])}}"><div style="background-image: url({{$trip->user['profile_pic']}})" class="img_profile"></div></a>
            <div class="first_name"><h3 id="car_owner"><a href="{{url('profile',['id' => $trip->user['id']])}}">{{$trip->user->name}}</a></h3></div>
  <h3 id="output"></h3>
          </div>
          <div class="col-md-3 col-xs-12 trip_road text-center col-sm-3 info">
            <h6 style="margin-bottom: 10px" id="from_point">{{$trip->from_point}}<span class="arrow-ie">→</span></h6>
            <h6 id="to_point">{{$trip->to_point}}<span class="arrow-ie">→</span></h6>
            @isset($trip->waypoint1)
              @isset($trip->waypoint2)
            <h6>Cities on Rout</h6>
            <ul>
            <li>{{$trip->waypoint1}}</li>
            <li>{{$trip->waypoint2}}</li>
          </ul>
              @endisset
            @endisset  

            <h5>{{$trip->TakeoffDate}}</h5>
            <h5>{{$trip->TakeoffTime}}</h5>
           <h5 style="margin: 0px;"> <a  class="read_more">Read More or Book</a></h5>
          </div>

          <div class="col-md-3 text-center vehicle col-xs-12  col-sm-3 info">
            <h6>Car Info</h6>
           <h5> Maruti Suzuki Swift</h5>
            <h5>KY14 JZH</h5>
            <h5>aviable seats </h5> <h5>{{$trip->seats}}</h5>
          </div>
           <div class="col-md-3 vehicle col-xs-12 text-center  col-sm-3 ">
            <h6 id="details">Ride Details</h6>
 <pre>
No pets
No Smoke
No Alcohol
</pre>
  
@if(Auth::User()->id == $trip->user->id)

@else
<a href="{{ url('connect',['$user' => $trip['user'], 'trip' => $trip]) }}" class="btn chat "></i> Connect </a><br><br>
 

@endif



          </div>
          <div class="price">{{$trip->price}} EGP</div>
        </div>
    </div>
</div>  
    @endforeach




 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>


	    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>

	     <script type="text/javascript" src="{{asset('src/js/home.js')}}"></script>
<script type="text/javascript">
	        function openNav() {
    document.getElementById("mySidenav").style.height = "320px ";


}

function closeNav() {
    document.getElementById("mySidenav").style.height = "0";
}


		function fun()
		{
			$.get('markasread');
		}

		

	</script>

</body>
</html>