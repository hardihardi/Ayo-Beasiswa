@extends('layouts.app')

@section('content')
<section class="content content-stretch">
    <div class="hero">
        <div class="hero-overlay">
            <div class="left-side">
                <img src="" alt="">
                <div class="hero-title">{{$beasiswas->nama_beasiswa}}</div>
                <!--                         <div class="hero-description">{{$beasiswas->konten}} </div> -->
                <div class="toolbar-menu">
                    <a href="{{ route('editList', ['id' => $beasiswas->id])}}" class="btn btn-success btn-outline btn-rounded"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ route('deleteList', ['id' => $beasiswas->id])}}" class="btn btn-danger btn-outline btn-rounded"><i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>
            <div class="right-side">
                <img src="{{Storage::url($beasiswas->alamat_gambar)}}" class="img-single" style="width:100%;">
            </div>
        </div>
    </div>
    <div class="toolbar">
        <div class="toolbar-title">List Of Registrant</div>
    </div>
    <div class="content-inner">
        <table id="table-post" class="display datatable table table-striped " cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Pendidikan </th>
                    <th>Approved </th>
                </tr>
            </thead>
            <tbody>
                @php
                $i =0;
                @endphp
                @foreach ($beasiswas->user as $user)
                @php
                
                $i++;
                @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->nama_depan  . " ". $user->nama_belakang}}</td>
                    <td>{{$user->pendidikan}}</td>
                    <td>
                        <a href="{{route('adminApprove',[$user->id])}}" class="btn btn-info">Approve</a>
                    </tr>
                    @endforeach
                </tbody>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Pendidikan </th>
                    <th>Approved </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection