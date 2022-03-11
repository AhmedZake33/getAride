<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


	<link href="{{asset('src/css/bootstrap.min.css')}}" rel="stylesheet">

    <style type="text/css">

    body{
    	background-color: white
    }
    
    	
.posts{

	height: auto;
	margin-top: 15px; 
	
}
.posts .PostOwner{
 background-color:#d6e7ef;
 height: 150px;
 margin-top: 10px

}

.posts .PostInfo{
 background-color:#d6e7ef;
 height: 150px;
 margin-top: 10px

}
.posts .PostDetails{
 background-color:#d6e7ef;
 height: 150px;
 margin-top: 10px

}
.main{
	text-align: center;
}
span{
	color: black;
	background-color: gray;
	padding: 7px
}

    </style>

</head>
<body>

	<h1 style="color: blue;text-align: center;">Searching Result</h1>


	@isset($trip)
	@foreach($trip as $ones)

{{$ones}}



	<div class="container">
		<div class="posts row">
			<div class="PostOwner col-xs-12 col-md-12 col-lg-4">

				<div class="main">
				<img src="{{$ones->user->profile_pic}}" style="height: 75px;width: 75px;border-radius: 50px" /> <br>
					<h4>{{$ones->user->name}}</h4>
				
				</div>
			</div>
			<div class="PostInfo col-xs-12 col-md-12 col-lg-4">

					<div class="main">
						<span>From</span>{{$ones->from_point}}<br><br>
						<span>To</span>{{$ones->to_point}}<br<
					</div>

			</div>
			<div class="PostDetails col-xs-12 col-md-12 col-lg-4">

					

			</div>

		</div>

	</div>



	@endforeach


	@endisset



 

	 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>



</body>
</html>