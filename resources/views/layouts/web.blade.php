<?php
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ayobeasiswa.me </title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Style -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/loading-bar.css">
    <link rel="stylesheet" href="/css/prism.css">   
    <link rel="stylesheet" href="/css/fa.css">
    <link rel="stylesheet" href="/css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @yield('css')
</head>
<body>

          
    <div class="content-loading">
        <div data-type="fill" class="loading-bar ldBar"></div>
    </div> 
 
    <div class="navbar navbar-default navbar-fixed-top navbar-scroll">
        <div class="container">
            <!-- Left Navbar Menu -->
            <div class="navbar-header">
                <a href="{{ route('dashboard') }}" class="navbar-brand"><img src="/img/icon.png" alt="">&nbsp AyoBeasiswa</a>
                <a href="#" class="navbar-brand visible-xs trigger-navbar"><i style="color:#fff" class="fa fa-ellipsis-v"></i></a>
            </div>

            <!-- Middle Navbar Menu -->
            <ul class="navbar-nav nav">
                <li><a href="{{ route('home') }}" class="item"><i class="fa fa-home"></i> Beranda</a></li>
                <li><a href="" class="item"><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Beasiswa</a></li>
                <li><a href="{{ route('home') }}" class="item"><i class="fa fa-search"></i> Cari Beasiswa</a></li>
                   @if (Auth::guest())
                        <a href="{{ route('login') }}" class="item profile-toogle item-scroll" style="color: #2DD6D9;
                        font-weight: bold;
                        background: #fff;">Masuk / Daftar</a>
                         </ul>
           
                        @else
                         </ul>
                         <ul class="navbar-nav navbar-right nav">
                              <li class="dropdown"><a class="dropdown-toggle profile item-scroll" data-toggle="dropdown" role="button" aria-expanded="false" class="item btn btn-info item"><img src="/img/img_ss/malo.png" class="rounded-small"></a>

                                <ul class="dropdown-menu" role="menu" >
                                    <li>
                                        <p>Profil</p>
                                        <p>Aria Samudera Elhamidy</p>
                                    </li>
                                    <li>
                                        @if (Auth::user()->isAdmin())
                                        <a class="item" href="{{route('dashboard')}}">
                                            Dashboard
                                        </a>
                                        <a class="item" href="{{route('single-user' , ["user" => Auth::user()->str_slug])}}">
                                            Pengaturan
                                        </a>
                                        @elseif(Auth::user()->isUser())
                                    
                                        <a class="item" href="{{route('single-user' , ["user" => Auth::user()->str_slug])}}">
                                            Pengaturan
                                        </a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="item">
                                            Keluar
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>

                            </li>
                        </ul>
                        @endif

            <!-- Right Navbar Menu -->
           
        </div>
    </div>

    <!-- Navbar Responsive -->
    <div class="navbar-responsive visible-xs"></div>
    
    @yield('content')
    <footer>
        <div class="container-fluid subscribe">
            <div class="row " style="margin:0;min-height:150px;">
                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-1 ">
                        <h5> Ingin Berita Terupdate?<br>Subscribe ayobeasiswa</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-9 ">
                        <div class="col-md-9  col-sm-9 no-pad-mar">
                        <div class="input-group" >
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        </div>
                        <div class="col-md-3 col-sm-3 no-pad-mar">
                        <input type="submit" value="Subscribe" class="btn form-control light-blue">
                        </div>
                    </div>
                </div>
            <div class="row">
               <div class="container">
                    <div class="col-md-3 col-sm-3 col-xs-12" style="text-align:center"> 
                        <img src="/img/icon.png" style="width:30px;">
                        <a style="color:#fff;font-weight:bold;display:block;">Ayobeasiswa.Me</a>
                        <p> Penghubung antara penyedia beaasiswa dan pencari beasiswa, baik pendidikan formal maupun informal </p>
                    </div>
                    <div class="col-md-3  col-sm-3 col-xs-12">
                        <p style="font-weight: bold;">Tentang Beasiswa</p>
                        <p><a href="#">Cara Mendaftar</a></p>
                    <p><a href="#">Hubungi Kami</a></p>
                    </div>
                    <div class="col-md-3  col-sm-3 col-xs-12">
                        <p style="font-weight: bold;">Ikuti Social Media Kami</p>
                    </div>
                    <div class="col-md-3  col-sm-3 col-xs-12">
                        <p style="font-weight: bold;">Download Aplikasi</p>
                    </div>
               </div>
            </div>
        </div>
        <div class="container-fluid" style="background:#05090D;min-height:40px;">
                <center style="margin-top:10px;"><p class="white-fonts" style="height:100%;padding-top: 10px;">Copyright by Team AyoBeasiswa</p></center>
           </div>
    </footer>
 <script type="text/javascript" src="/js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="/js/jquery.viewportchecker.js"></script>   
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/nicescroll.min.js"></script>
<script type="text/javascript" src="/js/loading-bar.js"></script>
<script type="text/javascript" src="/js/prism.js"></script>
<script type="text/javascript" src="/js/waypoints.min.js"></script>
<script type="text/javascript" src="/js/jquery.countup.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript" src="/js/bootstrap3-typeahead.js"></script>
<script type="text/javascript">
$('.form_date').datetimepicker({
    language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0

});

$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(10).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(10).fadeOut(500);
});
</script>
    <!-- Component Script -->


    <!-- Your Own Script -->
<script type="text/javascript" src="/js/home.js"></script>
@yield('js')
</body>
</html>
