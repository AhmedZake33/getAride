<!DOCTYPE html>
<html lang="en">
  <head class="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AnyW.T</title>

    <style type="text/css">
      


    </style>

    <!-- Bootstrap -->
    <link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('src/css/videoo.css')}}">
    <script src="{{asset('src/js//owl.carousel.min.js')}}"></script>
      <link rel="stylesheet" href="{{asset('src/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('src/css/owl.theme.default.css')}}">

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

        <div class="navbar-header col-xs-5">

          <a class="navbar-brand" href="#"> <img src="{{asset('src/img/anylogo.png')}}"></a>


          
     
        
    </div>

        <div class="signin  ">

          @if(Auth::User())
          <a href="{{url('profile')}}" id="profileLink" >{{Auth::User()->name}}</a>
          
          @else
          <a href="#" id="sign_in" >Sign in</a>
           <a href="#" id="signup">Sign Up</a>
          @endif


      </div>

      </div>
    </nav>
     <header >

      <div id="owl-demo" class="owl-carousel owl-theme">
 
  <div class="item" style="background-image:url({{URL::asset('src/css/friends.jpg')}})">

    <div class="disc"><h1>Share your Trip</h1></div>
  
</div>

<div class="item" style="background-image: url({{URL::asset('src/css/1d-carpool-karaoke.png')}});">

    <div class="disc"><h1>Meet new Friends</h1></div>
  
</div>

<div class="item" style="background-image: url({{URL::asset('src/css/disti.jpeg')}}); background-position: center;">

    <div class="disc"><h1>Reach your distination Easly</h1></div>
  
</div>

 
</div>
        
  <div class="down text-center"> <a href="#" title="ABOUT US"><span class="glyphicon glyphicon-menu-down"></span></a></div>

</header>

 @if(Session::has('confirm_email'))

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
          <h3 style="color: #49bda6;font-family:serif;">
            
            @if($confirm_email = Session::get('confirm_email'))

        <div class="alert alert-info">
          {{$confirm_email}}
        </div>

        @endif
        
   
          </h3>
        </div>
        <div class="modal-footer">
          <button type="button" style="background-color: #49bda6;" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>





<div class="container ">
  <div class="  form text-center" id="apper">
<a   id="close" href="#" onclick="myFunction()">&times;</a>
  <form action="{{route('login')}}" method="post" class="text-center">
      {{ csrf_field() }}

         <h6>Sign In</h6>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input placeholder="E-mail" class="mdl-textfield__input{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" />
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input placeholder="Password" class="mdl-textfield__input{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" />
        
  </div>
  <br>
   <div class="mdl-textfield mdl-js-textfield">
    <button class="btn btn-danger" type="submit" style="width: 100px;">Log in</button> <br><br>
       
        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
       <br/>
       <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
        </a>

    
  </div>
  

</form>

  
</div>


  

</div>


@include('partials.flash')
<div class="container ">


  
  <div class="sign_up text-center" id="sign-up">
<a   id="closeup" href="#" onclick="myFunction()">&times;</a>
  <form action="{{route('register')}}" method="post" class="text-center" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h6>Sign Up</h6>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"  style="width: 47%;">
    <input class="mdl-textfield__input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Full Name" />      
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"  style="width: 47%;">
    <input class="mdl-textfield__input" name="city" value="{{ old('city') }}" placeholder="Your City" />      
  </div>
  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 47%;">
    <input class="mdl-textfield__input{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" />
      
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 47%;">
    <input class="mdl-textfield__input{{ $errors->has('Mobile') ? ' is-invalid' : '' }}" type="text" name="Mobile" placeholder="Phone Number">

  </div>

   <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 47%;">
    <input class="mdl-textfield__input{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
                            
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 47%;">
    <input class="mdl-textfield__input" type="password" name="password_confirmation" placeholder="Confirm password">

  </div>

  <br>

  <div class="mdl-textfield mdl-js-textfield" style="width: 47%;">
        <input class="mdl-textfield__input{{ $errors->has('profile_pic') ? ' is-invalid' : '' }}" type="file" name="profile_pic">
          
       
        <label class="mdl-textfield__label" for="sample1" id="id">Your Photo</label>
  </div>

    <div class="mdl-textfield mdl-js-textfield" style="width: 47%;">
        <input class="mdl-textfield__input{{ $errors->has('profile_id') ? ' is-invalid' : '' }}" type="file" name="profile_id">
          
       
        <label class="mdl-textfield__label" for="sample1" id="id">Your ID (optional)</label>
  </div>

  <br/>
   <div class="mdl-textfield mdl-js-textfield" style="width: 47%; margin-bottom: 30px;
   padding: 0px;">
    <button class="btn btn-danger" type="submit" id="btnRegister">Register</button> 

    @if (count($errors)>0)

      @foreach ($errors->all() as $error)
  
      <script type="text/javascript">
        window.onload = function(){
        $('#exampleModal').modal();
  }
</script>
  @endforeach
    @endif
    
  </div>
</form>
</div>
</div>



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
      <h4 style="color: #49bda6;">You Must Fill These Data With Values :</h4>
            @if(count($errors) > 0)

            @foreach ($errors->all() as $error)
            <ul>
              <li><p> {{$error}} </p></li>
            </ul>
            @endforeach
            @endif
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container background" style="background-image: url({{URL::asset('src/css/header_background.png')}});
">
  <div class=" text-center bb">
    <h2>Main Reason</h2>
    <p>the sheer number of people driving alone. that all those empty seats in existing cars could be the beginning of a new travel network.   the world’s leading carpooling platform, connecting millions of people going the same way. Take a look at our journey so far!
</p>
  </div>
</div>

<div class="goals text-center">
  <h2>Features</h2>

  
<div class="container">
  <div class="col-md-4 col-sm-4  text-center "><div class="people"></div> <div class="font ">bring people together</div> </div>
<div class="col-md-4 col-sm-4 text-center"><div class="money"></div> <div class="font ">  Make & Save Money</div></div> 
  <div class="col-md-4 col-sm-4 text-center"><div class="sold"></div><div class="font "> A Better Environmentd</div></div>

  

</div>

<div class="container">
  <div class="col-md-4 col-sm-4 text-center "><div class="bimg" style="background-image: url({{URL::asset('src/css/time.png')}}); background-position: center center;"></div><div class="font">no schedule always available</div> </div>
<div class="col-md-4 col-sm-4 text-center"><div class="bimg" style="background-image: url({{URL::asset('src/css/cluture.jpg')}}); background-position: center; "></div> <div class="font">Nurturing new culture</div>
</div> 
  <div class="col-md-4 col-sm-4 text-center"><div class="bimg " style="background-image: url({{URL::asset('src/css/trust.png')}});"></div> <div class="font">Scaling Trust</div> </div>

  

</div>
   


</div>


<footer>
  
  <div class="container">
     <div class=" col-md-6 col-sm-6 col-xs-12">

          <a class="navbar-brand" href="#"> <img src="{{asset('src/img/fott.png')}}"></a>
          
         <h6> © Copyright 2018. All rights reserved.</h6>
          
     
        
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">

          <div class="input-group">
      <input type="text" class="form-control" placeholder="Coonect with us">
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button">Send <span class="lnr lnr-arrow-right"></span></button>
      </span>
         </div>
          
     
        
    </div>

  </div>
</footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="{{asset('src/js/any.js')}}"></script>
        <script src="{{asset('src/owlcarousel/dist/owl.carousel.min.js')}}"></script>    <!-- Include all compiled plugins (below), or include individual files as needed -->

       
    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('src/js/scripts.js')}}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    
  </body>
</html> 