@extends('layouts.app')

@section('content')

 <section class="content content-stretch" style="padding-bottom : 100px;">
        <div class="hero">
            <div class="hero-overlay">
                <div class="hero-inner">
                    <div class="hero-avatar">
                        <img src="{{$user->img_url}}" alt="">
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
                <div class="col-md-12">
                    <input type="text" class="form-control form-control-lg" id="username" placeholder="username" name="username" value="{{$user->username}}">
                    <input type="text" class="form-control form-control-lg" id="email" placeholder="Email" name="email" value="{{$user->email}}"
                    >
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" value="{{$user->password}}"  >
                    <input type="text" class="form-control form-control-lg" id="exampleInput4" placeholder="Nama" name="nama" value="{{$user->nama}}">
 
                    <input type="text" class="form-control form-control-lg" id="alamat" placeholder="Alamat" name="alamat" value="{{$user->alamat}}">
                    <input type="text" class="form-control form-control-lg" id="pendidikan" placeholder="Pendidikan" name="pendidikan" value="{{$user->pendidikan}}">
                    <input type="text" class="form-control form-control-lg" id="telp" placeholder="Telp" name="telp" value="{{$user->telp}}">
                    <p> Upload Yout Profile </p>
                    <input name="logo" onchange="preview_image_logo()" id="preview_image" type="file"  >
                    <div id="image_preview" class="img_preview"><img src="{{$user->img_url}}"></div>
                </div>
                            <button type="submit" class="btn btn-info">Submit Data</button>
                <button type="button" class="btn btn-default btn-outline">Cancel</button>
            </form>
        </div>

    </section>

@endsection