<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="post" action="{{url('searchResult')}}">
	{{csrf_field()}}
	<input type="text" name="searchinput"/>
	<input type="submit" value="Search"/>
	</form>
</body>
</html>