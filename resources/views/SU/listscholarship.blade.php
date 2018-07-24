@extends('layouts.app')


@section('your_css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="content content-stretch">
       <div class="toolbar">
        <div class="toolbar-title">Daftar Beasiswa</div>
    </div>
         <table id="myTable" class="" cellspacing="0" width="100%" style="text-align:left;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Beasiswa</th>
                    <th>Fasilitator</th>
                    <th>Jumlah Pendaftar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i =0;
                @endphp

                @foreach ($beasiswas as $user)

                @php
                
                $i++;
                @endphp
                <tr>
                     <td><a href="#" >{{$i}}</a></td>
                     <td><a href="{{route('single', [$user->str_slug])}}" target="_blank" class="btn btn-info">{{$user->nama_beasiswa}}</a></td>
                     <td><a href="{{route('single-facilitator' , [$user->facilitator->str_slug])}}"  target="_blank" class="btn btn-success">{{$user->facilitator->nama_instansi}}</a></td>
                     <td><a href="#">{{count($user->user)}}</a></td>
                     <td><a href="#" class="btn btn-danger">Hapus</a></td>
                </tr>

                @endforeach
             </tbody>
                <tr>
                     <th>No</th>
                    <th>Nama Beasiswa</th>
                    <th>Fasilitator</th>
                    <th>Jumlah Pendaftar</th>
                    <th>Opsi</th>
                </tr>
                </tfoot>
            </table>
    </section>
@endsection

@section('your_js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script >
$(document).ready(function () {
    $('#myTable').DataTable(function(){
        responsive: true
    });
} );

</script>
@endsection