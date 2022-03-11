<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width: 100%;


    height: 100%;
    padding-top: 70px
      }
      
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .x{
        width: 100px;
        margin-top: 10px;
        font-size: 16px;
        font-family: verdanna;

      }
      .btn{
        background-color: #49bda6;
        color: white;
        border-color:#49bda6 
      }

  </style>
  <title>Map</title>
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
            <link rel="stylesheet" type="text/css" href="{{asset('src/css/home.css')}}">
             <script type="text/javascript" src="{{asset('src/js/home.js')}}"></script>







    
    

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
        <li><a class="neadernav" id="createTrip" href="#" data-toggle="modal" data-target="#creationTripModal" >Create Trip</a></li>
        <li><a class="neadernav" href="{{url('trips')}}">Search For Trip</a></li>
           <li>
     

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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Send</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="creationTripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <div class="container row">

          <div class="col-lg-3">
            <form method="post" action="{{route('createTrip')}}">
           <label>From:</label>
          <input id="origin-input" class="form-control" type="text"
        placeholder="Enter an origin location" name="from">

         <label>To:</label>

    <input id="destination-input" class="form-control" type="text"
        placeholder="Enter a destination location" name="to">
        Add cities on your route <a href=""> Add Stop cites</a>
           <input type="text" placeholder="First city" class="form-control" id="waypoints2" name="waypoint1">
          <input type="text" placeholder="second city" class="form-control" name="waypoint2" id="waypoints">

           <label>Date and time</label>
            <input type="date" class="form-control" name="date" style="width: 59%; float: left;">
             <input type="time" name="time" class="form-control" style="width: 40%; float: right;">

            <input type="text" class="form-control" placeholder="Type of vehicle" style="width: 59%; float: left;" name="car_type">
            <input type="text" class="form-control" placeholder="vehicle number" style="width: 40%; float: right;" name="car_number">



  <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: 59%; float: left;">
    <div class="input-group-addon" style="color: #00A39C; font-weight: bold; background: #fff;">EGP</div>
    <input type="number" class="form-control" id="inlineFormInputGroup" min="0.00" step="0.01" placeholder="price it's optional" name="price">
  </div>

  <input type="number" style="width: 40%; float: right;" min="1" placeholder=" Number of seats" name="seats">


   
  <textarea class="form-control" placeholder="  Ride details" style="border:1px solid #054752; font-size: 15px; color:#054752; font-weight: bold; " name="details"></textarea>

       <button type="submit" class="btn  btn-block" style="">Post</button> 
      <input type="hidden" value="{{Session::token()}}" name='_token'/>

       </form>                 
           
          </div>

          <div class="col-lg-3">
            <div id="map2" style="width: 100%; height: 100px; border: 1px solid black; background-color: #ededed;"></div>
          </div>


        </div>


       </div>


      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
      function initMap2() {

      var map2;
      map2 = new google.maps.Map(document.getElementById('map2'), {
          center: {lat: 30.0444, lng: 31.2357},
          zoom: 10,

      
        });
   }

</script>


  
    <div id="map"></div>


       <script>

     

      function initMap() {

      var map;   
      

        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 30.0444, lng: 31.2357},
          zoom: 10,

      
        });
infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

              var uluru = pos;



              var marker = new google.maps.Marker({position: uluru, map: map});

            map.setCenter(pos);
            map.setZoom(15);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);

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

        


        

       

          var contentString = '<div style="text-align:center"><a href="{{url("profile",["id"=>$tripy->user["id"]])}}"><img style="height:50px;width:50px;border-radius:50%;" src="{{$tripy["user"]["profile_pic"]}}"></a><br><a href="{{url("profile",["id"=>$tripy->user["id"]])}}" style="text-decoration:none;color:black"><h4>{{$tripy->user["name"]}}</h4></a><h6>@foreach($rates as $rate)  @if($tripy["user"]["id"] == $rate["requester"])  @for($x = 0 ; $x < $rate["rate"];$x++)<i class="fa fa-star checked"></i> @endfor @endif @endforeach</h6></div>'+ '<div><table class="table"><tr><td>From</td><td>{{$tripy["from_point"]}}</td></tr><tr><td>To</td><td>{{$tripy["to_point"]}}</td></tr><tr><td>Time</td><td>{{$tripy["TakeoffTime"]}}</td></tr><tr></tr><tr><td>Date</td><td>{{$tripy["TakeoffDate"]}}</td></tr><tr><td>Seats</td><td>{{$tripy["seats"]}}</td><tr></table></div>'+'<div style="color:black;font-weight:bold;;float:left">@if(Auth::User()->id == $tripy->user->id)   @else   <a style="text-align:center" class="btn x" href="{{ url("connect",["$user" => $tripy["user"], "trip" => $tripy]) }}">Book</a>  @endif  </div>';

         
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

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmtogMn-U-X8mR9e1F4fdGBn0hsxFsbdg&callback=initMap2"
        async defer></script>


    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('src/js/dashboard.js')}}"></script>

    

    
  

</body>
</html>