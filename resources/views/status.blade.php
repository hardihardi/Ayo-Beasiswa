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

@section('content')
<style>


.bg-setting {
        width: 100%;
    height: 100%;
}

.box {
    border : 2px solid #777777;
    margin-top:   40px;
    padding : 10px;
}

.title-op {
    position: absolute;
    bottom: 30px;
    left: 40px;
    color: #fff;
    font-weight: 700;
    width: 70%;
    font-size: 250%;
    opacity: .7;
    z-index: 60;
}

.clickarea3 {
    display: block;
    z-index: 50;
    position: absolute;
    top: 0;
    right: 15px;
    bottom: 0;
    left: 15px;
    opacity: .5;
    background: #222;
}

.row > table > tbody > tr > td > .switch-control{
  margin-left: 40px;
}

</style>
    <div class="wrap single-profile" style="margin-bottom:20px;">
        <div class="container" >
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8  col-md-offset-2 col-lg-offset-2" style="border:0">
                <div class="row">
                    <div class="col-sm-12  col-xs-12 col-md-12" style="max-height:500px;">
                        <a class="clickarea3" href="/beasiswa/{{$user->str_slug}}"></a>
                        <img src="{{Storage::url($user->alamat_gambar)}}" class="bg-setting">
                          <h3 class="title-op">{{$user->nama_beasiswa}}</h3>
                          <h3 style="position: absolute;right: 10px;z-index: 60">Status  : <button class="btn btn-info">{{$user->pivot->status}}</button></h3>
                    </div>
                    <div class="col-sm-8 col-xs-12 col-md-8 yf">
                    
                    </div>
                </div>
                <div class="row" style="margin-top:50px;">
                    <div class="col-md-12">
                        <h4>&nbsp Informasi Penyedia </h4>
                        <hr style="background:#48C3CF;height:2px;width:40%;border-radius:2px;margin-top:-5px;float:left;margin-left:8px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3  col-xs-12 col-md-3" style="margin-right: 20px;">
                          <img src="{{Storage::url($user->facilitator->img_url)}}" class="rounded-lg">

                    </div>
                    <div class="col-sm-8 col-xs-12 col-md-8 yf">
                        <h3>{{$user->facilitator->nama_instansi }}</h3>
                        <p> {{$user->facilitator->deskripsi_instansi }}</p><br>
                        <i class="  fa fa-hand-pointer-o " ></i>&nbsp <p>Jumlah  {{count($user->facilitator->scholarships)}} beasiswa </p><br>
                        <i class="fa fa-clock-o " ></i> &nbsp<p>Akhir Pendaftaran Beasiswa  {{ \Carbon\Carbon::parse($user->masa_berlaku)->diffForHumans()}}</p>
                        <br>

                    </div>
                </div>
                <div class="row">
                     <div class="col-md-12 col-sm-12 col-lg-12 yf" style="margin-top:40px;">
                        <h4>&nbsp Berkas Anda </h4>
                        <hr style="background:#48C3CF;height:2px;width:30%;border-radius:2px;margin-top:-5px;float:left;margin-left:8px;">
                        <div class="clear"></div>
                     </div>
                </div>
                <form action="{{route('updateScholar', [$user->id])}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                   <input type="hidden" name="_method" value="PUT">
                <div class="row">
                        <table class="table">
                
                        <thead>
                          <tr>
                            <th>Berkas</th>
                            <th>Gunakan Berkas Profil</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($user->berkas_diri != 0)
                             <tr>
                                <td><p>Berkas data diri (ex : KTP, KTM, KHS dan/atau KRS)</p></td>
                                <td>
                                    @if(Auth::user()->berkas_diri != null)
                                    <div class="switch-control">
                                        <label class="switch">
                                             <input type="checkbox" name="berkas[]" value="berkas_diri" {{ ($user->pivot->berkas_diri != null) ? "checked" : ""}}>
                                             <span class="slider round"></span>
                                       </label>
                                    </div>
                                    @else
                                    <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
                                    @endif
                                </td>
                           
                              </tr>
                          @endif
                            @if($user->ijazah != 0)
                             <tr>
                                <td><p>Ijazah dan Transkip NIlai terakhir</p></td>
                                <td>
                                        @if(Auth::user()->ijazah != null)
                                 <div class="switch-control">
                                        <label class="switch">
                                             <input type="checkbox" name="berkas[]" value="ijazah" {{ ($user->pivot->ijazah != null) ? "checked" : ""}}  >
                                             <span class="slider round"></span>
                                       </label>
                                    </div>
                                    @else
                                    <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
                                    @endif
                                  
                                </td>
                           
                              </tr>
                          @endif
                            @if($user->organisasi != 0)
                             <tr>
                                <td><p>Surat Aktif Organisasi</p></td>
                                <td>

                                        @if(Auth::user()->organisasi != null)
                               <div class="switch-control">
                                        <label class="switch">
                                             <input type="checkbox" name="berkas[]" value="organisasi" {{ ($user->pivot->organisasi != null) ? "checked" : ""}}>
                                             <span class="slider round"></span>
                                       </label>
                                    </div>
                                    @else
                                    <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
                                    @endif
                                
                                </td>
                           
                              </tr>
                          @endif
                            @if($user->sp_beasiswa != 0)
                             <tr>
                                <td><p>Surat pernyataan sedang tidak menerima beasiswa dari tempat lain</p></td>
                                <td>
                                        @if(Auth::user()->sp_beasiswa != null)
                                <div class="switch-control">
                                        <label class="switch">
                                             <input type="checkbox" name="berkas[]" value="sp_beasiswa" {{ ($user->pivot->sp_beasiswa != null) ? "checked" : ""}}>
                                             <span class="slider round"></span>
                                       </label>
                                    </div>
                                    @else
                                    <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
                                    @endif
                                 
                                </td>
                           
                              </tr>
                          @endif
                            @if($user->berkas_keluarga != 0)
                             <tr>
                                <td><p>Berkas keluarga (Foto-copy orang tua, kk, pbb)</p></td>
                                <td>
                                            @if(Auth::user()->berkas_keluarga != null)
                                   <div class="switch-control">
                                        <label class="switch">
                                             <input type="checkbox" name="berkas[]" value="berkas_keluarga" {{ ($user->pivot->berkas_keluarga != null) ? "checked" : ""}}>
                                             <span class="slider round"></span>
                                       </label>
                                    </div>
                                    @else
                                    <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
                                    @endif
                            
                                </td>
                           
                              </tr>
                          @endif
                          <tr>
                            <td><p>Berkas Pendukung (sertifikat juara, sertifikat keikutsertaan, sertifikasi kompetensi dll)</p></td>
                            <td>
                                @if(Auth::user()->berkas_pendukung != null)
                               <div class="switch-control">
                                    <label class="switch">
                                         <input type="checkbox" name="berkas[]" value="berkas_pendukung" {{ ($user->pivot->berkas_pendukung != null) ? "checked" : ""}}>
                                         <span class="slider round"></span>
                                   </label>
                                </div>
                                @else
                                <p>Anda Belum Memiliki berkas ini dalam profil anda<p>
                                @endif
                        
                            </td>
                       
                          </tr>
                            @if( $user->berkas_lain !== "0" or  $user->berkas_lain !== "0" )
                             <tr>
                                <td><p>{{$user->berkas_lain}} <b>*ungga berkas dalam format Kompress (ZIP/RAR/GTZ) Berkas ini dapat diunggah setelah melakukan upload berkas wajib minimal 1</b></p>
                                        <input type="file" name="file" id="berkas_lain">
                                        <p>File Anda  : {{$user->pivot->berkas_lain}}
                                </td>
                                <td>
                                        <a href="{{Storage::url($user->pivot->berkas_lain)}}"  data-toggle="tooltip" data-placement="top" title="Unduh Berkas!"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                        
                                        <a href="{{route('deleteFile', ['berkas_lain', 'facilitator', $user->pivot->scholarship_id])}}"  data-toggle="tooltip" data-placement="top" title="Hapus Berkas!" class="hapusBerkas"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                </td>
                              </tr>
                          @endif
                            
                        </tbody>
                       
                </table>
                </div>
                <input type="submit" class="bg-green-color form-control" style="border:0;color:#fff;" value="Ubah">

              </br>
                <a href="{{route('cancel-schola',[$user->id])}}" class="btn btn-danger form-control" style="border:0;color:#fff;" >Batalkan Mendaftar</a>
                 </form>
                <div class="row" style="padding:0 15px"></div>
                </div>
            </div>
         </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
   $('[data-toggle="tooltip"]').tooltip(); 
    $(document).ready(function() {
        $('body').css("background-color", "#fff");
        $('.navbar-fixed-top').removeClass('navbar-scroll');
         $('.profile-toogle').removeClass('item-scroll');
     });
  
 </script>
@endsection