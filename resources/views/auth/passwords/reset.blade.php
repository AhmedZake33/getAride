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

    <div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-weight: bold">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #49bda6;border-color: #49bda6;">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


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