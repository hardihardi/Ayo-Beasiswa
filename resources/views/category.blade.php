@extends('layouts.web')
@section('profile')
@if(Auth::user()) 
    @if(Auth::user()->img_url != null)
     <img src="{{Storage::url(Auth::user()->img_url)}}" class="rounded-small"> 
     @else  
     <img src="/img/img_ss/malo.png" class="rounded-small"> 
     @endif
@endif
@endsection
@section('content')
<style>
	.container-fluid > header {
		height: 500px;
    position: relative;
	}

	.hero {
		height :500px;
		overflow: 	hidden;
		position: relative;
	}

	.hero > img {
		width: 100%;
		min-height:500px;
		position: absolute;
	}

	.clickarea2 {
		display: block;
	    z-index: 50;
	    position: absolute;
	    top: 0;
	    right: 0;
	    bottom: 0;
	    left: 0;
	    background-color: rgba(0,0,0,.8);
	}

	.hero  > h3 {
		color : #fff;
	}

	.hero > .title {
		position: absolute;
	    z-index: 100;
	    top: 160px;
	    right: 0;
	    margin-left: auto;
	    left: 0;
	    margin-right: auto;
	    width: 70%;
	}

	.hero > .title  >h1 {
		color: #2CC6CF;
   		font-size: 400%;
	}

	.hero > .title > h5 {
		color : #fff;
	}

	.search_box {
		z-index: 1000;
	    background: #fff;
	    position: absolute;
	    right: 0;
	    margin-left: auto;
	    left: 0;
	    margin-right: auto;
	    padding: 20px 30px;
	    border-radius: 10px;
	    box-shadow: -1px 2px 11px 4px rgba(66, 72, 78, 0.1);
	    bottom : -80px;
	}

	.content-data {
		margin-top : 170px;
	}

	.card-block {
		 position: absolute;
		  bottom: 60px;
		  left: 0;
		  padding: 10px 30px;
		color : #fff;
	}
</style>
<div class="container-fluid">
	<header>
		<div class="hero">
		<a class="clickarea2"></a>
		@if(isset($konten))
				<img src="{{$alamat_gambar}}" alt="{{$judul}}">
				<div class="title" >			
				<h1>{{ ucfirst(trans($judul))}}</h1>
				<h5>{{$konten}}</h5>
			@else 
				<img src="/img/img.jpg" alt="Beasiswa">
				<div class="title" >	
				<h1>Ayo Mencari Beasiswa!!</h1>
				<h5>Jangan ragu untuk mencari beasiswa, mungkin salah satu beasiswa yang tersedia di website ini adalah jodohmu</h5>
			@endif
		</div>
		</div>
		  <div class="col-md-7 col-sm-7 col-xs-10 search_box" style="z-index:1000;background: #fff; ">
            <form action="{{route('cari')}}" method="post">
                <div class="form-group">
                	 {{ csrf_field() }}
                    <input type="text" class="form-control form-control-lg" id="search" name="kata_kunci" placeholder="Nama Beasiswa" style="margin-top : 15px">
                    <div class="input-group date form_date" data-date="2017-09-16T05:25:07Z" data-link-field="dtp_input1" style="margin-top : 15px;width : calc(100%/3);display:inline-table;">
                          <input class="form-control form-control-lg"
                            style="margin-top:0" size="16" type="text" value="" readonly name="tanggal"  placeholder="Date End" ><span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                     <select class="form-control" id="kategori" name="kategori" style="width:calc(100%/3);display: inline;">
                     		<option value="semua">Semua</option>
                         	@foreach($kategori as $kategori_s)
	                         <option value="{{$kategori_s->judul}}">{{$kategori_s->judul}}</option>
	                       @endforeach
                      </select>
                      <input type="submit" class="btn btn-default submit-form light-blue" value="Cari" name="cari" style="width:calc(100%/3.2);margin-top:0px;display: inline;">
                </div>
            </form>
        </div>
	</header>
	<section id="content">
		    <div class="container content-data">
                <div class="row ">
                  	 @if ($beasiswas != null)
                   		 @foreach($beasiswas as  $beasiswa) 

	                            <div class="col-sm-6 col-md-4 col-lg-4 postle">                
	                            <a href="{{route('single', ['name' => $beasiswa->str_slug ])}}" class="clickarea"></a>
	                            <div class="card-overlay">
	                               <img src="/img/search.svg" style="width: 100px;">
	                               <h3 class="btn-outline-info"> Selengkapnya</h3>
	                            </div>
	                            <div class="card">
	                                 <figure class="name"><p>
	                                        @if (isset($beasiswa->nama_instansi))
	                                        	{{$beasiswa->nama_instansi}}
	                                        @else 
	                                        	{{$beasiswa->facilitator->nama_instansi}}
	                                        @endif
	                                    </p>
	                                    </figure>   
	                                <div class="card-header">
	                                        <img class="card-img-top" src="{{Storage::url($beasiswa->alamat_gambar)}}">
	                                         <div class="card-block">
			                                    <div class="meta">
			                                        <a></a>
			                                    </div>
			                                    <h3 class="card-title mt-3">{{ $beasiswa->nama_beasiswa}}</h3>
			                                 
			                                </div>
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
                   @endif
                </div>
            </div>
	</section>
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