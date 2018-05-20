@extends('layouts.web')

@section('content')
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
                                    <div class="input-group date form_date" data-date="2017-09-16T05:25:07Z" data-link-field="dtp_input1" style="margin-top : 15px;width : 49%;display:inline-table;">
                                          <input class="form-control form-control-lg"
                                            style="margin-top:0" size="16" type="text" value="" readonly name="date"  placeholder="Date End" ><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
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

           <!--    <div class="navigation post" style="border-bottom:2px solid #edeff2">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 category">
                            <img src="/img/icon-white/Liber.png" class="category_icon">
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
              </div> -->
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
                                    <a href="{{route('single', ['name' => $beasiswa->str_slug ])}}" class="clickarea"></a>
                                    <div class="card">
                                         <figure class="name"><p>
                                                {{$beasiswa->facilitator->nama_instansi}}
                                            </p>
                                            </figure>   
                                        <img class="card-img-top" src="{{$beasiswa->alamat_gambar}}">
                                        <div class="card-block">
                                           
                                            <figure class="profile-img">
                                                <img src="{{$beasiswa->facilitator->user->img_url}}" class="profile-avatar" alt="">
                                            </figure>
                                            <div class="meta">
                                                <a></a>
                                            </div>
                                            <h3 class="card-title mt-3">{{ $beasiswa->nama_beasiswa}}</h3>
                                         
                                        </div>
                                        <div class="card-footer">
                                           <div class="card-text">
                                               Berlaku Sampai {{$beasiswa->masa_berlaku}}
                                            </div>
                                          <!--  <div class="indicator">
                                                <span><i class="glyphicon glyphicon-eye-open"></i>101</span>
                                                <span><i class="glyphicon glyphicon-list-alt"></i>200</span>
                                                <span><i class="glyphicon glyphicon-pushpin"></i>5</span>
                                            </div> -->
                                               <p> {{ \Carbon\Carbon::parse($beasiswa->created_at)->diffForHumans()}}</p>
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
                   <div class="row my-dark-blue  " style="margin:0;">
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
            
              </div>
        </div>
    </section>


    <section id="partial-component"></section>
    </div>


@endsection

@section('js')
<script type="text/javascript">
   $(document).ready(function() {
        $('.counter').countUp({
            'time': 5000,
            'delay': 20
        });
        $(window).scroll(function () {
            // console.log($(window).scrollTop())
            if ($(window).scrollTop() < 10) {
                $('.navbar-fixed-top').addClass('navbar-scroll');
                $('.profile-toogle').addClass('item-scroll');
            }
            if ($(window).scrollTop() > 10) {
                $('.navbar-fixed-top').removeClass('navbar-scroll');
                $('.profile-toogle').removeClass('item-scroll');
             }
        });
    });
</script>
@endsection