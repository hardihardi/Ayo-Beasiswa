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
    <div class="wrap single-profile" style="margin-bottom:20px;">
        <div class="container" >
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8  col-md-offset-2 col-lg-offset-2" style="border:0">
                    <div class="row">
                        <div class="col-sm-4  col-xs-12 col-md-4">
                            @if($data->img_url == null)
                                <img src="/img/img_ss/malo.png" class="rounded-lg">
                            @else
                                <img src="{{Storage::url($data->img_url)}}" class="rounded-lg">
                            @endif
                        </div>
                        <div class="col-sm-8 col-xs-12 col-md-8 yf">
                            <h3>{{$data->nama_instansi  }}</h3>
                            <p>Menjadi Penyedia sejak {{ \Carbon\Carbon::parse($data->created_at)->formatLocalized('%d %B %Y'). ", " }}</p><br>
                            <p>{{$data->alamat}}</p><br>
                            <i class="	fa fa-hand-pointer-o " ></i>&nbsp <p>Mendaftar {{count($data->scholarships)}} beasiswa </p><br>
                            
                        </div>
                    </div>
                    <div class="row" style="margin-top:50px;">
                         <div class="col-md-12 col-sm-12 col-lg-12 yf" >
                            <h4>&nbsp Beasiswa yang didaftarkan </h4>
                            <hr style="background:#48C3CF;height:2px;width:40%;border-radius:2px;margin-top:-5px;float:left;margin-left:8px;">
                            <div class="clear"></div>
                         </div>
                        @foreach($data->scholarships as $beasiswa)
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a href="/beasiswa/{{$beasiswa->str_slug}}" class="clickarea"></a>
                                <div class="card-profile">
                                    <div class="card-icon" style="min-height:300px;max-height:500px;height:100%;">
                                        <img src="{{Storage::url($beasiswa->alamat_gambar)}}">
                                        <img src="{{Storage::url($beasiswa->facilitator->img_url)}}" class="img-dev">
                                    </div>
                                    <div class="card-content">
                                    <h3>{{$beasiswa->nama_beasiswa}}</h3><br>
                                     <i class="fa fa-clock-o " ></i> &nbsp<p style="display: inline;">Masa Akhir Pendftaran {{ \Carbon\Carbon::parse($beasiswa->masa_berlaku)->diffForHumans()}}</p>
                                    <br>
                                    </div>

                                    <div class="card-footer">
                                        <div class="rh">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12 col-sm-12 col-lg-12 yf" style="margin-top:40px;">
                                <input type="hidden" id="lat" value="{{$data->lat}}">       
                                <input type="hidden" id="lng" value="{{$data->lng}}">    
                                <h3>Temukan Kami</h3>   
                                <hr style="background:#48C3CF;height:2px;width:30%;border-radius:2px;margin-top:-5px;float:left;margin-left:8px;">
                                <div class="clear"></div>
                        </div>
                        <div class="row" style="padding:0 15px">
                            <div id="map"></div>
                     
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection

@section('js')
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxXjojezssyxk1TQLrl-8Qp4ZJUPz0hlw&libraries=places"></script>
<!-- ini kemaren bisa fix setelah pokoknya bisa deh -->
<script src="{{asset('js/maps.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var lat = $('#lat').text()
        var lng = $('#lng').text()
        geoLocationInit(lat,lng) 
        $('body').css("background-color", "#fff");
        $('.navbar-fixed-top').removeClass('navbar-scroll');
         $('.profile-toogle').removeClass('item-scroll');
     });
  
 </script>
@endsection