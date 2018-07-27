@extends('layouts.app')

@section('your_css')
<link rel="stylesheet" href="/css/croppit.css">
@endsection

@section('content')

 <section class="content content-stretch" style="padding-bottom : 100px;">
        <div class="hero">
            <div class="hero-overlay">
                <div class="hero-inner">
                    <div class="hero-avatar">
                        <img src="{{Storage::url($facilitator->img_url)}}" alt="">
                    </div>
                    <div class="hero-title">{{$user->nama}}</div>
                    <div class="hero-description"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
           <form action="{{ route('updateProfile')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="header-create" style="margin-bottom : 10px;">
                <span class="number">1</span>
                <h1>Organization Details </h1>
             </div>
            <div class="form-group">                                
                <label for="nama_instansi">Nama Instansi</label></label>   
                <input type="text" class="form-control form-control-lg" id="nama_instansi" placeholder="Nama Instansi" name="nama_instansi" value="{{$facilitator->nama_instansi}}">                        
            </div>   
            <div class="form-group">                                
                <label for="deskripsi">Deskripsi</label></label>   
                <input type="text" class="form-control form-control-lg" id="deskripsi" placeholder="Agency Description" name="deskripsi_instansi" value="{{$facilitator->deskripsi_instansi}}">                      
            </div> 
            <div class="form-group">                                
                <label for="kategori">Kategori</label></label>   
                <select name="kategori" class="form-control form-control-lg " id="kategori" >
                        <option value="1">Perorangan</option>    
                        <option value="2">Kelompok</option>    
                </select>                         
            </div> 
            <div class="form-group">                                
                <label for="berkas">Upload Berkas Pendukung <b> *Berkas dengan format kompress file (RAR/ZIP/TAR/GTZ)</b></label>
                @if ($facilitator->berkas_pendukung !== null )

                <a href="{{Storage::url($facilitator->berkas_pendukung)}}"> ( Unduh Berkas Anda ) </a>
                @endif 
                <input name="berkas" id="berkas" type="file"  > 
            </div>
            <div class="form-group">                                
                <label for="preview_image">Upload Foto Profil</label></label>  
                <div class="image-editor">
                    <input type="file" class="cropit-image-input">
                    <div class="cropit-preview"></div>
                    {{-- <div id="image_preview" class="img_preview"><img src="{{Storage::url($facilitator->img_url)}}"></div> --}}
                    <div class="image-size-label">
                        Resize image
                    </div>
                    <input type="range" class="cropit-image-zoom-input">
                    <input type="hidden" name="image_data" class="hidden-image-data" />
                </div>
            </div>

             <div class="header-create" style="margin-bottom : 10px;">
                <span class="number">2</span>
                <h1>Lokasi Details </h1>
             </div>
            <div class="col-md-6">
                 <div class="form-group">                                
                    <label for="nama_instansi">Alamat</label></label>   
                    <input type="text" class="form-control form-control-lg" id="searchInput" placeholder="Masukan tempat, gedung, daerah atau perusahaan " name="alamat" value="{{$facilitator->alamat}}">                        
                </div>   
                 <div class="form-group" >                                
                    <div style="display: inline-block;width:49%;">
                        <label for="nama_instansi" >No Tempat</label></label>   
                        <input type="text" class="form-control form-control-lg" id="street_number" placeholder="No Tempat" name="no_tempat" value="{{$facilitator->no_tempat}}">  
                    </div>    
                    <div style="display: inline-block;width:49%;float: right;">
                         <label for="nama_instansi" style="display: inline-block;">Nama Jalan</label></label>   
                         <input type="text" class="form-control form-control-lg" id="route" placeholder="Nama Jalan" name="nama_jalan" value="{{$facilitator->nama_jalan}}">    
                    </div>                                     
                </div>   
                 <div class="form-group" >                                
                    <div style="display: inline-block;width:49%;">
                        <label for="nama_instansi" >Kecamatan/Distrik</label></label>   
                        <input type="text" class="form-control form-control-lg" id="administrative_area_level_3" placeholder="Kecamatan/Distrik" name="kecamatan" value="{{$facilitator->kecamatan}}">  
                    </div>    
                    <div style="display: inline-block;width:49%;float: right;">
                         <label for="nama_instansi" style="display: inline-block;">Kelurahan/Desa</label></label>   
                         <input type="text" class="form-control form-control-lg" id="administrative_area_level_4" placeholder="Keluarahan /Desa" name="kelurahan" value="{{$facilitator->kelurahan}}">    
                    </div>                                     
                </div>     
                 <div class="form-group">                                
                    <label for="nama_instansi">Kota</label></label>   
                    <input type="text" class="form-control form-control-lg" id="administrative_area_level_2" placeholder="Kota" name="kota"value="{{$facilitator->kota}}">                        
                </div>
                 <div class="form-group" >                                
                    <div style="display: inline-block;width:49%;">
                        <label for="nama_instansi" >Provinsi</label></label>   
                        <input type="text" class="form-control form-control-lg" id="administrative_area_level_1" placeholder="Provinsi" name="provinsi" value="{{$facilitator->provinsi}}">  
                    </div>    
                    <div style="display: inline-block;width:49%;float: right;">
                         <label for="nama_instansi" style="display: inline-block;">Kode Pos</label></label>   
                         <input type="text" class="form-control form-control-lg" id="postal_code" placeholder="Kode Pos" name="kode_pos" value="{{$facilitator->kode_pos}}">    
                    </div>                                     
                </div>     
                <input type="hidden" class="form-control form-control-lg" id="lat" placeholder="Kode Pos" name="lat" value="{{$facilitator->lat}}">
                <input type="hidden" class="form-control form-control-lg" id="lng" placeholder="Kode Pos" name="lng" value="{{$facilitator->lng}}">
                <button type="submit" class="btn btn-info">Submit Data</button>
                <button type="button" class="btn btn-default btn-outline">Cancel</button>
            </div>
            <div class="col-md-6 container-map">
                <div id="map"></div>
            </div>
            </form>
        </div>

    </section>

@endsection

@section('your_js')

<script type="text/javascript" src="/js/jquery.cropit.js"></script>
<script src="{{asset('js/maps.js')}}"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxXjojezssyxk1TQLrl-8Qp4ZJUPz0hlw&libraries=places&&callback=initAutocomplete" async defer"></script>

<script>

    var $mylat = $('#lat').val();
    var $mylng = $('#lng').val();

$(function() {
    $('.image-editor').cropit({
        allowDragNDrop: false
    });

    $('form').submit(function() {
        // Move cropped image data to hidden input
        var imageData = $('.image-editor').cropit('export');
        $('.hidden-image-data').val(imageData);
    });
});


</script>

@endsection