@extends('layouts.app')


@section('your_css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="content content-stretch">
       <div class="toolbar">
        <div class="toolbar-title">Daftar Facilitator</div>
    </div>
         <table id="myTable" class="" cellspacing="0" width="100%" style="text-align:left;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Instansi</th>
                    <th>Berkas Pendukung</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i =0;
                @endphp

                @foreach ($facilitator as $user)

                 @if ($user->user->role == 99)
                    @continue
                @endif
                @php
                
                $i++;
                @endphp
                <tr>
                     <td><a href="#">{{$i}}</a></td>
                     <td><a href="{{route('single-facilitator',[$user->str_slug])}}"  target="_blank" >{{$user->nama_instansi}}</a></td>

                    @if($user->berkas_pendukung != null) 
                        <td><a class="btn btn-info" href="{{Storage::url($user->berkas_pendukung)}}">Download</a></td>
                    @else 
                        <td><p>Berkas Tidak Tersedia</p></td>
                    @endif

                    @if($user->status == 1)
                        <td><a class="btn btn-success">Aktif</a></td>
                    @else
                         <td><a class="btn btn-danger">Tidak Atktif</a></td>
                    @endif
                    <td>
                    @if($user->status == 1)
                     <a href="{{route('activateFacilitator', [$user->id, $user->status])}}" class="btn btn-danger"><span class="glyphicon glyphicon-edit iconic green-color"></span> Non Aktifkan</a>
                    @else
                     <a href="{{route('activateFacilitator', [$user->id, $user->status])}}" class="btn btn-success"><span class="glyphicon glyphicon-edit iconic green-color"></span>Aktifkan</a>
                    @endif
                    <a href="{{route('deleteFacilitator', [$user->id])}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash iconic red-color"></span> Hapus</a></td>
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