@extends('layouts.web')

@section('css')
<link rel="stylesheet" href="/css/croppit.css">
@endsection

@section('content')
    <div class="wrap single-profile">
        <div class="container">
            <div class="col-lg-8 col-md-12  col-sm-12 col-xs-12" style="margin-bottom:30px;padding-bottom:50px;min-height: 800px;">
                 
                    <div class="tab">
                            <h3 style="display:inline;margin-bottom :10px;"><b>Aria Samudera ELhamidy</b></h3>
                            
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
                            
                            <div class="clear"></div>
                        <button class="tablinks active" onclick="openTab(event, 'profil')">Biodata Diri</button>
                        <button class="tablinks" onclick="openTab(event, 'berkas')">Berkas Beasiswa</button>
                        <button class="tablinks" onclick="openTab(event, 'beasiswa')">Beasiswa Anda</button>
                        
                    </div>
                    <form action="{{ route('createScholarship')}}" method="POST" enctype="multipart/form-data">
                    <input id="save" type="submit" style="display:none" href="#" value="simpan">
                    <div id="profil" class="tabcontent" style="display : block">
                        
                        {{ csrf_field() }}
                        <div class="form-group div-2 ">
                        <label for="exampleinput4">Nama Depan</label>
                        <input readonly type="text" class="form-control form-control-md readonly" id="nama_depan" placeholder="Ex : Aria" name="nama_depan" value="aria">
                        </div>
                        <div class="form-group div-2 rh">
                        <label for="exampleinput4">Nama Belakang</label>
                        <input readonly type="text" class="form-control form-control-lg readonly " id="nama_belakang" placeholder="Ex : Samudera" name="nama_belakang">
                        </div>
                        <div class="form-group">                                
                                <label for="exampleinput4">Nama Panggilan</label>  
                                <input readonly type="text" class="form-control form-control-lg readonly" id="nama_panggilan" placeholder="Ex : ASE" name="nama_panggilan">                                
                                </div>
                        <div class="form-group">                                 
                        <label for="exampleinput4">Pendidikan Sekarang</label> 
                        <select name="pendidikan" class="form-control form-control-lg readonly" id="pendidikan" readonly>
                            <option value=""></option>    
                            <option value="sd">Sekolah Dasar</option>    
                            <option value="smp">Sekolah Menengah Pertama</option>    
                            <option value="sma">Sekolah Menengah Atas</option>    
                            <option value="smk">Sekolah Menengah Kejuruan</option>    
                            <option value="kuliah">Kuliah</option>    
                            <option value="tidak kuliah">Sedang Tidak Bersekolah</option>
                                                                    
                        </select>                              
                        </div>
                        <div class="form-group">                                 
                        <label for="exampleinput4">Nomer Telefon</label>
                        <input readonly type="text" class="form-control form-control-lg readonly" id="telp" placeholder="0219123432" name="telp">                                 
                        </div>
                        <div class="form-group">                                 
                        <label for="exampleinput4">Nomor Handphone</label>  
                        <input readonly type="text" class="form-control form-control-lg readonly" id="telp_hp" placeholder="089634555083" name="telp_hp">                                
                        </div>
                        <div class="form-group">                                 
                        <label for="exampleinput4">Jenis Kelamin</label><br>  
                        <label for="laki">
                                <input readonly type="radio" class="" id="laki"  name="jk" value="L" disabled>&nbspLaki-laki &nbsp   
                        </label>       
                        <label for="perempuan"> <input readonly type="radio" class="" id="perempuan"  name="jk" value="P" disabled>&nbspPerempuan&nbsp </label>  
                            
                        </div>
                    
                        <div class="form-group">                                
                        <label for="exampleinput4">Provinsi</label>    
                        <input readonly type="text" class="form-control form-control-lg readonly" id="Provinsi" placeholder="Ex : Jawa Barat" name="provinsi">
                        </div>
                        <div class="form-group">                                
                        <label for="exampleinput4">Kota</label>  
                        <input readonly type="text" class="form-control form-control-lg readonly" id="Kota" placeholder="Ex : Depok" name="kota">                                
                        </div>
                        <div class="form-group">                                
                        <label for="exampleinput4">Alamat 1</label>  
                        <input readonly type="text" id='Alamat1' class="form-control form-control-lg readonly" name="alamat_1" placeholder="Ex : Perumahan Taman Melati">                       
                        </div>
                        <div class="form-group">                                
                        <label for="exampleinput4">Alamat 2</label>   
                        <input readonly type="text" id="Alamat2" class="form-control form-control-lg readonly" name="alamat_2" placeholder="Masukan Jika ada">                                
                        </div>
                        
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
                                            <p>Berkas data diri (ex : KTP, KTM, KHS dan/atau KRS)</p>
                                            <div class="input-group">
                                                <input readonly type="file" name="berkas1" style="display:none" class="berkas" id="berkas1">
                                                <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly>
                                            </div>
                                        </td>
                                            <td>
                                            <label for="berkas1"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                            <a href="#"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a> 
                                            <a href="#"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                            
                                        </td>
                                    </tr>
                                        <tr>
                                        <td>
                                            <p>Ijazah dan Transkip NIlai terakhir <b>*pastikan selalu diupdate</b></p>
                                            <div class="input-group">
                                            <input readonly type="file" name="berkas2" style="display:none" id="berkas2" class="berkas">
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly>
                                            </div>
                                        </div>
                                        </td>
                                            <td>
                                            
                                            <label for="berkas2"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                                <a href="#"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                            
                                            <a href="#"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Surat Keterangan AKtif Organisasi / sertifikat prestasi</p>
                                            <div class="input-group">
                                            <input readonly type="file" name="berkas3" style="display:none" id="berkas3"  class="berkas">
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly>
                                            </div>
                                        </div>
                                        </td>
                                            <td>
                                            
                                            <label for="berkas3"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                                <a href="#"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                            
                                            <a href="#"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p> Surat pernyataan sedang tidak menerima beasiswa dari tempat lain <b>*Berlaku untuk mahasiswa</b></p>
                                            <div class="input-group">
                                            <input readonly type="file" name="berkas4" style="display:none" id="berkas4"  class="berkas">
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly>
                                            </div>
                                        </td>
                                            <td>
                                            
                                            <label for="berkas4"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                                <a href="#"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                            
                                            <a href="#"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Berkas keluarga (Foto-copy orang tua, kk, pbb) <b>*dianjutkan tidak diupload</b></p>
                                            <div class="input-group">
                                            <input readonly type="file" name="berkas5" style="display:none" id="berkas5"  class="berkas">
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly>
                                            </div>
                                        </td>
                                            <td>
                                            <label for="berkas5"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                                <a href="#"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                            
                                            <a href="#"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Berkas Lain nya sebagai pendukung</p>
                                            <div class="input-group">
                                            <input readonly type="file" name="berkas6" style="display:none" id="berkas6"  class="berkas">
                                            <input readonly type="text" class="form-control" style="color:#222;" placeholder="Berkas Belum Diupload" name="foto" readonly>
                                            </div>
                                        </td>
                                            <td>
                                            <label for="berkas6"> <span class="glyphicon glyphicon-cloud-upload iconic blue-color"></label>
                                                <a href="#"> <span class="glyphicon glyphicon-cloud-download iconic green-color"></span></a>
                                            
                                            <a href="#"> <span class="glyphicon glyphicon-trash iconic red-color"></span></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        
                    </div>
                    <div id="beasiswa" class="tabcontent" style="overflow:auto">              
                        <div class="col-md-4 col-sm-6 col-lg-5">
                                <a href="#" class="clickarea"></a>
                            <div class="card-profile">
                                <div class="card-icon">
                                    <img src="/img/img_ss/GOJEK.JPG">
                                    <span class="fa fa-edit bg-green-color"></span>
                                </div>
                                <div class="card-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum doloremque voluptatem blanditiis omnis hic!</div>
                                <div class="card-footer">
                                    <div class="rh">
                                        Status <button class="btn bg-blue-color">Diterima</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-lg-12" style="margin: 0;padding: 0;margin-top: 10px;">
                    <div class="row">
                        <div class="col-md-3">
                                <img src="/img/img_ss/malo.png" class="logo-sm">                           
                        </div>
                        <div class="col-md-9">
                            <p style="font-weight: 500;margin-bottom:0;">Aria Samudera Elhamidy</p>
                            <p style="font-weight: 300;font-size:12px;">Last Online : 12 Mei 2018</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12" style="margin: 0;padding: 0;margin-top: 10px;">
                    <div class="card-profile">
                        <div class="card-icon" style="height   :100%;">
                            <img src="/img/img_ss/malo.png">
                            <span class="fa fa-edit bg-blue-color" style="font-size:25px"> <p style="font-size:12px">Ganti</p></span>
                        
                        </div>
                        <div class="card-content" style="margin-top : 30px;" >
                            <p style="font-size: 10px;
                            font-weight: 300;">
                                Besar file: maksimum 10.000.000 bytes (10 Megabytes) Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12" style="margin: 0;padding: 0;margin-top: 10px;">
                        <button class="form-control bg-white-color" data-toggle="modal" data-target="#myModal" > <a href="#" class="grey-color"> <span class="fa fa-key"></span> Ubah Kata Sandi</a></button>
                        @if (Auth::user()->isAdmin())
                            <div style="margin-top :10px;padding-bottom : 20px;">
                                <button   id="sandi" class="form-control bg-blue-color"> <a href="/setting/dashboard" class="white-color"> Dashboard</a></button>
                               
                            </div>
                        @elseif(Auth::user()->facilitator->status == 0)
                        <a href="#"><p style="color:#7FDEEA;font-weight:300;font-size:12px;margin-top :4px;">Terima kasih telah bersedia menjadi penyedia, silhkan cek email anda untuk mengaktifkan akun facilitator anda  ^_^</p></a>
                        @else
                            <div style="margin-top :10px;padding-bottom : 20px;">
                                <p style="color:#cccccc;font-weight:500;">Anda ingin menjadi superhero ? dan membantu sesama ?</p>
                                <button  id="sandi" class="form-control bg-blue-color" data-toggle="modal" data-target="#myFac"> <a href="#" class="white-color"> Saya Ingin</a></button>
                                <a href="#"><p style="color:#7FDEEA;font-weight:300;font-size:12px;margin-top :4px;">Ingin penjelasan mengenai detail menjadi penyedia ? silahkan klik disini</p></a>
                            </div>
                        @endif
                        <div id="myModal" class="modal fade" role="dialog">
                            <form action="#" method="put">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="padding :19px 40px">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ubah Password Anda</h4>
                                        </div>
                                        <div class="modal-body" style="padding: 20px 40px">
                                            <div class="form-group">                                 
                                                <label for="exampleinput4">Password Lama</label>
                                                <input  type="text" class="form-control form-control-lg " id="telp" placeholder="0219123432" name="password_lama">                                 
                                            </div>
                                            <div class="form-group" >                                 
                                                <label for="exampleinput4">Password Baru</label>
                                                <input  type="text" class="form-control form-control-lg " id="telp" placeholder="0219123432" name="password">                                 
                                            </div>
                                            <div class="form-group">                                 
                                                <label for="exampleinput4">Ulangi Password baru</label>
                                                <input  type="text" class="form-control form-control-lg " id="telp" placeholder="0219123432" name="password_confirmation">                                 
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
                                                            <label for="berkas">Upload Berkas Pendukung <b> *Berkas dengan format kompress file (RAR/ZIP/TAR/GTZ)</b></label>
                                                            <input name="berkas" id="berkas" type="file"  > 
                                                        </div>
                                                        <div class="form-group">                                
                                                            <label for="preview_image">Upload Foto Profil</label></label>  
                                                            <div class="image-editor">
                                                                <input type="file" class="cropit-image-input">
                                                                <div class="cropit-preview"></div>
                                                                {{-- <div id="image_preview" class="img_preview"><img src="{{Storage::url($facilitator->img_url)}}"></div> --}}
                                                                <div class="image-size-label">
                                                                    Resize image
                                                                </div>
                                                                <input type="range" class="cropit-image-zoom-input">
                                                                <input type="hidden" name="image_data" class="hidden-image-data" />
                                                            </div>
                                                        </div>
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
<script type="text/javascript" src="/js/jquery.cropit.js"></script>
<script>
$(function() {
    $('.image-editor').cropit({
    allowDragNDrop: false
});

    $('form').submit(function() {
        // Move cropped image data to hidden input
        var imageData = $('.image-editor').cropit('export');
        $('.hidden-image-data').val(imageData);
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
            $('body').css("background-color", "#f6f7f8");
            $('.navbar-fixed-top').removeClass('navbar-scroll');
         $('.profile-toogle').removeClass('item-scroll');
         $("button").click(function(){
         $.getJSON("demo_ajax_json.js", function(result){
             $.each(result, function(i, field){
                 $("div").append(field + " ");
             });
         });
     });
     });
  
 </script>
<script>
    $(document).ready(function(){
        var array_data = [] 
        var array_object = []
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


        var data_ar = []
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
    $(document).ready(function(){
        $('.berkas').each(function(index, element){
            $(element).on('change', function() {
            var input  = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                asli = input.val(),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
        });

    // We can watch for our custom `fileselect` event like this

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
    var nd,nb,np,pd,tl,tlp,jk,pro,kt,a1,a2;
   $(document).ready(function(){
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
            })
    })


</script>
    <!-- Your Own Script -->
<script type="text/javascript" src="/js/default.js"></script>
@endsection