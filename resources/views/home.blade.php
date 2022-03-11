<!DOCTYPE html>
<html lang="en">
  <head class="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/home.css')}}">
    <script src="{{asset('src/js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('src/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/owl.theme.default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('src/css/notification.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('src/css/notifications.css')}}">


<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

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

          <li style="color: green"><img src="{{$array2[$i][0]['profile_pic']}}" style="height: 30px;width: 30px;border-radius: 50px"><span style="margin-right: 7px" class="fa fa-check-square"></span><a  class="nameaccept" href="{{url('profile',['id'=>$array2[$i][0]['id']])}}">{{$array2[$i][0]['name']}}</a> Accept Your Request . <a id="chating"  href="{{url('profileChat',['$id'=>$array2[$i][0]['id']])}}" class="btn btn-primary">Chat</a><br> </li>

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
        <span class="glyphicon glyphicon-bell"></span>Request <span class="badge">{{count(auth()->user()->unreadnotifications)}} </span>
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


       
<header>


  <div class="img_background" id="img_">
     <div class="container">
      <div class="trip text-center"> 
        <div class="but" id="but_">
          <div class="  col-md-6 col-sm-6 col-xs-12"> <a href="#" id="offer_" class=" btn ">Offer a Ride</a></div>
         
          <div class="  col-md-6 col-sm-6 col-xs-12"> <a href="#" id="search_" class=" btn ">Search for a Ride</a></div>

        </div>
        
      </div>
       
     </div>
   </div>
 </header>
 
    



      <div class="container c bb" style="margin-top: 100px;">

    <form method="post">
        <div class=" ">   <div class="search_form" >

          <h2 class="text-center">Search for a Ride</h2>

          <div class="col-md-3 col-sm-3">
                <label>FROM:</label>
                <input type="text" name="searchinput"  id="search2" class="inpu" placeholder="Select city"  />
          </div>


          <div class="col-md-3 col-sm-3 ">
             <label>To:</label>
              <input type="text" name="to"  id="search" class="inpu" placeholder="Select city"  />
          </div>

        <div class="col-md-3 col-sm-3 ">
            <label>DATE:</label>
            <input type="date" name="date"  class="inpu" id="today"  />
        </div>

          <div class="col-md-3 col-sm-3 ">
               <label>Number of passenger:</label>
                <input type="number" name="seats" min="1"  class="inpu" placeholder="1" />
            </div>
        </div>
      </div>
    
        <br>

         <div class="text-center search_button ">
           <a id="search_trip" type="submit">Search</a>

        </div>

    </form>



    <script type="text/javascript">
      window.onload =   function (){  

        $('#search_trip').on('click',function(){


          $value = $('#search2').val();
          
          $.ajax({
            type : 'get', 
            url : '{{URL::to("getData")}}', 
            data : {}, 
            success : function(data){

              
              

              console.log(data[0][0] , data[1][0]);
             


              $('#from_point').text(data[0][0]['from_point']);
              $('#to_point').text(data[0][0]['to_point']);
              $('#car_owner').text(data[1][0]['name']);
              $('.price').text(data[0][0]['price']+ ' EGP');
              $('.type').text(data[0][0]['car_type']);
              $('.carNumber').text(data[0][0]['car_number']);
              $('#btnbook').text('Connect');
              $('.takeoff').text(data[0][0]['TakeoffTime']);
              $('#seats').text(data[0][0]['seats']);
              @if(Auth::user())

              @else
              $btn = document.createElement('button').setAttribute('class','btn btn-primary');
              $btn.setAttribute('id','btnbook');
              // $btn = document.getElementById('btnbook');
              $x= data[0][0]['id'];
              $y = data[1][0]['id'];
              $btn.setAttribute("href","connect/"+$y+'/'+$x);
              $xyz = document.getElementById('mainDiv').appendChild($btn);
              @endif
              $profile_pic = document.getElementById('profile_pic');
              $img = data[1][0]['profile_pic'];
              $profile_pic.setAttribute('background:');
              
              
              
        
            }
          });

        });

      }
    </script>        
      </div>
    </div>
        
      </div>

      @if(Session::has('message'))

      <script type="text/javascript">
        
        window.onload = function(){

          $('#modalTest').modal(1000);

        
        }
      </script>



  
      @endif

  <div class="modal fade" id="modalTest" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 style="color: #49bda6;font-family:serif;">Trip Created Successfully.</h3>
        </div>
        <div class="modal-footer">
          <button type="button" style="background-color: #49bda6;" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>



      <!--    ============offer ride  =-====      -->
      <div class="container offer d apper" >
        <h2 class="text-center">Offer a Ride</h2>
        <div class="col-md-6 col-sm-6 " style="border: 1px solid #ddd;    background-color: rgba(255, 255, 255, 0.4);">

          <form method="post" action="{{route('createTrip')}}">
           <label>From:</label>
          <input id="origin-input" class="form-control" type="text"
        placeholder="Enter an origin location" name="from">
<!--         <button class="btn btn-primary" onclick="xx();">Click</button>
 -->
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



        


      <div id="mode-selector" class="controls" style="display: none;">
        <input type="radio" name="type" id="changemode-walking" checked="checked">
        <label for="changemode-walking">Walking</label>

        <input type="radio" name="type" id="changemode-transit">
        <label for="changemode-transit">Transit</label>

        <input type="radio" name="type" id="changemode-driving">
        <label for="changemode-driving">Driving</label>
    </div>
      </div>
        <div class="col-md-6 col-sm-6 ">
          <div id="map" style="width: 100%; height: 550px; border: 1px solid black; background-color: #ededed;"></div>
        </div>

      </div>

      <!--============================== Posts ===========-============================= -->


          


          <!--  <script type="text/javascript">
            window.onload = function(){

              alert();

        $(".trip_body").addClass("apper_post");
        $('.c').addClass('apper_post');
        $('.frew').css("display","visible");
             $('html, body').animate({
                scrollTop: $(".trip_post").offset().top
            }, 1500);
            
              
            }
            
           </script>
 -->

           
     <div class="container  trip_body" id="resultTrip">
        <div class="sort text-center">
          <!-- <select>
                <option value="" disabled selected>Sort By:</option>

             <option>review</option>

            <option>low price</option>
             <option>Time</option>

          </select>
           -->
        </div>
        <div class="trip_post trip_body2 col-md-12 col-sm-12 col-xs-12">

          <div class="col-md-3 col-xs-12 col-sm-3 text-center  info">
            <div class="img_profile" id="profile_pic"></div>
            <div class="first_name"><h3 id="car_owner"><a href="#"></a></h3></div>
  <h3 id="output"></h3>
<!--             <div class="rate">
                 <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <br>
                            <p >3/5</p>
          </div>
 -->          </div>
          <div class="col-md-3 col-xs-12 trip_road text-center col-sm-3 info">
            <h6 style="font-size: 13px" id="from_point"><span class="arrow-ie"> → </span></h6>
            <h6 style="font-size: 13px" id="to_point"><span class="arrow-ie">→</span></h6>
<!--             <h6>Cities on Rout</h6>
 -->            <!-- <h5>Tanta , Banha </h5>
            <h5>13/5/2018 </h5>
 -->            <h5 class="takeoff"> 08:30 PM</h5>
           <h5 style="margin: 0px;"> <a  class="read_more">Read More or Book</a></h5>
          </div>

          <div class="col-md-3 text-center vehicle col-xs-12  col-sm-3 info">
            <h6>Car Info</h6>
           <h5 class="type"> Maruti Suzuki Swift</h5>
            <h5 class="carNumber">KY14 JZH</h5>
            <h5 >aviable seats </h5> <h5 id="seats"></h5>
          </div>
           <div class="col-md-3 vehicle col-xs-12 text-center  col-sm-3 ">
            <h6 id="details">Ride Details</h6>
 <pre>
No pets
No Smoke
No Alcohol
</pre>
<!-- <a href="" class="btn chat "> <i class="fas fa-comments"></i> Chat with owner </a>
 -->
 <!-- <a href="" class="book btn" id="btnbook">Connect</a>
 -->
 <ul id="mainDiv">
 </ul>
          </div>
          <div class="price"></div>
        </div>
      </div>

     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="{{asset('src/js/home.js')}}"></script>
        <script src="{{asset('src/owlcarousel/dist/owl.carousel.min.js')}}"></script>    <!-- Include all compiled plugins (below), or include individual files as needed -->

        <script type="text/javascript">function openNav() {
    document.getElementById("mySidenav").style.height = "320px ";


}

function closeNav() {
    document.getElementById("mySidenav").style.height = "0";
}</script>

    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<script type="text/javascript">


  var x= screen.height +"px" ;
     var y= (screen.height)/2 +"px";
            document.getElementById('img_').setAttribute("style","height:" + x);
            if (screen.height==768) {
               document.getElementById('img_').setAttribute("style","height:662px");

            }

        if (screen.height<=363) {        
          document.getElementById('but_').setAttribute("style","margin-top:"+y );
}
  else{
          document.getElementById('but_').setAttribute("style","margin-top:" + y);
        }

         var supportsOrientationChange = "onorientationchange" in window,
    orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

window.addEventListener(orientationEvent, function() {


     var x2=  screen.height +"px" ;
     var y2 = (screen.height)/2 +"px";
         document.getElementById('img_').setAttribute("style","height:" + x2);


      if (screen.height <= 363) {        
          document.getElementById('but_').setAttribute("style","margin-top:"+y2 );
}
  else{
         
        document.getElementById('but_').setAttribute("style","margin-top:" + y2);
        }
   
   


}, false);


  
          
</script>

        <script type="text/javascript">
          
          let today = new Date().toISOString().substr(0, 10);
            document.querySelector("#today").min = today;
        </script>



        <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 26.8206, lng: 30.8025},
          zoom:6
        });



if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                alert("lat:" + lat + " lng:" + lng);
                codeLatLng(lat, lng);

                function codeLatLng(lat, lng) {
                        var latlng = new google.maps.LatLng(lat, lng);
                        geocoder.geocode({'latLng': latlng}, function(results, status) {
                          if(status == google.maps.GeocoderStatus.OK) {
                              console.log(results)
                              if(results[1]) {
                                  //formatted address
                                   var address = results[0].formatted_address;

                                   function xx(address)
                                   {
                                    var originInput = document.getElementById('origin-input');
                                    originInput.text(address);

                                   }


                                  alert("address = " + address);
                              } else {
                                  alert("No results found");
                              }
                          } else {
                              alert("Geocoder failed due to: " + status);
                          }
                        });
               }

                var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
              var uluru = pos;
              var marker = new google.maps.Marker({position: uluru, map: map});
            map.setCenter(pos);
            map.setZoom(15);

          
          }, function() {
          });
        }
                  var geocoder = new google.maps.Geocoder();

        
        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var waypot=document.getElementById('waypoints');
        var waypot2=document.getElementById('waypoints2');
        var input= document.getElementById('search');
        var input2= document.getElementById('search2');
        var auto= new google.maps.places.Autocomplete(input);
        var auto2= new google.maps.places.Autocomplete(input2);

        
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

         var wayAutocomplete = new google.maps.places.Autocomplete(
            waypot, {placeIdOnly: true});

         var wayAutocomplete2 = new google.maps.places.Autocomplete(
            waypot2, {placeIdOnly: true});

       
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
        this.setupPlaceChangedListener(wayAutocomplete, 'way');
         this.setupPlaceChangedListener(wayAutocomplete2, 'way2');        
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
       
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        var checkboxArray2 = document.getElementById('waypoints2');

         if (checkboxArray2.value =='') {
            waypts.push({
              location: document.getElementById('destination-input').value,
              stopover: true
            });
          }
          else{
            
             waypts.push({
              location: checkboxArray2.value ,
              stopover: true
            });
          }


            if (checkboxArray.value =='') {
            waypts.push({
              location: document.getElementById('destination-input').value,
              stopover: true
            });
          }
          else{
             waypts.push({
              location: checkboxArray.value ,
              stopover: true
            });
          }


         


        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: document.getElementById('destination-input').value,

           waypoints: waypts,
          optimizeWaypoints: false,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmtogMn-U-X8mR9e1F4fdGBn0hsxFsbdg&libraries=places&callback=initMap"
        async defer></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
  </body>
</html>