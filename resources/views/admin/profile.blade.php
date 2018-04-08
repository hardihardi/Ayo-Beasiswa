@extends('layouts.app')

@section('content')

 <section class="content content-stretch" style="padding-bottom : 100px;">
        <div class="hero">
            <div class="hero-overlay">
                <div class="hero-inner">
                    <div class="hero-avatar">
                        <img src="" alt="">
                    </div>
                    <div class="hero-title">Aria Samudera Elhamidy</div>
                    <div class="hero-description"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
            <form action="#" method="POST">
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="username">
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="Email">
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="Password">
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="Nama">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="Alamat">
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="Pendidikan">
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="Telp">
                    <p> Upload Yout Profile </p>
                    <input name="brand_logo" onchange="preview_image_logo()" id="preview_image" type="file"  >
                    <div id="image_preview" class="img_preview"><img src=""></div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
        <div class="form-group" style="margin-left: 25px;">
                <button type="submit" class="btn btn-info">Submit Data</button>
                <button type="button" class="btn btn-default btn-outline">Cancel</button>
            </div>
        </div>
    </section>

@endsection