<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Admin </title>

       <link rel="stylesheet" href="/css/auth.css">

   
   <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

 <style>

.error_body {
width: 100%;
 display: flex; 
  justify-content: center;
  align-items: center;
}

.error_body > div  {
	text-align: center;
}

.error_body > div > h1 {
	color :#fff;
	font-size: 100px;
}

.error_body > div > img {
	height: 400px;
}



@media(max-width:768px){
.error_body > div > img {
	height: 200px;
}

.error_body > div > h1 {
	color :#fff;
	font-size: 50px;
}
}

</style>
</head>
<body>
<div class="error_body">
	<div>
		<img src="/img/icon.png" ">
		<h1 >404 URL NOT FOUND</h1>
	</div>
</div>
</body>
</html>
