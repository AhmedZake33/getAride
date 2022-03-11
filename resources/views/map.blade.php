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
        <li><a class="neadernav" data-toggle="modal" data-target="#exampleModal" href="#">Search</a></li>
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

           <li style="color: green"><img src="{{$array2[$i][0]['profile_pic']}}" style="height: 30px;width: 30px;border-radius: 50px"><span style="margin-right: 7px" class="fa fa-check-square"></span><a  class="nameaccept" href="{{url('profile',['id'=>$array2[$i][0]['id']])}}">{{$array2[$i][0]['name']}}</a> Accept Your Request . <a id="chating"  href="{{url('profileChat',['$id'=>$array2[$i][0]['id']])}}" class="btn btn-primary">Chat</a><br> </li>
          @endif

          @endfor

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




function search()
    {
      var searchResult = $('#search').val();

      var datastring = 'name1=' + searchResult;

      $.ajax({
        type:'get',
        url:'{{URL::to("searchFortrip")}}',
        data:datastring,
        cache:false,
        success : function(data){

          console.log(data);

          $('#btnresult').val(data[0]['from_point']);
          $('#btnsearch').css('visibility','visible');

        },Error:function(data)
        {

        }
      });


      
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
        <input onchange="search()" type="text" id="search" class="form-control"><br>
        <button data-dismiss="modal"    id="btnsearch" class="btn btn-success" style="visibility: hidden;">Search</button>

        <div id="searchResult">


          <!-- <input type="text" id="btnresult"> -->
         
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


    
    <div id="map"></div>


       <script> 

     

      function initMap() {

      var map; 
      var directionsService = new google.maps.DirectionsService();
      var directionsDisplay = new google.maps.DirectionsRenderer();

      var current;


        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 30.0444, lng: 31.2357},
          zoom: 10,

      
        });

        directionsDisplay.setMap(map);


infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };


              var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                // alert("lat:" + lat + " lng:" + lng);
                codeLatLng(lat, lng);

                function codeLatLng(lat, lng) {
                        var latlng = new google.maps.LatLng(lat, lng);
                        geocoder.geocode({'latLng': latlng}, function(results, status) {
                          if(status == google.maps.GeocoderStatus.OK) {
                              console.log(results)
                              if(results[1]) {
                                  //formatted address
                                   var address = results[0].formatted_address;
                                   current = address;

                                   function xx(address)
                                   {
                                    var originInput = document.getElementById('origin-input');
                                    originInput.text(address);

                                   }


                                  // alert("address = " + address);
                              } else {
                                  alert("No results found");
                              }
                          } else {
                              alert("Geocoder failed due to: " + status);
                          }
                        });
               }


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

      new AutocompleteDirectionsHandler(map);  
      










$('#btnsearch').click(function(){

  var start = current;
  var end = $('#search').val();
  var request = {
    origin: start,
    destination: end,
    travelMode: 'DRIVING'
  };
  directionsService.route(request, function(result, status) {
    if (status == 'OK') {
      directionsDisplay.setDirections(result);

      var route = result.routes[0];



       for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              alert("The Distance Betwen "+current+"  and  "+$('#search').val()+" "+route.legs[i].distance.text);
            }

    }
  });

geocoder.geocode( { 'address': $('#search').val()}, function(results, status) {

          if (status == google.maps.GeocoderStatus.OK){  
              var latitude = results[0].geometry.location.lat();
              var longitude = results[0].geometry.location.lng();



          // var image = 'http://icons.iconarchive.com/icons/gakuseisean/ivista-2/48/Start-Menu-Search-icon.png';


      //    var myicon = {
      //       url:image,
      //       origin: new google.maps.Point(0, 0),
      //       scaledSize: new google.maps.Size(24, 24),
      //       anchor: new google.maps.Point(12, 12)
      //   };

        

      //     var marker = new google.maps.Marker({
      //     position: {lat: latitude, lng: longitude},
      //     map: map,
      //     title: "{{$tripy['from_point']}}",
      //     icon:myicon,
      //     optimized: false, 
        
      // });



        
          
 


         } 
          }); 


});





       
       

          
    }




  




  function AutocompleteDirectionsHandler(modal) {
        this.map = modal;
        input= document.getElementById('search');
        var auto= new google.maps.places.Autocomplete(input);


        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: 'eg'}
          };

          autocomplete = new google.maps.places.Autocomplete(input, options);


       
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


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN6o9n94k4s0TVSjVbzguAVdP9vMvkOs8&libraries=places&callback=initMap"
        async defer></script>

    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>

    
  

</body>
</html>