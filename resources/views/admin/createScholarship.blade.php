@extends('layouts.app')

@section('your_css')
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/wysiwyg/summernote.css">
@endsection

@section('content')
<section class="content">
        <div class="header-create">
            <span class="number">1</span>
            <h1>Scholarship Details </h1>
        </div>
        <div class="body-create">
            <form action="{{ route('createScholarship')}}" method="POST" enctype="multipart/form-data">
                 {{ csrf_field() }}
                <input type="text" class="form-control form-control-lg" id="beasiswa" name="beasiswa" placeholder="Scholarship Name">
                <input type="text" class="form-control form-control-lg" id="instusi" name="instusi" placeholder="Institute Name">
                <input type="text" class="form-control form-control-lg" id="quote" name="quota" placeholder="Quota">
                   <div class="form-group">
                <div class="input-group date form_date " data-date="2017-09-16T05:25:07Z" data-link-field="dtp_input1" style="margin-top : 20px">
                    <input class="form-control form-control-lg"  style="margin-top:0" size="16" type="text" value="" readonly name="date"  placeholder="Date End" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <p> Upload Yout Image </p>
                <input name="logo" onchange="preview_image_logo()" id="preview_image" type="file" >
                <div id="image_preview" class="img_preview"><img src=""></div>
                 <!-- Textarea style="height:300px"class="form-control form-control-lg" id="Description" name="Description" placeholder="Description"></Textarea> -->
                 <h4>Category </h4>
                     @foreach( $kategoris as $kategori )
                        <label >
                            <input type="checkbox" name="kategori[]" value="{{ $kategori->judul }}"/>{{$kategori->judul}}
                        </label>
                    @endforeach`   
                 </div>
                
                   <!-- Content -->
                     <div class="title-pages">Description</div>
                   <textarea id="summernote" name="description">Your Description About The Scholarship</textarea>
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



@endsection