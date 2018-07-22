@extends('layouts.app')

@section('your_css')

    <link rel="stylesheet" href="/wysiwyg/summernote.css">

@endsection

@section('content')
<section class="content content-stretch">
    <div class="hero">
        <div class="hero-overlay">
            <div class="left-side">
                <img src="" alt="">
                <div class="hero-title">{{$beasiswas->nama_beasiswa}}</div>
                <!--                         <div class="hero-description">{{$beasiswas->konten}} </div> -->
                <div class="toolbar-menu">
                    <a href="{{ route('editList', ['id' => $beasiswas->id])}}" class="btn btn-success btn-outline btn-rounded"><i class="fa fa-edit"></i> Ubah</a>
                    <a href="{{ route('deleteList', ['id' => $beasiswas->id])}}" class="btn btn-danger btn-outline btn-rounded"><i class="fa fa-trash"></i> Hapus</a>
                    <a style="margin-top : 10px;" data-toggle="modal" data-target="#email" class="btn btn-info btn-outline btn-rounded"><i class="fa fa-envelope"></i> Kirim email</a>
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
                    <th>Status </th>
                    <th>Ubah Status </th>
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
                    
                    @if($user->pivot->status == "Menunggu")
                            <td><p style="border-radius: 8px;padding: 8px 16px;" class=" btn-info">Menunggu</p></td>
                    @elseif($user->pivot->status == "Terima")
                            <td><p style="    border-radius: 8px;padding: 8px 16px;" class=" btn-success">Diterima</p></td>
                    @elseif($user->pivot->status == "Tolak")
                           <td> <p style="    border-radius: 8px;padding: 8px 16px;" class=" btn-danger">Ditolak</p></td>
                    @elseif($user->pivot->status == "Pertimbangkan")
                            <td><p style="    border-radius: 8px;padding: 8px 16px;" class=" btn-info">Dipertimbangkan</p></td>
                    @else
                         <td><p style="    border-radius: 8px;padding: 8px 16px;" class=" btn-info">Menunggu</p></td>
                    @endif
                    <td>
                        <button id="approve" data-toggle="modal" data-target="#myFac" data-beasiswa="{{$beasiswas->id}}"  data-id="{{$user->id}}" class="btn btn-info approve">Ubah</button>

                    </tr>
                    @endforeach
                </tbody>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Pendidikan </th>
                    <th>Status </th>
                    <th>Ubah Status </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </section>
      <div id="email" class="modal fade" role="dialog">
        <form action="{{route('sendEmail')}}" method="post">
       {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding :19px 40px">
                    <center><h1>Kirim Email Kepada Pendaftar</h1></center>
                </div>
                <div class="modal-body" style="padding: 20px 40px">
                     <input type="hidden" readonly class="form-control form-control-lg" id="scholarship_id" name="scholarship_id" value="{{$beasiswas->id}}" >
                    <input type="text" class="form-control form-control-lg" id="beasiswa" name="subject" placeholder="Subject">
                    <select name="status_user" class="form-control form-control-lg readonly" id="status_user" readonly  >
                        <option value="all">Seluruh</option>         
                        <option value="Terima">Diterima</option>         
                        <option value="Tolak">Ditolak</option>         
                        <option value="Pertimbangkan">Dipertimbangkan</option>         
                    </select>
                    <textarea id="summernote" name="description">Tuliskan Isi Email Anda</textarea>
                    <input type="submit" name="kirim" class="form-control form-control-lg btn-success" value="kirim">
                </div>
            </div>
        </div>  
         </form>               
     </div>
     <div id="myFac" class="modal fade" role="dialog">
         
                {{ csrf_field() }}
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="padding :19px 40px">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Approve Beasiswa</h4>
                        </div>
                        <div class="modal-body" style="padding: 20px 40px">
                            <div class="form-group">
                                <label for="nama_instansi">Nama</label></label>
                                <input type="text" readonly class="form-control form-control-lg" id="nama" placeholder="Nama " name="nama_instansi" >
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Pendikan Terakhir</label></label>
                                <input type="text" readonly class="form-control form-control-lg" id="pendidikan" placeholder="Pendidikan Terakhir" name="deskripsi_instansi" >
                            </div>
                             <div class="form-group">
                                <label for="deskripsi">username</label></label>
                                <input type="text" readonly class="form-control form-control-lg" id="username" placeholder="Username" name="deskripsi_instansi" >
                            </div>
                             <div class="form-group">
                                <label for="deskripsi">Email</label></label>
                                <input type="text" readonly class="form-control form-control-lg" id="email" placeholder="Email" name="deskripsi_instansi" >
                            </div>
                             <div class="form-group">
                                <label for="deskripsi">Mendaftar Pada Beasiswa</label></label>
                                <input type="text" readonly class="form-control form-control-lg" id="nama_beasiswa" placeholder="beasiswa" name="deskripsi_instansi" >
                            </div>
                           <table class="table">
                
                        <thead>
                          <tr>
                            <th>Berkas</th>
                            <th>Download</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                             <tr>
                                <td><p>Berkas data diri (ex : KTP, KTM, KHS dan/atau KRS)</p></td>
                                <td>
                                 
                                   <a href="#" id="berkas_diri" class="btn btn-info">download</a>
                                  
                                  
                        
                                </td>
                           
                              </tr>
                       
                             <tr>
                                <td><p>Ijazah dan Transkip NIlai terakhir</p></td>
                                <td>
                                 <a href="#" id="ijazah" class="btn btn-info">download</a>
                                 
                                  
                                </td>
                           
                              </tr>
                        
                             <tr>
                                <td><p>Surat pernyataan Organisasi</p></td>
                                <td>
 
                             <a href="#" id="organisasi" class="btn btn-info">download</a>
                                  
                                
                                </td>
                           
                              </tr>
               
                             <tr>
                                <td><p>Surat pernyataan sedang tidak menerima beasiswa dari tempat lain</p></td>
                                <td>
                                      
                                <a href="#" id="sp_beasiswa" class="btn btn-info">download</a>
                                   
                                 
                                </td>
                           
                      
                             <tr>
                                <td><p>Berkas keluarga (Foto-copy orang tua, kk, pbb)</p></td>
                                <td>
                                          
                                  <a href="#" id="berkas_keluarga" class="btn btn-info">download</a>
                            
                                </td>
                           
                              </tr>
                       
                             <tr>
                                 <tr>
                                <td><p>Berkas Pendukung Yang Disediakan Pendaftar</p></td>
                                <td>
                                          
                                  <a href="#" id="berkas_pendukung" class="btn btn-info">download</a>
                            
                                </td>
                           
                              </tr>
                       
                             <tr>

                             <tr>
                                <td><p id="text-berkas"></p></td>
                                <td>
                                          
                                  <a href="#" id="berkas_lain" class="btn btn-info">download</a>
                            
                                </td>
                           
                              </tr>
                       
                             <tr>
                               

                               
                                </td>
                              </tr>
 
                        </tbody>
                       
                </table>        
                      </div>
                        <div class="modal-footer " style="padding :20px 40px">
                             <h3 style="">Status  : <button id="status" class="btn "></button></h3>
                            <a href="#" class="bg-green-color btn btn-success" id="terima" style="border:0;width:100%;" >Terima</a><br><br>
                            <a href="#" class="bg-green-color btn btn-danger" id="tolak" style="border:0;width:100%;" >Tolak</a><br><br>
                            <a href="#" class="bg-green-color btn btn-info" id="menunggu" style="border:0;width:100%;">Pertimbangkan</a>
                        </div>
                    </div>
                </div>
           <!--  </form> -->
     </div>
@endsection
@section('your_js')
<script type="text/javascript" src="/js/editor.js"></script>
<script type="text/javascript" src="/wysiwyg/summernote.min.js"></script>
<script >

    function ganti($string){
        return $string.replace("public", "/storage");
    }
        $('.approve').on('click', function(){
            $(this).each(function(){

                var id_beasiswa = $(this).data("beasiswa")
                var id_user = $(this).data("id")
               
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : "{{route('adminApprove')}}",
                    data : {
                        id_beasiswa : id_beasiswa,
                        id_user : id_user
                    },
                    type : 'POST',
                    success : function(res){
                        var data = JSON.parse(res);
                        var $single =data.original
                        $('#nama').val($single.nama)
                        $('#email').val($single.email)
                        $('#pendidikan').val($single.pendidikan)
                        $('#username').val($single.username)
                        $('#nama_beasiswa').val($single.nama_beasiswa)
                        if($single.status == "Terima"){
                              $('#status').text($single.status)
                              $('#status').addClass("btn-success")
                        }else if($single.status == "Tolak"){
                            $('#status').text($single.status)
                              $('#status').addClass("btn-danger")
                        }else if($single.status == "Pertimbangkan"){
                            $('#status').text($single.status)
                              $('#status').addClass("btn-info")
                        }else if($single.status == "Menunggu"){
                            $('#status').text($single.status)
                              $('#status').addClass("btn-info")
                        }else {
                            $('#status').text("tidak Valid")
                             $('#status').addClass("btn-danger")
                        }
                        var $_array = ["berkas_diri", "ijazah" ,"organisasi", "sp_beasiswa", "berkas_keluarga",  "berkas_pendukung" , "berkas_lain"]
                        for($i in $_array){
                            if($single[$_array[$i]] != null){
                                if($_array[$i] == "berkas_lain"){
                                    if($single[$_array[$i]][1] !=  null){
                                        $('#text-berkas').text($single[$_array[$i]][0]);
                                        $('#'+$_array[$i]).attr({"href" : ganti($single[$_array[$i]][1])})
                                    }else{
                                       $('#'+$_array[$i]).closest("tr").css("display", "none")
                                    }
                                }else{
                                    $('#'+$_array[$i]).attr({"href" : ganti($single[$_array[$i]])})
                                }
                            }else{
                                $('#'+$_array[$i]).closest("tr").css("display", "none")
                            }
                        }                       
                        // $('#ijazah').attr({"href" :$single.ijazah})
                        // $('#organisasi').attr({"href" :$single.organisasi})
                        // $('#sp_beasiswa').attr({"href" :$single.sp_beasiswa})
                        // $('#berkas_keluarga').attr({"href" :$single.berkas_keluarga})

                        $('#terima').attr({"href" : "/setting/approve/" + $single.id_user + "/" + $single.id_beasiswa + "/" + "Terima" })
                        $('#tolak').attr({"href" : "/setting/approve/" + $single.id_user + "/" + $single.id_beasiswa + "/" + "Tolak" })
                        $('#menunggu').attr({"href" : "/setting/approve/" + $single.id_user + "/" + $single.id_beasiswa + "/" + "Pertimbangkan" })
                    },
                    error : function(error){
                        console.log(error)
                    }
                })
            })
        });

</script>

@endsection