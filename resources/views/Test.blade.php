<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Ajax</title>
	<link rel="stylesheet" type="text/css" href="{{asset('src/css/bootstrap.css')}}">
</head>
<body>
	<div class="container">
		<h3>Ajax Request</h3>

		<div class="col-md-8">
				
				<input type="text" name="search" id="search" class="form-control"><br/>
				<button type="submit" class="btn btn-primary"  id="GetRequest">GetRequest</button>


	
			
		</div>
	</div>

	<div class="container">

	<div class="data" id='data'></div>
		Name :<h2 id="id"></h2>
		From :<h2 id="from"></h2>

		To :<h2 id="To"></h2>

		<ul id="uorder">

			<hr/>
		</ul>

		 

		

	 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script src="{{asset('src/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript">


    	
    	$(document).ready(function(){

    		

    		$('#GetRequest').on('click',function(){


    			$value = $('#search').val();
    			
    			$.ajax({
    				type : 'get', 
    				url : '{{URL::to("getData")}}', 
    				dataType : 'JSON',
    				data : {'search' : $value}, 

    				success : function(data){


    					console.log(data);



    					$('#from').text(data[0][0]['from_point']);
    					$('#To').text(data[0][0]['to_point']);
    					$('#id').text(data[1][0]['name']);
    					
    					

    					console.log(data[1]['id']);



					// for (var i = 0; i < data.length; i++) {

					// 	console.log(data[i]);


					// 	for (var x = 0; x < data.length; x++) {
							
						




    					 // $('#uorder').append($("<li>").append(data[x][i]['id']));

    					 // $('#uorder').append($("<li>").append(data[x][i]['from_point']));
    					
    					 // $('#uorder').append($("<li>").append(data[x][i]['to_point']));


    					//  }
	    					 


    					// }
    					    					

    				}
    			});



    		});


    	});
    </script>


</body>
</html>