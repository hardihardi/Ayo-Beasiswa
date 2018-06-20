@extends('layouts.web')

@section('content')
    <section class="content-home">
        <div class="wrap">
            <header>
                <div class="form-search">
                    <div class="row ">
                      
                        <div class="col-xs-1 visible-xs "></div>                      
                        <div class="col-md-3 col-sm-8 col-xs-10 col-md-offset-2 col-sm-offset-2 postri ">
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

                        <div class="col-md-6 col-sm-4  col-md-offset-1  header-title postup">            
                            <h1 > JANGAN RAGU <BR> &nbsp&nbsp&nbsp UNTUK SEKOLAH ! </h1>
                            <h4 > Kemudahan Mencari Beasiswa Ada Di Tangan Anda </h4>
                       </div>
                    </div>
                </div>

              </header>
            <div class=" container navigation ">
                <h1> Kategori</h1>
                <hr class="border_bottom">
                <img class="pattern_left" src="/img/aa.png">
                <img class="pattern_right" src="/img/aa.png">
                <div class="category postb">
                    <div class="col-md-3 grid-item">
                        <img src="img/cat/award.jpeg" alt="award">
                        <div class="grid-overlay">
                            <a href="#" class="btn btn-outline-info">Penghargaan</a>
                        </div>
                    </div>
                    <div class="col-md-3 grid-item">
                            <img src="img/cat/olharaga.jpg" alt="award">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Olahraga</a>
                            </div>
                    </div>
                    <div class="col-md-3 grid-item">
                            <img src="img/cat/penelitian.jpeg" alt="Penelitian">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Penelitian</a>
                            </div>
                    </div>
                    <div class="col-md-3 grid-item">
                            <img src="img/cat/yayasan.jpg" alt="Yayasan">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Yayasan</a>
                            </div>
                    </div>
                    <div class="col-md-3 grid-item" style="height : 420px;">
                            <img src="img/cat/luar.jpeg" alt="Luar Negeri">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Luar Negeri</a>
                            </div>
                    </div>
                    <div class="col-md-3 grid-item">
                            <img src="img/cat/swasta.jpeg" alt="Swasta">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Swasta</a>
                            </div>
                    </div>
                    <div class="col-md-3 grid-item">
                            <img src="img/cat/help.jpeg" alt="Bantuan">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Bantuan</a>
                            </div>
                    </div>
                    <div class="col-md-3 grid-item">
                            <img src="img/cat/computer.jpeg" alt="Komputer">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Komputer</a>
                            </div>
                    </div>
                    <div class="col-md-3 grid-item">
                            <img src="img/cat/studeng.jpeg" alt="Mahasiswa">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Mahasiswa</a>
                            </div>
                    </div>
                    <div class="col-md-6 grid-item">
                            <img src="img/cat/dalam.jpg" alt="Dalam Negeri">
                            <div class="grid-overlay">
                                <a href="#" class="btn btn-outline-info">Dalam Negeri</a>
                            </div>
                    </div>
                </div>
            </div>

              <div class="content-new">
                <div class="container-fluid data-post">
                    <div class="container">
                        <div class="header-create postdw ">
                            <h1>Terbaru </h1>
                            <h1>Beasiswa Terbaru </h1>
                         </div>
                        <div class="content-data">
                            <div class="row ">
                                @foreach($beasiswas as $key =>  $beasiswa) 
                                    @if ($key == 2) 
                                        <div class="col-sm-11 col-md-4 col-lg-4 postle">
                                    @else 
                                        <div class="col-sm-6 col-md-4 col-lg-4 postle">
                                    @endif
                                 
                                        <a href="{{route('single', ['name' => $beasiswa->str_slug ])}}" class="clickarea"></a>
                                        <div class="card-overlay">
                                           <img src="/img/search.svg" style="width: 100px;">
                                           <h3 class="btn-outline-info"> Selengkapnya</h3>
                                        </div>
                                        <div class="card">
                                             <figure class="name"><p>
                                                    {{$beasiswa->facilitator->nama_instansi}}
                                                </p>
                                                </figure>   
                                            <div class="card-header">
                                                    <img class="card-img-top" src="{{Storage::url($beasiswa->alamat_gambar)}}">
                                            </div>
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
                </div>
                <div class="container-fluid info-count">
                    <div class="content-data" >
                        <div class="row " style="text-align:center;">
                            <div class="col s12 m12 l12 transparent center-align huhu ">
                                <div class="col-md-4 col-sm-4 col-xs-12 postup">
                                    <img src="/img/scholar.png" class="counter-img">
                                    <h3 class="counter-font"><span class="counter">100</span>&nbsp&nbspBeasiswa</h3>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 postle">
                                    <img src="/img/apply.png" class="counter-img">
                                    <h3 class="counter-font"><span class="counter">20</span>&nbspPenyedia</h3>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 postri">
                                    <img src="/img/student.png" class="counter-img">
                                    <h3 class="counter-font"><span class="counter">209</span>&nbsp&nbspPencari</h3>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="container guide jackInTheBox ">
                        <div class="col-md-12 col-sm-12 col-xs-12 postb" style="text-align: center">
                            <h1 style="font-weight: bold;text-align: center;"> Kemudahan AyoBeasiswa</h1>
                            <hr class="garis">
                        </div>
                        <div class="row postle">
                            <div class="col-md-4 col-sm-4 col-xs-12 style-right ">
                                <img src="/img/guide/1.png" class="img-guide">
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12 style-left">
                                <h3><b> Login & Register </b></h3>
                                <h4> Membuat akun untuk mendaftar beasiswa</h4>
                            </div>
                        </div>

                        <div class="row postri">
                            <div class="col-md-8 col-sm-8 col-xs-12 style-right ">
                                <h3><b> Upload Berkas </b></h3>
                                <h4> Upload Berkas beasiswa pada profile anda</h4>
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-12 style-left ">
                                <img src="/img/guide/2.png" class="img-guide">
                            </div>
                        </div>

                           <div class="row postle">
                            <div class="col-md-4 col-sm-4 col-xs-12 style-right ">
                                <img src="/img/guide/3.png" class="img-guide">
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12 style-left ">
                                <h3><b> Mencari Beasiswa </b></h3>
                                <h4> Cari beasiswa yang sesuai dengan keinginan anda</h4>
                            </div>
                        </div>

                        <div class="row postri">
                            <div class="col-md-8 col-sm-8 col-xs-12 style-right ">
                                <h3><b> Mendaftar Beasiswa </b></h3>
                                <h4> Mendaftar beasiswa hanya dengan 1 kali klik apply</h4>
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-12 style-left ">
                                <img src="/img/guide/5.png" class="img-guide">
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