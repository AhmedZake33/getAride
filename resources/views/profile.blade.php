<!DOCTYPE html>
<html lang="en">
  <head class="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/home.css')}}">
    <script src="{{asset('src/js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('src/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/profile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/notification.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('src/css/notifications.css')}}">



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



     @if(Session::has('status'))

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
          <h3 style="color: #49bda6;font-family:serif;">{{Session('status')}}</h3>
        </div>
        <div class="modal-footer">
          <button type="button" style="background-color: #49bda6;" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
    
<div class="container-wrapper">
  <div class="col-sm-3 col-md-3 col-xs-11 detail">

    @if(Auth::User()->id == $user[0]['id'])
    
          <button class="edit" data-toggle="modal" data-target="#myModal" style="outline: transparent;"><i class="fa fa-edit" style="outline: transparent;"></i>
          </button>

         @endif 

    
    
  

    <div onclick="popup();" style="background-image:url({{$user[0]['profile_pic']}})" class="img_photo">
     </div>


  <div class="modal fade" id="spain">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 id="par"></h4>
              
              
              </div>
              <div class="modal-body">

                <img height="500px" width="570px" class="imgModal" src="{{$user[0]['profile_pic']}}">
                  
              
              </div>
          </div>
          </div>
      </div>


     <script type="text/javascript">
       
       function popup()
       {
        $('#spain').modal();
       }
     </script>

     <!-- <img class="img_photo" src={{Auth::User()->profile_pic}}> -->
 
    <h2 class="text-center" style="color: #35675d;">{{$user[0]['name']}}</h2>


    <p> From : {{$user[0]['city']}} </p>
    <p> Age : 22</p>
    <div class="bio"><p>Write about yourself 
 like what are your Preferences, your Job. </p></div>

 @if(count($rates[0]) != 0)


          <p>Average Rating  <div class="text-center"> 
            @for($i = 0 ; $i < $rates[0][0]['rate'] ; $i++)
                  <span class="fa fa-star checked"></span>

                  @endfor

                            <p >{{$rates[0][0]['rate']}}/5</p>

                           

  <span style="font-weight: bold">Count Of Rating :       {{count($rates[0])}}</span>

  

      </div></p>

      @endif

    
    
  </div>

<!--  Making Review and Make Rate   -->
  <div class="col-md-7 col-sm-7 col-xs-12 review">
    <form  method="post" action="{{url('rate',['id' => $user[0]['id']])}}">
        @if($user[0]['id'] != Auth()->user()['id'])     

      <textarea name="review"  class="form-control" placeholder="Write your review " style="font-size: 20px;resize: none;"></textarea>
        <br>
           <div id="reviewStars-input">
      <input value="5" id="star-4" type="radio" name="reviewStars"/>
      <label title="gorgeous" for="star-4"></label>

      <input value="4" id="star-3" type="radio" name="reviewStars"/>
      <label title="good" for="star-3"></label>

      <input value="3" id="star-2" type="radio" name="reviewStars"/>
      <label title="regular" for="star-2"></label>

      <input value="2" id="star-1" type="radio" name="reviewStars"/>
      <label title="poor" for="star-1"></label>

      <input value="1" id="star-0" type="radio" name="reviewStars"/>
      <label title="bad" for="star-0"></label>
    </div>
      <input type="hidden" value="{{Session::token()}}" name='_token'/>
      <input type="submit" style="float: right;" class="btn share" name="" value="Rate">


 <div style="margin-top: 100px">





    @for($i = 0 ; $i < count($rates[0]) ; $i++)
      @if(empty($rates[0]))      
      @else
          
     <div id="mainreview"  style="background-color: #95bcad;color: white;padding: 30px;margin: 20px;line-height: 30px;text-align: center;">


        <a href="{{url('profile',['id'=>$raterUsers[$i][0]['id']])}}" style="color: white"><img src="{{$raterUsers[$i][0]['profile_pic']}}" height="50px" width="50px" style="border-radius: 50%"></a>
      <a href="{{url('profile',['id'=>$raterUsers[$i][0]['id']])}}" style="color: white"><p ><span id="rateruser">{{$raterUsers[$i][0]['name']}}</span></p></a>

      <small  id="review">{{$rates[0][$i]['review']}}</small><br>
      @for($x = 0 ; $x < $rates[0][$i]['rate'];$x++)
       <i class="fa fa-star checked"></i>
       @endfor
       <p> <span id="ratevalue">{{$rates[0][$i]['rate']}}</span> / 5</p>  

    </div>
  
      @endif

    
    @endfor
      </div>
      @else
       
     


    @for($i = 0 ; $i < count($rates[0]) ; $i++)
      @if(empty($rates[0]))

      <div class="mainreview">
          No Rates
      </div>

      @else

      <div id="mainreview"  style="background-color: #95bcad;color: white;padding: 30px;margin: 20px;line-height: 30px;text-align: center;">
      <p id="ratesTest" style="display: none;">{{$rates[0]}}</p>

        <a href="{{url('profile',['id'=>$raterUsers[$i][0]['id']])}}" style="color: white"><img src="{{$raterUsers[$i][0]['profile_pic']}}" height="50px" width="50px" style="border-radius: 50%"></a>

<!--         <div class="" style="background-image: url('{{$raterUsers[$i][0]['profile_pic']}}');height: 50px;width: 50px;background-position: center;background-size: cover;border-radius: 50%">
 -->
      <a href="{{url('profile',['id'=>$raterUsers[$i][0]['id']])}}" style="color: white"><p ><span id="rateruser">{{$raterUsers[$i][0]['name']}}</span></p></a>

      <p id="review" style="font-weight: bold;">{{$rates[0][$i]['review']}}</p>
      <div class="ratesvalues"> 
      </div>

       @for($x = 0 ; $x < $rates[0][$i]['rate'];$x++)
       <i class="fa fa-star checked"></i>
       @endfor
     

       <p style="font-weight: bold;"> <span class="ratevalue">{{$rates[0][$i]['rate']}}</span> / 5</p>


      
    </div>

      @endif

    
    @endfor

    </form> 


    <br>
    <br>
    <br>
      @endif

      
              
<br>

<div class=" revies">
  <div class="col-md-3 col-sm-3 col-xs-12"><div class="img-rview">
  
  </div></div>

  
</div>
 </div>
</div>





 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Edit Profile</h4>
        </div>
        <div class="modal-body ">
          <form action="{{url('editprofile')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="" style="border-radius:50%;text-align: center;" id="photo2">
              <img id="photo" style="height: 70px;width: 70px;border-radius: 50px;" src="{{$user[0]['profile_pic']}}">
    
            </div>
       
        <label>User Name</label>
        <input type="text" class="form-control" name="name" placeholder="Your Name">
        <label>Bio</label>
        <textarea style="resize: none;" class="form-control" placeholder="Write something about yourself "></textarea>
        <label>New Password </label>
        <input type="Password" class="form-control" placeholder="new Password" name="password">
        <label>Re-write Password </label>
        <input  type="Password" class="form-control" placeholder="confirm Password" name="confirm_password">
        <label>Profile Picture</label>
        <input  type="file" id="photo3" onchange="func();" class="form-control" name="profile_pic"><br/s>
        <input class="btn btn-primary" type="submit" name="" value="UPDATE">
        </form>

        </div>
        <div class="modal-footer text-center">
        </form>
        </div>
      </div>
      
    </div>
  </div>
 
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
 
  </body>
</html>