@extends('layouts.web')

@section('content')
<div class="container single margin-top-80" style="background-color: #fff;">
    <div class="row" style="padding: 20px;">
        <div class="col-lg-8 post-single">
	           <div class="post-image-single">
					<a href="" title="{{$beasiswa->nama_beasiswa}}" >
						<img width="500" height="282" src="{{$beasiswa->alamat_gambar}}" class="img-single-post " alt=""/>                            
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
								<img src='{{$beasiswa->facilitator->user->img_url}}'  class='avatar avatar-96 photo img-user' height='96' width='96' /> 
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
							@if(!(Auth::user()->facilitator() == $beasiswa->facilitator()))
							<h5> Daftar Beasiswa </h5><br>
								<a href="{{route('daftar', ['id' => $beasiswa->id])}}" class="btn btn-daftar">Daftar</a>
							@else 
							<h5> Hey {{$beasiswa->facilitator->user->username}} , Mau Update Beasiswa ? </h5><br>
								<a href="{{route('singleList', ['id' => $beasiswa->id])}}" class="btn btn-edit">Edit</a>
							@endif
						@endif
				</div>
              </div>
        </div><!--tutup col lg 4-->

	</div>
</div>
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