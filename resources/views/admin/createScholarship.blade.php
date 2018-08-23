@extends('layouts.app')

@section('your_css')
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/wysiwyg/summernote.css">
    <link rel="stylesheet" href="/css/croppit.css"> 
@endsection

@section('content')
<section class="content">
        <div class="header-create">
            <span class="number">1</span>
            <h1>Detail Beasiswa </h1>
        </div>
        <div class="body-create">
            <form action="{{ route('createScholarship')}}" method="POST" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <input type="text" class="form-control form-control-lg" id="beasiswa" name="beasiswa" placeholder="Nama Beasiswa *Wajib diisi">
                <input type="hidden" class="form-control form-control-lg" id="instusi" name="instusi" placeholder="Nama Institusi *Wajib diisi" value="">
                <input type="text" class="form-control form-control-lg" id="quote" name="quota" placeholder="Kuota *Wajib diisi">
                   <div class="form-group">
                <div class="input-group date form_date " data-date="2017-09-16T05:25:07Z" data-link-field="dtp_input1" style="margin-top : 20px">
                    <input class="form-control form-control-lg"  style="margin-top:0" size="16" type="text" value="" readonly name="date"  placeholder="Tanggal Akhir *Wajib diisi" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <div class="form-group">                                
                    <label for="preview_image">Unggah Foto Profil <b>*Wajib diisi</b></label></label>  
                    <div class="image-editor">
                        <input type="file" class="cropit-image-input">
                        <div class="cropit-preview"></div>
                        {{-- <div id="image_preview" class="img_preview"><img src="{{Storage::url($facilitator->img_url)}}"></div> --}}
                        <div class="image-size-label">
                            Atur ulang ukuran gambar
                        </div>
                        <input type="range" class="cropit-image-zoom-input">
                        <input type="hidden" name="image_data" class="hidden-image-data" />
                    </div>
                </div>
                 <h4>Kategori </h4>
                     @foreach( $kategoris as $kategori )
                        <label >
                            <input type="checkbox" name="kategori[]" value="{{ $kategori->judul }}"/>{{$kategori->judul}}
                        </label>
                    @endforeach`   
                 </div>
                
                   <!-- Content -->
                     <div class="title-pages">Deskripsi <b> *Wajib diisi</b></div>
                   <textarea id="summernote" name="description">Tuliskan deskripsi anda disini</textarea>
        </div>
        <div class="header-create">
            <span class="number">2</span>
            <h1>Persyaratan</h1>
        </div>
        <div class="body-create">
            <div class="switch-control">
                <p>Berkas data diri (ex : KTP, KTM, KHS dan/atau KRS)</p>
                <label class="switch">
                     <input type="checkbox" name="berkas[]" value="berkas_diri" >
                     <span class="slider round"></span>
               </label>
            </div>
            <div class="switch-control">
                <p>Ijazah dan Transkip NIlai terakhir</p>
                <label class="switch">
                     <input type="checkbox" name="berkas[]" value="ijazah">
                     <span class="slider round"></span>
               </label>
            </div>
            <div class="switch-control">
                <p>Surat Keterangan AKtif Organisasi / sertifikat prestasi</p>
                <label class="switch">
                     <input type="checkbox" name="berkas[]" value="organisasi" >
                     <span class="slider round"></span>
               </label>
            </div>
            <div class="switch-control">
                <p>Surat pernyataan sedang tidak menerima beasiswa dari tempat lain </p>
                <label class="switch">
                     <input type="checkbox" name="berkas[]" value="sp_beasiswa">
                     <span class="slider round"></span>
               </label>
            </div>
            <div class="switch-control">
                <p>Berkas keluarga (Foto-copy orang tua, kk, pbb) </p>
                <label class="switch">
                     <input type="checkbox" name="berkas[]" value="berkas_keluarga" >
                     <span class="slider round"></span>
               </label>
            </div>
            <div class="switch-control">
                <p>Berkas Lain nya sebagai pendukung</p>
                <label class="switch">
                     <input type="checkbox" name="berkas[]" value="berkas_lain" placeholder="Deskripsi berkas yang dibutuhkan" style="width:75%" >
                     <span class="slider round"></span>
               </label>
            </div>
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
 <script type="text/javascript" src="/js/editor.js"></script>
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