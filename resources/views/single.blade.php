@extends('layouts.web')

@section('content')
<div class="container single margin-top-80" style="background-color: #fff;">
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
					<div class="post-meta-single">
						<div class="author-wrap spacer10">
							<div class="author-avata spacer10">
								<img src='{{Storage::url($beasiswa->facilitator->img_url)}}'  class='avatar avatar-96 photo img-user' height='96' width='96' /> 
							</div><!-- end of .author-wrap -->
							<div class="author-info spacer10">
								<h3 >{{$beasiswa->facilitator->nama_instansi}}</h3>
								<p>"{{$beasiswa->facilitator->deskripsi_instansi}}"</p>
							</div><!-- end of .author-info -->
						</div><!-- end of #author-wrap -->
					</div><!-- end of .post-meta-single -->
				</div><!-- end of #post-145 -->
		</div>
		 <div class="col-lg-4" style="height: auto;margin-top:7%">
              <div class="row">
				<div class="col-md-11 col-lg-11 col-sm-11 col-md-offset-1 col-lg-offset-1 col-sm-offset-1" >
					<div class="right-description">
						<!-- <div class="info-flex">
							<div class="child-flex">
								<img src="/img/info.svg" style="width:50%;">
							</div>
							<div class="child-flex">
								<div><h5>101 Pengunjung </h5><i class="glyphicon glyphicon-eye-open"></i></div>
								<div><h5>200 Quota </h5><i class="glyphicon glyphicon-list-alt"></i></div>
								<div><h5>5 Pendaftar</h5> <i class="glyphicon glyphicon-pushpin"></i></div>
							</div>
						</div> -->

					</div>
						@if(Auth::guest())
							<h5> Silahkan Masuk Terlebih Dahulu </h5><br>
							<a href="{{route('login')}}" class="btn btn-login">Masuk / Daftar</a>
						@else
							@if(!(Auth::user()->facilitator == $beasiswa->facilitator))
									@if(Auth::user()->scholarship()->where('scholarship_id', $beasiswa->id)->first() == null)
										<h5> Daftar Beasiswa </h5><br>
										<a data-toggle="modal" data-target="#myModal" class="btn btn-daftar">Daftar</a>
									@else
										<h5> Anda sudah mendaftar pada beasiswa ini, mau cek status beasiswa anda ? </h5><br>
										<a href="{{route('user-status', [$beasiswa->id])}}" class="btn btn-daftar">Cek Status</a>
									@endif
							@else 
							<h5> Hey {{$beasiswa->facilitator->user->username}} , Mau Update Beasiswa ? </h5><br>
								<a href="{{route('editList', ['id' => $beasiswa->id])}}" class="btn btn-edit">Edit</a>
							@endif
						@endif
				</div>
              </div>
        </div><!--tutup col lg 4-->

	</div>
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
					        @if($beasiswa->berkas_lain != "0")
					      	 <tr>

					      	 	@php

					      	 		$data = json_decode($beasiswa->berkas_lain);
					      	 		  foreach($data as $key => $val) {
									       $kunci=  $key;
									       $isi = $val;
									    }
					      	 	@endphp

						        <td><p>{{$kunci}} <b>*ungga berkas dalam format Kompress (ZIP/RAR/GTZ)</b></p>
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
<script type="text/javascript">
   $(document).ready(function() {
   		$('body').css("background-color", "#f6f7f8");
   		$('.navbar-fixed-top').removeClass('navbar-scroll');
        $('.profile-toogle').removeClass('item-scroll');
    });
</script>
@endsection