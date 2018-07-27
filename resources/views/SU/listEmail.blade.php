@extends('layouts.app')

@section('your_css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
   <link rel="stylesheet" href="/wysiwyg/summernote.css">

@endsection

@section('content')
<section class="content content-stretch">
       <div class="toolbar">
        <div class="toolbar-title">Daftar Permintaan Email</div>
    </div>
      
         <table id="myTable" class="" cellspacing="0" width="100%" style="text-align:left;">
          
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Instansi</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i =0;
                $email_user =[];
                @endphp

                @foreach($email as $user)
                
                @php
                $i++;
                @endphp

                <tr>
                    <form action="{{route('sendEmail')}}" method="POST">
                        {{ csrf_field() }}
                     <td><a href="#">{{$i}}</a></td>
                     <td><a href="{{route('single-facilitator',[$user->facilitator->str_slug])}}"  target="_blank"  >{{$user->facilitator->nama_instansi}}</a></td>

                     <td><buttton class="btn btn-info cek_pesan" data-id="{{$user->id}}" data-toggle="modal" data-target="#dataEmail">Cek Pesan</buttton></td>
                    @if($user->status == 1)
                        <td><a class="btn btn-success">Selesai</a></td>
                    @elseif($user->status == 1)
                        <td><a class="btn btn-info">Menunggu</a></td>
                    @else
                         <td><a class="btn btn-danger">Belum Selesai</a></td>
                    @endif
                    <td>

                     <input type="hidden" value="{{$user->id}}" name="id">
                     <button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-edit iconic green-color"></span>Kirim Email</button>
                            
                    <a href="{{route('deleteEmail', [$user->id])}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash iconic red-color"></span> Hapus</a></td>
                    </form>
                </tr>
          
                @endforeach

             </tbody>
                <tr>
                    <th>No</th>
                    <th>Nama Instansi</th>
                    <th>Pesan</th>
                    <th>Opsi</th>
                </tr>
                </tfoot>
            </table>

              <div id="dataEmail" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="padding :19px 40px">
                            <center><h1>Data Pesan</h1></center>
                        </div>
                        <div class="modal-body" style="padding: 20px 40px">
                             <p>Subject </p>
                            <input type="text" class="form-control form-control-lg" id="subject" name="subject" placeholder="Subject" readonly="true">
                            <p> Daftar Email Penerima </p>
                            <ol id="daftar_email">

                            </ol>
                             <p> Isi Pesan </p>
                            <textarea id="summernote" name="description" readonly="true"></textarea>
                            </div>
                    </div>
                </div>  
            </div>
    </section>
@endsection

@section('your_js')
<script type="text/javascript" src="/js/editor.js"></script>
<script type="text/javascript" src="/wysiwyg/summernote.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script >
$(document).ready(function () {
    $('#myTable').DataTable(function(){
        responsive: true
    });
} );

   $('.cek_pesan').on('click', function(){
            $(this).each(function(){
               var id = $(this).data("id")
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : "{{route('getMessages')}}",
                    data : {
                        id : id
                    },
                    type : 'POST',
                    success : function(res){
                        var data = JSON.parse(res);
                        var $single =data.original
                        $('#subject').val($single.subject)
                       $('#summernote').summernote('code', $single.konten);
                       console.log($single.email)
                                                   $('#daftar_email').empty()
                        for(var i = 0; i < $single["email"].length ; i++){
                            $('#daftar_email').append("<li>"+$single.email[i]+"</li>")
                        }                       
                    },
                    error : function(error){
                        console.log(error)
                    }
                })
            })
        });
</script>
@endsection