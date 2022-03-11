<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Requests</title>
	    <link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/home.css')}}">
    <script src="{{asset('src/js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('src/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('src/css/notification.css')}}">
<!-- icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    
    

	 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>
<body>
<!-- 			<notification :unreads="{{auth()->user()->unreadnotifications}}"></notification>
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
            

        <li ><a href="{{url('profile',['id' => Auth::User()->id])}}" id="profile">{{Auth::User()->name}}</a></li>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('trips')}}">Trips</a></li>
        <li><a href="#">Inbox</span></a></li>
           <li>
          <div class="dropdown">
        <a onclick="fun();" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-bell 
"></span>Request <span class="badge">{{count(auth()->user()->unreadnotifications)}} </span>
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


         
         <li style="color: red"> <span style="margin-right: 7px" class="fa fa-close"></span>{{$array2[$i][0]['name']}} Refuse Your Request . <br> </li>

          @else

          <li style="color: green"><span style="margin-right: 7px" class="fa fa-check-square"></span>{{$array2[$i][0]['name']}} Accept Your Request . <br> </li>

          @endif

          @endfor

          </ol>
        
          </div>
         

         
          <h6  style="text-align: center;margin-top: 10px"><a href="{{url('request')}}" style="color: blue">All requests</a></h6>
        </div>
      </div>
  </li>

       <li><a href="{{url('map')}}">Map </a></li>

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
            <span class="glyphicon glyphicon-bell 
"></span>Request <span class="badge">{{count(auth()->user()->unreadnotifications)}} </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

          <h4>Requests</h4>

          @foreach (auth()->user()->unreadnotifications as  $notification)
          <ul>
                  @if($notification['type'] == 'App\Notifications\repliedToThread')
                  <li><p><span style="margin-right: 7px" class="glyphicon glyphicon-envelope"></span>{{$notification['data']['user']['name']}} Want To GetRide With You</p></li>

                <a style="padding: 3px;color: black;width: 30px" class="btn-default" href="{{ url('AcceptRequest',['user_id' => $notification['data']['user']['id'] ]) }}"><span style="margin-right: 7px" class="glyphicon glyphicon-ok"></span></a>

                 <a style="padding: 0px;color: black" class="btn-default" href="{{ url('RefuseRequest',['user_id' => $notification['data']['user']['id'] ]) }}"><span style="margin-right: 7px" class="glyphicon glyphicon-remove"></span></a>

                  @else
                    @if( $notification['data']['test'] == 'false') 
                      <li><p><span style="margin-right: 7px" class="glyphicon glyphicon-remove-circle"></span>{{$notification['data']['trip_user']['name']}} Refuse Your Request ..</p></li>
                    @else 
                <li><p><span style="margin-right: 7px" class="glyphicon glyphicon-ok-sign 
  "></span>{{$notification['data']['trip_user']['name']}} Accept Your Request ..</p></li>
              @endif
            @endif    
          </ul>
          @endforeach
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



  
    <div id="map" style="height: 90%;width: 100%"></div>


       <script>




 var btn = document.getElementById('btn');

           btn.onclick = function()
      {
        if(navigator.geolocation)
              {
                  navigator.geolocation.getCurrentPosition(getposition,showError);
              }
              else
              {
                  map.innerText = "Sorry ! Geolocation Not Supported !";
              }
            }

     

      var map;

      function initMap() {

        






        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 30.96, lng: 31.26},
          zoom: 10,

      
        });

        var bikeLayer = new google.maps.BicyclingLayer();
  bikeLayer.setMap(map);

@foreach($trips as $tripy)



 var geocoder = new google.maps.Geocoder();
          var address = "{{$tripy['from_point']}}";

          geocoder.geocode( { 'address': address}, function(results, status) {

          if (status == google.maps.GeocoderStatus.OK){  
              var latitude = results[0].geometry.location.lat();
              var longitude = results[0].geometry.location.lng();

          var image = 'http://icons.iconarchive.com/icons/bevel-and-emboss/car/64/jeep-icon.png';


         var myicon = {
            url:image,
            origin: new google.maps.Point(0, 0),
            scaledSize: new google.maps.Size(24, 24),
            anchor: new google.maps.Point(12, 12)
        };

          var marker = new google.maps.Marker({
          position: {lat: latitude, lng: longitude},
          map: map,
          title: "{{$tripy['from_point']}}",
          icon:myicon,
          optimized: false, 
        
      });

          // @foreach($rates as $rate)  @if($tripy["user"]["id"] == $rate["requester"])  @for($x = 0 ; $x < $rate["rate"];$x++)<i class="fa fa-star checked"></i> @endfor @endif @endforeach

          // @for($i = 0 ; $i  < count($rates) ;$i++) @if($tripy["user"]["id"] == $rates[$i]["requester"]) {{$test + $rates[$i]["rate"]}} @endif  @endfor 



        var d = new Date();
       $timeNow = d.getHours()+":"+"00"+":"+"00";


          var contentString = '<div style="text-align:center"><img style="height:50px;width:50px;border-radius:50%;" src="{{$tripy["user"]["profile_pic"]}}"><br><h4>{{$tripy->user["name"]}}</h4><h6>@foreach($rates as $rate)  @if($tripy["user"]["id"] == $rate["requester"])  @for($x = 0 ; $x < $rate["rate"];$x++)<i class="fa fa-star checked"></i> @endfor @endif @endforeach</h6></div>'+ '<div><table class="table"><tr><td>From</td><td>{{$tripy["from_point"]}}</td></tr><tr><td>To</td><td>{{$tripy["to_point"]}}</td></tr><tr><td>Time</td><td>{{$tripy["TakeoffTime"]}}</td></tr><tr></tr><tr><td>Date</td><td>{{$tripy["TakeoffDate"]}}</td></tr><tr><td>Seats</td><td>{{$tripy["seats"]}}</td><tr></table></div>'+'<div style="color:black;font-weight:bold;;float:left">@if(Auth::User()->id == $tripy->user->id)   @else   <a style="text-align:center" class="x btn btn-primary" href="{{ url("connect",["$user" => $tripy["user"], "trip" => $tripy]) }}">Book</a>  @endif    </div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

 marker.addListener('click', function() {
    infowindow.open(map, marker);
  });


         } 
          }); 



@endforeach
       
       

          
    }










     
        

      

        

    



  </script>























 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="{{asset('src/js/home.js')}}"></script>
        <script src="{{asset('src/owlcarousel/dist/owl.carousel.min.js')}}"></script>    <!-- Include all compiled plugins (below), or include individual files as needed -->

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