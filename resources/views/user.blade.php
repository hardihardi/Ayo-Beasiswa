@extends('layouts.web')

@section('content')
    <div class="wrap single-profile" style="margin-bottom:20px;">
        <div class="container" >
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8  col-md-offset-2 col-lg-offset-2" style="border:0">
                    <div class="row">
                        <div class="col-sm-4  col-xs-12 col-md-4">
                            <img src="/img/img_ss/malo.png" class="rounded-lg">
                        </div>
                        <div class="col-sm-8 col-xs-12 col-md-8 yf">
                            <h3>Aria Samudera Elhamidy</h3>
                            <p>Member sejak 12 Mei 2018, Depok</p><br>
                            <i class="	fa fa-hand-pointer-o " ></i>&nbsp <p>Mendaftar 3 beasiswa </p><br>
                            <i class="fa fa-clock-o " ></i> &nbsp<p>Terakhir aktif 12 Mei 2018</p>
                            <br>
                            
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-12 col-sm-12 col-lg-12 yf" style="margin-top:40px;">
                            <h4>&nbsp Beasiswa yang didaftarkan </h4>
                            <hr style="background:#48C3CF;height:2px;width:40%;border-radius:2px;margin-top:-5px;float:left;margin-left:8px;">
                            <div class="clear"></div>
                         </div>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                                <a href="#" class="clickarea"></a>
                            <div class="card-profile">
                                    <figure class="name" style="z-index:150"><p>
                                            Elhamid Corp
                                        </p>
                                        </figure>
                                <div class="card-icon" style="min-height:300px;max-height:500px;height:100%;">
                                    <img src="/img/img_ss/GOJEK.JPG">
                                    <img src="/img/img_ss/malo.png" class="img-dev">
                                </div>
                                <div class="card-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum doloremque voluptatem blanditiis omnis hic!</div>
                                <div class="card-footer">
                                    <div class="rh">
                                        Status <button class="btn bg-blue-color">Diterima</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 yf" style="margin-top:40px;">
                                <h4>&nbsp Beasiswa Terbaru </h4>
                                <hr style="background:#48C3CF;height:2px;width:30%;border-radius:2px;margin-top:-5px;float:left;margin-left:8px;">
                                <div class="clear"></div>
                        </div>
                        <div class="row" style="padding:0 15px">
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                        <a href="#" class="clickarea"></a>
                                    <div class="card-profile">
                                        <div class="card-icon">
                                            <img src="/img/img_ss/GOJEK.JPG">
                                        </div>
                                        <div class="card-footer">
                                            <div class="rh">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                        <a href="#" class="clickarea"></a>
                                    <div class="card-profile">
                                        <div class="card-icon">
                                            <img src="/img/img_ss/GOJEK.JPG">
                                        </div>
                                        <div class="card-footer">
                                            <div class="rh">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                        <a href="#" class="clickarea"></a>
                                    <div class="card-profile">
                                        <div class="card-icon">
                                            <img src="/img/img_ss/GOJEK.JPG">
                                        </div>
                                        <div class="card-footer">
                                            <div class="rh">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('body').css("background-color", "#fff");
        $('.navbar-fixed-top').removeClass('navbar-scroll');
         $('.profile-toogle').removeClass('item-scroll');
     });
  
 </script>
@endsection