@extends('layouts.app')

@section('your_css')
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/wysiwyg/summernote.css">
    <link rel="stylesheet" href="/css/croppit.css">
@endsection

@section('content')
<section class="content">
        <div class="hero">
                <div class="hero-overlay">
                    <img src="{{Storage::url($beasiswas->alamat_gambar)}}" class="hero-img">
                    <div class="hero-inner">
                        <div class="hero-avatar">
                            <img src="" alt="">
                        </div>
                        <div class="hero-title"></div>
                        <div class="hero-description"></div>
                    </div>
                </div>
            </div>
        <form action="{{ route('updateList', ['id' => $beasiswas->id])}}" method="POST" enctype="multipart/form-data">
        <div class="header-create">
            <span class="number">1</span>
            <h1>Scholarship Edit </h1>
            <p>Status</p><label class="switch">
                @if ($beasiswas->status)
                    <input type="checkbox" name="status"  checked>
                @else
                  <input type="checkbox" name="status" >
                @endif
                <span class="slider round"></span>
            </label>
        </div>
        <div class="body-create">
                 {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">                                
                    <label for="beasiswa">Nama Beasiswa</label></label>   
                    <input type="text" class="form-control form-control-lg" id="beasiswa" name="beasiswa" placeholder="Scholarship Name" value="{{$beasiswas->nama_beasiswa}}">
                 </div>   
                <div class="form-group">                                
                    <label for="instusi">Nama Instansi</label></label>   
                    <input type="text" class="form-control form-control-lg" id="instusi" name="instusi" placeholder="Institute Name"  value="{{$beasiswas->nama_instantsi}}">
                </div>  
                <div class="form-group">                                
                    <label for="quote">Quota</label></label>   
                    <input type="text" class="form-control form-control-lg" id="quote" name="quota" placeholder="Quota"  value="{{$beasiswas->quota}}">
                    </div>   
                <div class="form-group">
                        <label for="">Jangka Waktu </label></label>   
                        <div class="input-group date form_date " data-date="2017-09-16T05:25:07Z" data-link-field="dtp_input1" style="margin-top : 20px" >
                        <input class="form-control form-control-lg" style="margin-top:0" size="16" type="text" readonly name="date"  placeholder="Date End"   value="{{$beasiswas->masa_berlaku}}">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <div class="form-group">                                
                        <label for="preview_image">Upload Foto Profil</label></label>  
                        <div class="image-editor" class="width:780px;height:500px">
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
                {{-- <div id="image_preview" class="img_preview"><img src="{{$beasiswas->alamat_gambar}}"></div></br> --}}
              <h4>Category </h4>
                  @foreach( $kategoris as $kategori )
                        <label >
                            <input type="checkbox" name="kategori[]" value="{{ $kategori->judul }}" 
                                 {{in_array($kategori->judul,$kategori_array) ? "checked" : ""}}
                             />{{$kategori->judul}}
                        </label>
                    @endforeach
            </div>
                
                   <!-- Content -->
                     <div class="title-pages">Description</div>
                     <textarea id="summernote" name="Description">{{$beasiswas->konten}}</textarea>
            <button type="submit" class="btn btn-info">Save Data</button>
            </form>
        </div>
</section>

@endsection

@section('your_js')
 <script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="/js/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
  <script type="text/javascript" src="/js/prism.js"></script>
  <script type="text/javascript" src="/wysiwyg/summernote.min.js"></script>
  <script type="text/javascript" src="/js/editor.js"></script>
  <script type="text/javascript" src="/js/jquery.cropit.js"></script>
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