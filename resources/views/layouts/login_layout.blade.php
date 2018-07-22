<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Admin </title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icon2.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Style -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">

    <!-- Your Own Style -->
    <link rel="stylesheet" href="/css/default.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/auth.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


   
   <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
        @yield('content')
    </div>

    <!-- Scripts -->
       <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

  
    <!-- Component Script -->
    <script type="text/javascript" src="/js/sweetalert.min.js"></script>
    
    <!-- Your Own Script -->
    <script type="text/javascript" src="/js/default.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
</html>
