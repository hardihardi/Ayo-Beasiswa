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
    <link rel="icon" type="image/png" sizes="32x32" href="img/icon2.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Style -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/loading-bar.css">
    <link rel="stylesheet" href="/css/prism.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <link rel="stylesheet" href="/css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>

          <!-- Loading -->
    <div class="content-loading">
        <div data-type="fill" class="loading-bar ldBar"></div>
    </div>
    <!-- Partials Navbar -->
      <!-- Navbar -->
    <div class="navbar navbar-default navbar-fixed-top navbar-scroll">
        <div class="container">
            <!-- Left Navbar Menu -->
            <div class="navbar-header">
                <a href="{{ route('dashboard') }}" class="navbar-brand"><img src="/img/logo.png" alt=""></a>
                <a href="#" class="navbar-brand visible-xs trigger-navbar"><i class="fa fa-ellipsis-v"></i></a>
            </div>

            <!-- Middle Navbar Menu -->
            <ul class="navbar-nav nav">
                <li><a href="{{ route('dashboard') }}" class="item"><i class="fa fa-home"></i> Beranda</a></li>
                <li><a href="" class="item"><i class="fa fa-graduation-cap" aria-hidden="true"></i></i> Beasiswa</a></li>
                <li><a href="{{ route('home') }}" class="item"><i class="fa fa-search"></i> Cari Beasiswa</a></li>
                   @if (Auth::guest())
                        <a href="{{ route('login') }}" class="item profile-toogle item-scroll" style="border-left : 1px solid #becfdd;color:#6ed2de;font-weight: bold;">Masuk / Daftar</a>
                         </ul>
           
                        @else
                         </ul>
                         <ul class="navbar-nav navbar-right nav">
                              <li><a class="dropdown-toggle profile item-scroll" data-toggle="dropdown" role="button" aria-expanded="false" class="item btn btn-info item"><i class="fa fa-user"></i> Profile</a>

                            <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="item" style="color : #6ed2de;">
                                            Logout
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
    
    <section class="content-home">
        <div class="wrap">
            <header>
                <div class="backhome shadow">
                    <img src="/img/home.jpg" class="img-home">
                </div>
                <div class="form-search">
                    <div class="row post">
                        <div class="col-md-8 col-sm-4 header-title">            
                             <h1 > JANGAN RAGU <BR> &nbsp&nbsp&nbsp UNTUK SEKOLAH ! </h1>
                             <h4 > Kemudahan Mencari Beasiswa Ada Di Tangan Anda </h4>
                        </div>
                        <div class="col-xs-1 visible-xs"></div>
                        <div class="col-md-3 col-sm-8 col-xs-10 col-md-offset-0 col-sm-offset-2 post ">
                            <h4> Cari Beasiswa <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Sesuai Keinginanmu!!! </h4>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="search" name="search" placeholder="Nama Beasiswa" style="margin-top : 15px">
                                    <div class="input-group date form_date " data-date="2017-09-16T05:25:07Z" data-link-field="dtp_input1" style="margin-top : 15px;width : 49%;display:inline-table;">
                                          <input class="form-control form-control-lg""  style="margin-top:0" size="16" type="text" value="" readonly name="date"  placeholder="Date End" ><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                    </div>
                                     <select class="form-control" id="kategori" name="kategori" style="width:49%;display: inline;">
                                        <option>Luar Negeri</option>
                                        <option>Komputer</option>
                                        <option>Dalam Negeri</option>
                                        <option>Yayasan</option>
                                      </select>
                                      <input type="submit" class="btn btn-default submit-form light-blue" value="Cari" name="cari">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

              </header>
              <div class="navigation post" style="border-bottom:2px solid #edeff2">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/liber.png" class="category_icon">
                            <p class="huhu">Luar Negeri</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/Computer.png" class="category_icon">
                            <p class="huhu">Komputer</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/World_Cup.png" class="category_icon">
                            <p class="huhu">Olahraga</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/User_Groups.png" class="category_icon">
                            <p class="huhu">Yayasan</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/Student.png" class="category_icon">
                            <p class="huhu">Mahasiswa</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/Department.png" class="category_icon">
                            <p class="huhu">Swasta</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category" >
                            <img src="/img/icon-white/Parliament.png" class="category_icon">
                            <p class="huhu">Dalam Negeri</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/Gold_Medal.png" class="category_icon">
                            <p class="huhu">Penghargaan</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/Home.png" class="category_icon">
                            <p class="huhu">Bantuan</p>
                        </div>
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/Microscope.png" class="category_icon">
                            <p class="huhu">Penelitian</p>
                        </div>
                    </div>
              </div>
              <div class="content-new">
                <div class="container post">
                     <div class="header-create post">
                        <span class="number">New</span>
                        <h1>Beasiswa Terbaru </h1>
                     </div>
                    <div class="content-data">
                        <div class="row ">
                            @foreach($beasiswas as $beasiswa) 
                                <div class="col-sm-6 col-md-4 col-lg-4 post">
                                    <div class="card">
                                        <img class="card-img-top" src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif">
                                        <div class="card-block">
                                            <figure class="profile">
                                                <img src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif" class="profile-avatar" alt="">
                                            </figure>
                                            <div class="meta">
                                                <a></a>
                                            </div>
                                            <h4 class="card-title mt-3">{{ $beasiswa->nama_beasiswa}}</h4>
                                            <div class="card-text">
                                               Berlaku Sampai {{$beasiswa->masa_berlaku}}
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                           
                                            <small> {{ \Carbon\Carbon::parse($beasiswa->created_at)->diffForHumans()}}</small>
                                        </div>
                                     </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="etc" href="#">Lainnya</button>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="content-data" style="margin-top : 150px;">
                        <div class="asymmetric" id="">
                        <div class="row " style="text-align:center;">
                            <div class="col s12 m12 l12 transparent center-align huhu ">
                                <div class="col-md-4 col-sm-4 col-xs-12 post">
                                    <img src="/img/scholar.png" class="counter-img">
                                    <h3 class="counter-font"><span class="counter">100</span>&nbsp&nbspBeasiswa</h3>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 post">
                                    <img src="/img/apply.png" class="counter-img">
                                    <h3 class="counter-font"><span class="counter">20</span>&nbspPenyedia</h3>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 post">
                                      <img src="/img/student.png" class="counter-img">
                                    <h3 class="counter-font"><span class="counter">209</span>&nbsp&nbspPencari</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container guide " style="margin-top : 100px;">
                        <div class="col-md-12 col-sm-12 col-xs-12 post" style="text-align: center">
                            <h1 style="font-weight: bold;text-align: center;"> Kemudahan AyoBeasiswa</h1>
                            <hr class="garis">
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12 style-right post">
                                <img src="/img/guide/1.png" class="img-guide">
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12 style-left post">
                                <h3><b> Login & Register </b></h3>
                                <h4> Membuat akun untuk mendaftar beasiswa</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12 style-right post">
                                <h3><b> Upload Berkas </b></h3>
                                <h4> Upload Berkas beasiswa pada profile anda</h4>
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-12 style-left post">
                                <img src="/img/guide/2.png" class="img-guide">
                            </div>
                        </div>

                           <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12 style-right post">
                                <img src="/img/guide/3.png" class="img-guide">
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12 style-left post">
                                <h3><b> Mencari Beasiswa </b></h3>
                                <h4> Cari beasiswa yang sesuai dengan keinginan anda</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12 style-right post">
                                <h3><b> Mendaftar Beasiswa </b></h3>
                                <h4> Mendaftar beasiswa hanya dengan 1 kali klik apply</h4>
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-12 style-left post">
                                <img src="/img/guide/5.png" class="img-guide">
                            </div>
                        </div>
                </div>
                <div class="container-fluid subscribe post">
                   <div class="row my-dark-blue  ">
                         <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-1 ">
                        <h5> Ingin Berita Terupdate?<br>Subscribe ayobeasiswa</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-9 ">
                        <div class="col-md-10  col-sm-10 no-pad-mar">
                          <div class="input-group" >
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-2 no-pad-mar">
                           <input type="submit" value="Subscribe" class="btn form-control light-blue">
                        </div>
                    </div>
                    </div>
                </div>
                <footer>
                    <div class="container-fluid">
                       <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                           <img src="/img/logo.png" alt="">
                           <p> Penghubung antara penyedia beaasiswa dan pencari beasiswa, baik pendidikan formal maupun informal </p>

                           <p style="font-weight: bold">Download Aplikasi</p>
                        </div>
                        <div class="col-md-6  col-sm-6 col-xs-12">
                            <p style="font-weight: bold;">Tentang Beasiswa</p>
                            <p><a href="#">Cara Mendaftar</a></p>
                           <p><a href="#">Hubungi Kami</a></p>
                        </div>
                       </div>
                    </div>
                </footer>
              </div>
        </div>
    </section>


    <section id="partial-component"></section>
    </div>


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
</script>
    <!-- Component Script -->


    <!-- Your Own Script -->
    <script type="text/javascript" src="/js/home.js"></script>
</body>
</html>
