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
                <label for="kategori">Deskripsi</label></label>   
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
            <button type="submit" class="btn btn-info">Submit Data</button>
            <button type="button" class="btn btn-default btn-outline">Cancel</button>
            </form>
        </div>

    </section>

@endsection

@section('your_js')

<script type="text/javascript" src="/js/jquery.cropit.js"></script>
<script>
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