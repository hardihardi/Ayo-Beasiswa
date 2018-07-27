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
                    <div class="card-header card-header-info">
                        <div class="card-title"><i class="ion-stats-bars"></i> Jumlah Beasiswa</div>
                        <div class="card-menu">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-number">2</div>
                    </div>
                    <div class="card-footer">
                        <a href="#">Open Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-icon-background">
                    <div class="card-header card-header-danger">
                        <div class="card-title"><i class="ion-university"></i> User</div>
                        <div class="card-menu">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-number">10</div>
                    </div>
                    <div class="card-footer">
                        <a href="#">Open Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
