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
<div class="container-fluid" id="back-img">
	<a href="" class="clickarea" style="opacity: .4;background: #09121A;"></a>
	<img src="{{Storage::url($beasiswa->alamat_gambar)}}" style="width:100%;"  alt=""/>   
</div>
<div class="container single " style="background-color: #fff;">
    <div class="row" style="padding: 20px;">
        <div class="col-lg-8 post-single">
	           <div class="post-image-single">
					<a href="" title="{{$beasiswa->nama_beasiswa}}" >
						<img width="500" height="282" src="{{Storage::url($beasiswa->alamat_gambar)}}" class="img-single-post " alt=""/>                            
					</a>
				</div><!-- end of post-image -->

                <div id="post-145" class="post-145 ">
                    <div class="page-header">
                        <h3 class="post-title-single">{{$beasiswa->nama_beasiswa}}</h3>
                    </div><!-- end of .page-header -->
                    <div class="post-entry-single spacer10">
	                </div><!-- end of .post-entry -->
                    <div class="post-data">
                    	<h5> Deskripsi </h5>
                    	{!!$beasiswa->konten!!}
               		</div> <!-- end of.post-data -->
				</div><!-- end of #post-145 -->
		</div>
		<div class="col-lg-4" style="height: auto;">
				<div class="row">
				<div style="margin-left: 15px;border:0;">
					<div class="info-flex">
						<div class="main-flex">
							<div class="child-flex">
							<img src="/img/icon-white/Schedule_48px.svg">
						</div>
						<div class="child-flex">
							<div>
								<h4 style="font-weight: bold;">Batas Akhir Pendaftaran</h4>
								<p>{{\App\Http\Helper\Upload::changedate(\Carbon\Carbon::parse($beasiswa->masa_berlaku)->formatLocalized('%A')) . ", " .\Carbon\Carbon::parse($beasiswa->masa_berlaku)->formatLocalized(' %d %B %Y')}}</p>
								<p> 00:00 AM</p>
						     </div>
						</div>
						</div>
						<div class="main-flex">
							<div class="child-flex">
							<img src="/img/icon-white/Marker_48px.svg">
						</div>
						<div class="child-flex">
							<div>
								<h4 style="font-weight: bold;">Lokasi Penyedia</h4>
								<p>{{$beasiswa->facilitator->alamat}}</p>
								<!-- <p>{{$beasiswa->facilitator->kode_pos.  " ".$beasiswa->facilitator->kota . ", ". $beasiswa->facilitator->provinsi }}</p> -->
								<button class="btn btn-info"  id="seeMap">Lihat Peta</button>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>

              <div class="row"  id="daftar">
				<div class="col-md-11 col-lg-11 col-sm-11 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 un-fixed" >
						@if(Auth::guest())
							<h5> Silahkan Masuk Terlebih Dahulu </h5>
							<a href="{{route('login')}}" class="btn btn-login">Masuk / Daftar</a>
						@else
							@if(!(Auth::user()->facilitator == $beasiswa->facilitator))
									@if(Auth::user()->scholarship()->where('scholarship_id', $beasiswa->id)->first() == null)
										<h5> Daftar Beasiswa </h5>
										<a data-toggle="modal" data-target="#myModal" class="btn btn-daftar">Daftar</a>
									@else
										<h5> Anda sudah mendaftar pada beasiswa ini, mau cek status beasiswa anda ? </h5>
										<a href="{{route('user-status', [$beasiswa->id])}}" class="btn btn-daftar">Cek Status</a>
									@endif
							@else 
							<h5> Hey {{$beasiswa->facilitator->user->username}} , Mau Update Beasiswa ? </h5>
								<a href="{{route('editList', ['id' => $beasiswa->id])}}" class="btn btn-edit">Edit</a>
							@endif
						@endif
				</div>
              </div>
        </div><!--tutup col lg 4-->
	</div>
	<div class="row" id="member">

		<div class="col-lg-8">
			<h3>Mereka saja sudah daftar, kamu ?</h3>
			 <hr >
			@foreach($beasiswa->user as $user)
				@php 
					$nama = substr($user->nama_depan . " " . $user->nama_belakang, 0,9);
					$foto = ($user->img_url != null)?$user->img_url:"/img/img_url/malo.png"
				@endphp
				<div class="col-lg-2 col-sm-6 col-md-2">
					<a href="{{route('single-user', [$user->str_slug])}}" class="clickarea"></a>
					<img src="{{Storage::url($foto)}}" class="rounded-md">
					<p> {{$nama . " ..."}}</p>
				</div>		
			@endforeach	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
        	<div class="post-meta-single">
				<div class="author-wrap spacer10">

					<a href="" class="clickarea" style="opacity: .95;background: #09121A;"></a>
					<div class="author-avata spacer10">
						<img src='{{Storage::url($beasiswa->facilitator->img_url)}}'  class='avatar avatar-96 photo ' height='96' width='96' /> 
					</div><!-- end of .author-wrap -->
					<div class="author-info spacer10">
						<h3 >{{$beasiswa->facilitator->nama_instansi}}</h3>
						<p>"{{$beasiswa->facilitator->deskripsi_instansi}}"</p>
					</div><!-- end of .author-info -->
				</div><!-- end of #author-wrap -->
			</div><!-- end of .post-meta-single -->
        </div>
	</div>
	<div style="display:none">
		<p id="lat">{{$beasiswa->facilitator->lat}}</p>
		<p id="lng">{{$beasiswa->facilitator->lng}}</p>
	</div>
</div>
	<div class="row" style="margin-bottom: -50px;margin-top: 100px;">
		<div id="map"></div>
	</div>
<style>
	.modal-register > .modal-content > .modal-header{
		height: 300px;
    	overflow: hidden;
    	padding :0;
	}

	.modal-register > .modal-content > .modal-header > img{
		height: 100%;
	}

	.modal-register > .modal-content > .modal-header > button{
		position: absolute;
	    right: 10px;
	    top: 10px;
	    opacity: .9;
	    background: transparent;
	}
</style>
@if(!Auth::guest())
<div id="myModal" class="modal fade" role="dialog">
	<form action="{{route('addScholar', [$beasiswa->id])}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
        <div class="modal-dialog modal-register">
            <div class="modal-content">
                <div class="modal-header" >
                <img  src="{{Storage::url($beasiswa->alamat_gambar)}}" class="img-single-post " alt=""/>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding: 20px 40px">
                 	<h4 style="background: #fff;position: absolute;top: -200px;padding: 30px 20px;width: 85%;border-radius: 20px;text-align: center;color: #6ED2DE;"> <b>Terima kasih telah berniat untuk mendaftarkan diri anda pada program beasiswa {{$beasiswa->nama_beasiswa}} </b></h4>
                 	<p> Berikut ini berkas yang wajib anda lampirkan untuk mendaftar beasiswa : </p>
                 	<table class="table">
                
					    <thead>
					      <tr>
					        <th>Berkas</th>
					        <th>Gunakan Berkas Profil</th>
					      </tr>
					    </thead>
					    <tbody>
					      @if($beasiswa->berkas_diri != 0)
					      	 <tr>
						        <td><p>Berkas data diri (ex : KTP, KTM, KHS dan/atau KRS)</p></td>
						        <td>
					        	  	@if(Auth::user()->berkas_diri != null)
					        	  	<div class="switch-control">
						                <label class="switch">
						                     <input type="checkbox" name="berkas[]" value="berkas_diri" >
						                     <span class="slider round"></span>
						               </label>
						            </div>
						            @else
						            <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
					        	  	@endif
						        </td>
						   
						      </tr>
					      @endif
					        @if($beasiswa->ijazah != 0)
					      	 <tr>
						        <td><p>Ijazah dan Transkip NIlai terakhir</p></td>
						        <td>
						        		@if(Auth::user()->ijazah != null)
					        	 <div class="switch-control">
						                <label class="switch">
						                     <input type="checkbox" name="berkas[]" value="ijazah" >
						                     <span class="slider round"></span>
						               </label>
						            </div>
						            @else
						            <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
					        	  	@endif
					        	  
						        </td>
						   
						      </tr>
					      @endif
					        @if($beasiswa->organisasi != 0)
					      	 <tr>
						        <td><p>Surat pernyataan sedang tidak menerima beasiswa dari tempat lain</p></td>
						        <td>

						        		@if(Auth::user()->organisasi != null)
					           <div class="switch-control">
						                <label class="switch">
						                     <input type="checkbox" name="berkas[]" value="organisasi" >
						                     <span class="slider round"></span>
						               </label>
						            </div>
						            @else
						            <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
					        	  	@endif
					        	
						        </td>
						   
						      </tr>
					      @endif
					        @if($beasiswa->sp_beasiswa != 0)
					      	 <tr>
						        <td><p>Surat pernyataan sedang tidak menerima beasiswa dari tempat lain</p></td>
						        <td>
						        		@if(Auth::user()->sp_beasiswa != null)
					            <div class="switch-control">
						                <label class="switch">
						                     <input type="checkbox" name="berkas[]" value="sp_beasiswa" >
						                     <span class="slider round"></span>
						               </label>
						            </div>
						            @else
						            <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
					        	  	@endif
					        	 
						        </td>
						   
						      </tr>
					      @endif
					        @if($beasiswa->berkas_keluarga != 0)
					      	 <tr>
						        <td><p>Berkas keluarga (Foto-copy orang tua, kk, pbb)</p></td>
						        <td>
						        	 		@if(Auth::user()->berkas_keluarga != null)
					          	   <div class="switch-control">
						                <label class="switch">
						                     <input type="checkbox" name="berkas[]" value="berkas_keluarga" >
						                     <span class="slider round"></span>
						               </label>
						            </div>
						            @else
						            <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
					        	  	@endif
					        
						        </td>
						   
						      </tr>
					      @endif
					        @if($beasiswa->berkas_lain != null)
					      	 <tr>
						        <td><p>{{$beasiswa->berkas_lain}} <b>*ungga berkas dalam format Kompress (ZIP/RAR/GTZ)</b></p>
						        		<input type="file" name="file" id="berkas_lain">
						        </td>
						      </tr>
					      @endif
					    </tbody>
					   
  				</table>
                </div>
                <div class="modal-footer " style="padding :20px 40px">
                    <input type="submit" class="bg-green-color form-control" style="border:0;color:#fff;" value="Daftar">
                </div>
            </div>
        </div>
        </form>
</div>
@endif
@endsection

@section('js')
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxXjojezssyxk1TQLrl-8Qp4ZJUPz0hlw&libraries=places"></script>
<!-- ini kemaren bisa fix setelah pokoknya bisa deh -->


<script type="text/javascript">
	$('#seeMap').on('click', function(){
		$('html,body').animate({scrollTop: document.body.scrollHeight},"slow");
	});
		

   $(document).ready(function() {
   		var lat = $('#lat').text()
   		var lng = $('#lng').text()
		geoLocationInit(lat,lng)
   		$('body').css("background-color", "#f6f7f8");
   		$('.navbar-fixed-top').removeClass('navbar-scroll');
        $('.profile-toogle').removeClass('item-scroll');

        $(window).scroll(function () {
            // console.log($(window).scrollTop())
            if ($(window).scrollTop() < 300) {
                $('#daftar').removeClass('item-fixed');
            }
            else if ($(window).scrollTop() > 300) {
                $('#daftar').addClass('item-fixed');
             }
        });
    });
</script>
<script src="{{asset('js/maps.js')}}"></script>
@endsection