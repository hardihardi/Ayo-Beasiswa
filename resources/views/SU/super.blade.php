@extends('layouts.app')

@section('content')
    <section class="content">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}  <a href="/setting/profile/">Disini</a> 
        </div>
        @endif
        <div class="title-pages">Dashboard</div>
        <div class="row small-gutter">
            <div class="col-md-4">
                <div class="card card-icon-background">
                    <div class="card-header card-header-success">
                        <div class="card-title"><i class="ion-chatbubbles"></i> Notification</div>
                        <div class="card-menu">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ion-android-more-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-number">238</div>
                    </div>
                    <div class="card-footer">
                        <a href="#">Open Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-icon-background">
                    <div class="card-header card-header-info">
                        <div class="card-title"><i class="ion-stats-bars"></i> Visitor</div>
                        <div class="card-menu">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ion-android-more-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-number">49</div>
                    </div>
                    <div class="card-footer">
                        <a href="#">Open Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-icon-background">
                    <div class="card-header card-header-danger">
                        <div class="card-title"><i class="ion-university"></i> Registrant</div>
                        <div class="card-menu">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ion-android-more-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-number">148</div>
                    </div>
                    <div class="card-footer">
                        <a href="#">Open Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
