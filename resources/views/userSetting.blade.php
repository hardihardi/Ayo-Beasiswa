@extends('layouts.web')
@section('profile')
@if(Auth::user()) 
    @if(Auth::user()->img_url != null)
     <img src="{{Storage::url(Auth::user()->img_url)}}" class="rounded-small"> 
     @else  
     <img src="/img/img_ss/malo.png" class="rounded-small"> 
     @endif
@endif
@endsection
@section('css')
<link rel="stylesheet" href="/css/croppit.css">
@endsection

@section('profile')
@if(Auth::user()->img_url != null) 
 <img src="{{Storage::url(Auth::user()->img_url)}}" class="rounded-small"> 
 @else  
 <img src="/img/img_ss/malo.png" class="rounded-small"> 
 @endif
@endsection

@section('content')
<Style>

.progress {
    display: none;
    margin-top : 20px;
}

input.btn-success {
    display: block;
position: absolute;
right: -100px;
top: 8px
}

.cropit-preview {
    width : 400px !important; 
}

.image-editor {
    overflow-x : hidden;
    display:none;
    width:100%;
    height: 100%;
    position: absolute;
    top: 0;
    background: #fff;
    z-index: 101;
}

</Style>
<div class="wrap single-profile">
    <div class="container">
        <div class="col-lg-8 col-md-12  col-sm-12 col-xs-12" style="margin-bottom:30px;padding-bottom:50px;min-height: 800px;">
            
            <div class="tab">
                <div class="rh  bg-blue-color hidden simpan" style="border:0;cursor:pointer;">
                    <i class="fa fa-edit " ></i>
                    <label for="save" style="color:#fff;margin-bottom:0px;cursor:pointer;">Simpan</label>
                    
                </div>
                <div class="rh  bg-red-color hidden cancel">
                    <i class="fa fa-times " ></i>
                    <p style="display:inline"  class="cancel">Batalkan</p>
                </div>
                <div class="rh  bg-green-color visible change">
                    <i class="fa fa-gear fa-spin" ></i>
                    <p style="display:inline" class="change">Ubah</p>
                </div>
                
                <h3 style="display:inline;margin-bottom :10px;"><b>HI! {{$user->username}}</b></h3><br><br>
                <p style="display:inline;margin-bottom :10px;">Silahkan lengkapi data diri anda untuk menjadikan bahan pertimbangan para penyedia beasiswa </p>
                
                
                <div class="clear"></div>
                <button class="tablinks active" onclick="openTab(event, 'profil')">Biodata Diri</button>
                <button class="tablinks" onclick="openTab(event, 'berkas')">Berkas Beasiswa</button>
                <button class="tablinks" onclick="openTab(event, 'beasiswa')">Beasiswa Anda</button>
                
            </div>
            <form action="{{ route('update-user')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input id="save" type="submit" style="display:none" href="#" value="simpan">
                <div id="profil" class="tabcontent" style="display : block">
                    
                    {{ csrf_field() }}
                    <div class="form-group div-2 ">
                        <label for="exampleinput4">Nama Depan</label>
                        <input readonly type="text" class="form-control form-control-md readonly" id="nama_depan" placeholder="Contoh : Aria" name="nama_depan" value="{{$user->nama_depan}}">
                    </div>
                    <div class="form-group div-2 rh">
                        <label for="exampleinput4">Nama Belakang</label>
                        <input readonly type="text" class="form-control form-control-lg readonly " id="nama_belakang" placeholder="Contoh : Samudera" name="nama_belakang" value="{{$user->nama_belakang}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleinput4">Nama Panggilan</label>
                        <input readonly type="text" class="form-control form-control-lg readonly" id="nama_panggilan" placeholder="Contoh : ASE" name="nama_panggilan" value="{{$user->nama_panggilan}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleinput4">Pendidikan Sekarang</label>
                        <select name="pendidikan" class="form-control form-control-lg readonly" id="pendidikan" readonly  >
                            @foreach($pendidikan as $pendidik)
                            @if ($user->pendidikan == $pendidik)
                            <option selected  value="{{$pendidik}}">{{$pendidik}}</option>
                            @endif
                            <option  value="{{$pendidik}}">{{$pendidik}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleinput4">Nomer Telefon</label>
                        <input readonly type="text" class="form-control form-control-lg readonly" id="telp" placeholder="0219123432" name="telp" value="{{$user->telp}}">
                    </div>
                    <div class="form-group" >
                        <label for="exampleinput4">Nomor Handphone</label>
                        <input readonly type="text" class="form-control form-control-lg readonly" id="telp_hp" placeholder="089634555083" name="telp_hp" value="{{$user->telp_hp}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleinput4">Jenis Kelamin</label><br>
                        @if($user->jenis_kelamin == "L")
                        <label for="laki">
                            <input readonly type="radio" class="readonly" id="laki"  name="jk" value="L" disabled checked>&nbspLaki-laki &nbsp
                        </label>
                        <label for="perempuan"> <input readonly type="radio" class="readonly" id="perempuan"  name="jk" value="P" disabled>&nbspPerempuan&nbsp </label>
                        @else
                        <label for="laki">
                            <input readonly type="radio" class="readonly" id="laki"  name="jk" value="L" disabled>&nbspLaki-laki &nbsp
                        </label>
                        <label for="perempuan"> <input readonly type="radio" class="readonly" id="perempuan"  name="jk" value="P" disabled checked>&nbspPerempuan&nbsp </label>
                        
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleinput4">Provinsi</label>
                        <input readonly type="text" class="form-control form-control-lg readonly" id="Provinsi" placeholder="Contoh : Jawa Barat" name="provinsi" value="{{$user->provinsi}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleinput4">Kota</label>
                        <input readonly type="text" class="form-control form-control-lg readonly" id="Kota" placeholder="Contoh : Depok" name="kota" value="{{$user->kota}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleinput4">Kode Pos</label>
                        <input readonly type="text" class="form-control form-control-lg readonly" id="kode_post" placeholder="Contoh : 16517" name="kode_pos" value="{{$user->kode_pos}}">
                    </div>
                    <div class="form-group" >
                        <label for="exampleinput4">Alamat 1</label>
                        <input readonly type="text" id='Alamat1' class="form-control form-control-lg readonly" name="alamat_1" placeholder="Contoh : Perumahan Taman Melati" value="{{$user->alamat_1}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleinput4">Alamat 2</label>
                        <input readonly type="text" id="Alamat2" class="form-control form-control-lg readonly" name="alamat_2" placeholder="Masukan Jika ada" value="{{$user->alamat_2}}">
                    </div>
                </form>
            </div>
            <div id="berkas" class="tabcontent">
                {{--
                yang perlu dalam berkas beasiswa  hasil analisa
                http://www.profesi-unm.com/2018/02/19/catat-11-berkas-ini-wajib-kamu-siapkan-untuk-daftar-beasiswa-unggulan/
                http://www.profesi-unm.com/2018/02/19/catat-11-berkas-ini-wajib-kamu-siapkan-untuk-daftar-beasiswa-unggulan/
                http://kemahasiswaan.gunadarma.ac.id/pengumuman-beasiswa-ppa-tahun-2018-rekrutmen-baru/
                
                1. data diri seperti KTP, KTM, KHS.KRS (kalau berkuliah)
                2. Ijazah dan Transkip NIlai terakhir (harus selalu diupdate)
                3. Surat Keterangan AKtif Organisasi / sertifikat prestasi
                4. Surat pernyataan sedang tidak menerima beasiswa dari tempat lain (mahasiswa)
                5. Berkas keluarga (Foto-copy orang tua, kk, pbb) (optional *dianjutkan tidak diupload)
                6. Berkas Lain nya sebagai pendukung
                
                
                --}}
                <div class="table-responsive table-upload">
                    <table class="table">
                        <tr>
                            <td colspan="3" style="text-aling:center">  <h3><b>Berkas Beasiswa</b></h3><br></td>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{route('upload_file', ["berkas_diri"])}}" method="POST" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <p>Berkas data diri (Contoh : KTP, KTM, KHS dan/atau KRS)</p>
                                    <div class="input-group">
                                        <input  type="file" name="file" style="display:none" class="berkas"  id="berkas1">
                                        <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="nama" readonly value="{{$user->berkas_diri}}">
                                        <input type="submit" style="display:none" class="btn btn-success"  name="" value="simpan">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-voluenow="0" aria-volumemin="0" aira-volumemax="100">
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <label for="berkas1" data-toggle="tooltip" data-placement="top" title="Unggah berkas!"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                        <a href="{{Storage::url($user->berkas_diri)}}"  data-toggle="tooltip" data-placement="top" title="Unduh Berkas!"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                        <a href="{{route('deleteFile', ['berkas_diri'])}}"  data-toggle="tooltip" data-placement="top" title="Hapus Berkas!" class="hapusBerkas"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                        
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="{{route('upload_file', ["ijazah"])}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <p>Ijazah dan Transkip NIlai terakhir <b>*pastikan selalu diupdate</b></p>
                                        <div class="input-group">
                                            <input readonly type="file" name="file" style="display:none" id="berkas2" class="berkas" >
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly value="{{$user->ijazah}}">
                                            <input type="submit" style="display:none" class="btn btn-success"  name="" value="simpan">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-voluenow="0" aria-volumemin="0" aira-volumemax="100">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td>
                                        
                                        <label for="berkas2" data-toggle="tooltip" data-placement="top" title="Unggah berkas!"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                        <a href="{{Storage::url($user->ijazah)}}"  data-toggle="tooltip" data-placement="top" title="Unduh Berkas!"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                        
                                        <a href="{{route('deleteFile', ['ijazah'])}}"  data-toggle="tooltip" data-placement="top" title="Hapus Berkas!" class="hapusBerkas"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="{{route('upload_file', ["organisasi"])}}" method="POST" enctype="multipart/form-data" >
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <p>Surat Keterangan AKtif Organisasi</p>
                                        <div class="input-group">
                                            <input readonly type="file"  name="file"  style="display:none" id="berkas3"  class="berkas" >
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly value="{{$user->organisasi}}">
                                            <input type="submit" style="display:none" class="btn btn-success"  name="" value="simpan">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-voluenow="0" aria-volumemin="0" aira-volumemax="100">
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td>
                                    
                                    <label for="berkas3" data-toggle="tooltip" data-placement="top" title="Unggah berkas!"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                    <a href="{{Storage::url($user->organisasi)}}"  data-toggle="tooltip" data-placement="top" title="Unduh Berkas!"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                    
                                    <a href="{{route('deleteFile', ['organisasi'])}}"  data-toggle="tooltip" data-placement="top" title="Hapus Berkas!" class="hapusBerkas"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{route('upload_file', ["sp_beasiswa"])}}" method="POST" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <p> Surat pernyataan sedang tidak menerima beasiswa dari tempat lain <b>*Berlaku untuk mahasiswa</b></p>
                                    <div class="input-group">
                                        <input readonly type="file" name="file"  style="display:none" id="berkas4"  class="berkas" >
                                        <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly value="{{$user->sp_beasiswa}}">
                                        <input type="submit" style="display:none" class="btn btn-success"  name="" value="simpan">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-voluenow="0" aria-volumemin="0" aira-volumemax="100">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        
                                        <label for="berkas4" data-toggle="tooltip" data-placement="top" title="Unggah berkas!"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                        <a href="{{Storage::url($user->sp_beasiswa)}}"  data-toggle="tooltip" data-placement="top" title="Unduh Berkas!"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                        
                                        <a href="{{route('deleteFile', ['sp_beasiswa'])}}"  data-toggle="tooltip" data-placement="top" title="Hapus Berkas!"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                        
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="{{route('upload_file', ["berkas_keluarga"])}}" method="POST" enctype="multipart/form-data" >
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <p>Berkas keluarga (Foto-copy orang tua, kk, pbb) <b>*dianjutkan tidak diupload</b></p>
                                        <div class="input-group">
                                            <input readonly type="file" name="file"  style="display:none" id="berkas5"  class="berkas" >
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly value="{{$user->berkas_keluarga}}">
                                            <input type="submit" style="display:none" class="btn btn-success"  name="" value="simpan">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-voluenow="0" aria-volumemin="0" aira-volumemax="100">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <label for="berkas5" data-toggle="tooltip" data-placement="top" title="Unggah berkas!"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                            <a href="{{Storage::url($user->berkas_keluarga)}}"  data-toggle="tooltip" data-placement="top" title="Unduh Berkas!"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                            
                                            <a href="{{route('deleteFile', ['berkas_keluarga'])}}"  data-toggle="tooltip" data-placement="top" title="Hapus Berkas!" class="hapusBerkas"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                            
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{route('upload_file', ["berkas_pendukung"])}}" method="POST" enctype="multipart/form-data" >
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <p>Berkas Lain nya sebagai pendukung</p>
                                            <div class="input-group">
                                                <input readonly type="file"name="file"  style="display:none" id="berkas6"  class="berkas" >
                                                <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly value="{{$user->berkas_pendukung}}">
                                                <input type="submit" style="display:none" class="btn btn-success"  name="" value="simpan">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-voluenow="0" aria-volumemin="0" aira-volumemax="100">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <label for="berkas6" data-toggle="tooltip" data-placement="top" title="Unggah berkas!"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                                <a href="{{Storage::url($user->berkas_pendukung)}}" > <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                                
                                                <a href="{{route('deleteFile', ['berkas_pendukung'])}}"  data-toggle="tooltip" data-placement="top" title="Hapus Berkas!" class="hapusBerkas"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                                
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        <div id="beasiswa" class="tabcontent" style="overflow:auto">
                            @foreach($user->scholarship as $beasiswa)
                            <div class="col-md-4 col-sm-6 col-lg-5">
                                <a href="{{route('user-status', [$beasiswa->id])}}" class="clickarea"></a>
                                <div class="card-profile">
                                    <div class="card-icon">
                                        <img src="{{Storage::url($beasiswa->alamat_gambar)}}">
                                        <span style="bottom : 10px;" class="fa fa-edit bg-green-color"></span>
                                    </div>
                                    <div class="card-content">{{$beasiswa->nama_beasiswa}}</div>
                                    <div class="card-footer">
                                        <div class="rh">
                                            Status <button class="btn bg-blue-color">{{$beasiswa->pivot->status}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-lg-12" style="margin: 0;padding: 0;margin-top: 10px;">
                            <div class="row">
                                <div class="col-md-3">
                                     @if(Auth::user()->img_url != null) 
                                     <img src="{{Storage::url(Auth::user()->img_url)}}" class="logo-sm"> 
                                     @else  
                                     <img src="/img/img_ss/malo.jpg" class="logo-sm"> 
                                     @endif
                                </div>
                                <div class="col-md-9">
                                    <p style="font-weight: 500;margin-bottom:0;">HI! {{$user->username}}</p>
                                    <p style="font-weight: 300;font-size:12px;">Last Online : 12 Mei 2018</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12" style="margin: 0;padding: 0;margin-top: 10px;">
                            <div class="card-profile">
                                <div class="card-icon" style="height   :100%;">
                                    <img src="{{Storage::url($user->img_url)}}">
                                    <label for="upload_gambar" style="cursor:pointer"><span class="fa fa-edit bg-blue-color" style="font-size:25px"> <p style="font-size:12px">Ganti</p></span></label>
                                    <div class="card-content">
                                        <p style="font-size: 10px;
                                            font-weight: 300;">
                                            Besar file: maksimum 10.000.000 bytes (10 Megabytes) Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                                        </p>
                                    </div>
                                </div>
                            <form action="{{route('updatePhoto')}}" method="POST" id="form_profile" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="image-editor">
                                        <input id="upload_gambar" type="file" class="cropit-image-input" name="upload" style="display:none">
                                        <div class="cropit-preview" style="width:100%;min-height:200px;"></div>
                                        <div class="image-size-label">
                                            Atur ulang ukuran gambar
                                        </div>
                                        <input type="range" class="cropit-image-zoom-input">
                                        <input type="hidden" name="image_data" class="hidden-image-data" />
                                        <div class="card-content" >
                                            <p style="font-size: 10px;
                                                font-weight: 300;">
                                                Besar file: maksimum 10.000.000 bytes (10 Megabytes) Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                                            </p>
                                            <button id="cancel-upload" class="btn btn-danger">Cancel</button>
                                            <button id="upload-image" class="btn btn-success" type="submit" >Simpan</button>
                                        </div>
                                   
                                </div>
                            </form>     
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-lg-12" style="margin: 0;padding: 0;margin-top: 10px;">
                                <button class="form-control bg-white-color" data-toggle="modal" data-target="#myModal" > <a href="#" class="grey-color"> <span class="fa fa-key"></span> Ubah Kata Sandi</a></button>
                                @if (isset(Auth::user()->facilitator->status))
                                    @if(Auth::user()->isAdmin())
                                    <div style="margin-top :10px;padding-bottom : 20px;">
                                        <button   id="sandi" class="form-control bg-blue-color"> <a href="/setting/dashboard" class="white-color"> Dashboard</a></button>
                                        
                                    </div>
                                    @else
                                    <a href="#"><p style="color:#7FDEEA;font-weight:300;font-size:12px;margin-top :4px;">Terima kasih telah bersedia menjadi penyedia, silhkan cek email anda untuk mengaktifkan akun facilitator anda  ^_^</p></a>
                                    @endif
                                
                                @else
                                <div style="margin-top :10px;padding-bottom : 20px;">
                                    <p style="color:#cccccc;font-weight:500;">Anda ingin menjadi superhero ? dan membantu sesama ?</p>
                                    <button  id="sandi" class="form-control bg-blue-color" data-toggle="modal" data-target="#myFac"> <a href="#" class="white-color"> Saya Ingin</a></button>
                                    <a href="#"><p style="color:#7FDEEA;font-weight:300;font-size:12px;margin-top :4px;">Ingin penjelasan mengenai detail menjadi penyedia ? silahkan klik disini</p></a>
                                </div>
                                @endif
                                <div id="myModal" class="modal fade" role="dialog">
                                    <form action="{{route('updatePass')}}" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="padding :19px 40px">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Ubah Password Anda</h4>
                                                </div>
                                                <div class="modal-body" style="padding: 20px 40px">
                                                    <div class="form-group ">
                                                        <label for="exampleinput4">Password Lama</label>
                                                        <div class="input-group">
                                                            <input  type="password" class="form-control form-control-lg " id="old_pass" placeholder="0219123432" name="old_password"> <span class=" click-visible input-group-addon"><i class="  glyphicon glyphicon-eye-open "></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleinput4">Password Baru</label>
                                                        <div class="input-group">
                                                            <input  type="password" class="form-control form-control-lg " id="new_pass" placeholder="0219123432" name="password">
                                                            <span class=" click-visible input-group-addon"><i class="  glyphicon glyphicon-eye-open "></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <label for="exampleinput4">Ulangi Password baru</label>
                                                        <div class="input-group">
                                                            <input  type="password" class="form-control form-control-lg " id="new_pass_con" placeholder="0219123432" name="password_confirmation">
                                                            <span class=" click-visible input-group-addon"><i class="  glyphicon glyphicon-eye-open "></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer " style="padding :20px 40px">
                                                    <input type="submit" class="bg-green-color form-control" style="border:0;color:#fff;" value="ubah">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="myFac" class="modal fade" role="dialog">
                                    <form action="{{route('profile_create')}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="padding :19px 40px">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Menjadi Facilitator</h4>
                                                </div>
                                                <div class="modal-body" style="padding: 20px 40px">
                                                    <div class="form-group">
                                                        <label for="nama_instansi">Nama Instansi</label></label>
                                                        <input type="text" class="form-control form-control-lg" id="nama_instansi" placeholder="Nama Instansi" name="nama_instansi" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi">Deskripsi</label></label>
                                                        <input type="text" class="form-control form-control-lg" id="deskripsi" placeholder="Agency Description" name="deskripsi_instansi" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kategori">kategori</label></label>
                                                        <select name="kategori" class="form-control form-control-lg " id="kategori" >
                                                            <option value="1">Perorangan</option>
                                                            <option value="2">Kelompok</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="berkas">Upload Berkas Pendukung (sertifikat juara, sertifikat keikutsertaan, sertifikasi kompetensi dll) <b> *Berkas dengan format kompress file (RAR/ZIP/TAR/GTZ)</b></label>
                                                        <input name="berkas" id="berkas" type="file"  >
                                                    </div>
                                                   <!--  <div class="form-group">
                                                        <label for="preview_image">Upload Foto Profil</label></label>
                                                        <div class="image-editor data-image-editor">
                                                            <input type="file" class="cropit-image-input">
                                                            <div class="cropit-preview"></div>
                                                            {{-- <div id="image_preview" class="img_preview"><img src="{{Storage::url($facilitator->img_url)}}"></div> --}}
                                                            <div class="image-size-label">
                                                                Resize image
                                                            </div>
                                                            <input type="range" class="cropit-image-zoom-input">
                                                            <input type="hidden" name="image_data" class="hidden-image-data" />
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="modal-footer " style="padding :20px 40px">
                                                    <input type="submit" class="bg-green-color form-control" style="border:0;color:#fff;" value="Daftar">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/hideshowpassword/2.0.8/hideShowPassword.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/jquery.cropit.js"></script>
 <script>
 $(function() {
     $('.image-editor').cropit({
         allowDragNDrop: false
     });

     $('#form_profile').submit(function() {
         // Move cropped image data to hidden input
         var imageData = $('.image-editor').cropit('export');
         $('.hidden-image-data').val(imageData);
     });


 });
 </script>
<script>
   $(document).ready(function(){
         $('.hapusBerkas').each(function(index, element){
            })
        $('form > .input-group > input[type=file]').change(function(){
            var $form = $(this).closest('form');
            console.log($form); 
           $form.find('input.btn-success').css('display','block')
            $form.submit(function(event){
                $progress = $(this).find(".progress-bar");
                $progress.parent().css('display', 'block')
                // event.preventDefault();
                $(this).ajaxSubmit({
                    beforeSubmit : function(){
                        $progress.width('0%')
                    },
                    uploadProgress : function(event, position,total, percentComplete){
                        $progress.width(percentComplete+"%")
                        $progress.html('<div id="progress-status">'+percentComplete + '%</div>')
                    },
                    success : function(success){
                        console.log(success)
                    },
                    resetForm : false
                })
                return false
                   console.log("asdas") 
             });                
        });
      
        $('#upload_gambar').change(function(){
            console.log('berubah')
            // $(this).next('.cropit-preview').css('width', '100%')
            $(this).parent().css('display', 'block');
        })

        $('#cancel-upload').on('click', function(){
            $('.image-editor').css('display', 'none')
        })
        $('[data-toggle="tooltip"]').tooltip();   
        $('body').css("background-color", "#f6f7f8");
        $('.navbar-fixed-top').removeClass('navbar-scroll');
        $('.profile-toogle').removeClass('item-scroll');
        $('.berkas').each(function(index, element){
            $(element).on('change', function() {
            var input  = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                asli = input.val(),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
             });
            $(element).on('fileselect', function(event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            });
        }); 
     });
  
 </script>
<script>
    $(document).ready(function(){
        var array_data = [] 
        var array_object = []

        var data_ar = []
        var input ;
        var check_data =  function(data_array = [], data_input =  '#Provinsi' ){
            input = $(data_input)
            input.typeahead({
            source:  function (query, process) {
            return $.get("http://localhost:8000/js/indonesia.json", function (data) {
                array_data = []
                array_object = data;
                if(data_array.length != 0 ){
                    array_object = data_array;
                }
                for(var i in array_object){
                    if(array_object[i].name instanceof Object){
                        array_data.push((Object.keys(array_object[i].name))[0])
                    }
                else {
                    array_data.push(array_object[i].name)
                }
                }
            
            return process(array_data);
            });
            }
        });
        }
        check_data()


        input.change(function() {
        var current = input.typeahead("getActive");
        if (current) {
            // Some item from your model is active!
            if (current == input.val()) {
                check(array_object, current)
            }
        }
        });


        
        var check = function(provinsi, kota){

            for (var i in provinsi){
                if(Object.keys(provinsi[i].name)[0] == kota){
                var ob = (provinsi[i].name)[kota];
                for( var i in  ob){
                data_ar[i] = {
                    "name" :  ob[i] 
                }
                check_data(data_ar, '#Kota')
                }
                }
            }
        }
    })
</script>
<script>
    var _tmp;
    let allow_char = [8,48,46,49,50,51,52,53,54,55,56,57];
    $( "#telp_hp" ).keypress(function(e) {
        if(allow_char.indexOf(e.which) !== -1 ){
            var value = $( this ).val();
            if(value.length < 17){
                if(value.length == 4 || value.length == 9  ){
                value  = value + "-";
            $(this).val(value);
            
                }
                _tmp = value;
            }else {
                $(this).val(_tmp)
            }
        } else {
        return false;
        }

    }).keypress();
    $( "#telp" ).keypress(function(e) {

        if(allow_char.indexOf(e.which) !== -1 ){
            var value = $( this ).val();
            if(value.length < 17){
                if(value.length ==  3  ){
                value  = "(" +value + ")-";
            $(this).val(value);
            
                }
                _tmp = value;
            }else {
                $(this).val(_tmp)
            }
        } else {
        return false;
        }

    }).keypress();
</script>
<script>
    var nd,nb,np,pd,tl,tlp,jk,pro,kt,a1,a2;
   $(document).ready(function(){

      // toggle password visibility
        $('.click-visible >  .glyphicon ').on('click', function() {
            console.log("gallo")
          $(this).toggleClass('glyphicon-eye-close').toggleClass('glyphicon-eye-open'); // toggle our classes for the eye icon
           $(this).closest('.form-group').find('input').togglePassword()
        });

        nd = $('#nama_depan').val();
        nb = $('#nama_belakang').val();
        np = $('#nama_panggilan').val();
        pd = $('#pendidikan').val();
        tl = $('#telp').val();
        tlp = $('#telp_hp').val();
        pro = $('#provinsi').val();
        kt = $('#kota').val();
        a1 = $('#alamat1').val();
        a2 = $('#alamat2').val();

        $('.change').on('click',function(index,element){
                $('.readonly').removeAttr("readonly")
                $('select').removeAttr("readonly")
                $('.readonly').removeAttr("disabled")
                $('.simpan').addClass("visible")
                $('.simpan').removeClass("hidden")
                $('.cancel').addClass("visible")
                $('.cancel').removeClass("hidden")
                $('.change').addClass("hidden")
                $('.change').removeClass("visible")
                // $('.berkas').removeAttr("disabled")
        })

        $('.cancel').on('click',function(index,element){
            $('#nama_depan').val(nd);
            $('#nama_belakang').val(nb);
            $('#nama_panggilan').val(np);
            $('#pendidikan').val(pd);
            $('#telp').val(tl);
            $('#telp_hp').val(tlp);
            $('#provinsi').val(pro);
            $('#kota').val(kt);
            $('#alamat1').val(a1);
            $('#alamat2').val(a2);
                $('.readonly').prop("readonly", "true")
                $('select').prop("readonly", "true")
                $('.readonly').prop("disabled", "true")
                $('.simpan').addClass("hidden")
                $('.simpan').removeClass("visible")
                $('.cancel').addClass("hidden")
                $('.cancel').removeClass("visible")
                $('.change').addClass("visible")
                $('.change').removeClass("hidden")
                 // $('.berkas').prop("disabled", "true")
            })
    })


</script>
    <!-- Your Own Script -->
<script type="text/javascript" src="/js/default.js"></script>
@endsection