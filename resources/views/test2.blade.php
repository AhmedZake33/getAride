<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		.red{
			color: red
		}

		.blue{
			background-color: blue
		}
		#name{
			font-weight: bold;
			font-size: 50px
		}
	</style>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>


<button>Click</button>

<div id="main">

</div>	
<script type="text/javascript">
	
	window.onload = function(){

		for (var i = 0 ; i < 5;i++) {

		$x = document.createElement('p');
		$x.setAttribute("class","red , blue");
		$x.setAttribute("id","name");
		$text  =document.createTextNode('Welcome From JS');
		$x.appendChild($text);

		$div = document.getElementById('main');

		$div.appendChild($x);

		}

		
	}
</script>		


 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	
</body>

</html>