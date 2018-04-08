@extends('layouts.app')

@section('content')
<section class="content content-stretch">
        <div class="toolbar">
            <div class="toolbar-title">Scholarshp List</div>
            <div class="toolbar-menu">
                <a href="" class="btn btn-info btn-outline btn-rounded"><i class="fa fa-plus"></i> Select All</a>
                <a href="" class="btn btn-danger btn-outline btn-rounded"><i class="fa fa-trash"></i> Trash</a>
            </div>
        </div>
        
        <div class="content-inner">
            <div class="row">
                <div class="col-md-4 col-sm-6" id="1">
                    <div class="card">
                        <a href="{{route('singleList', ['id' => 1 ])}}" class="clickarea"></a>
                        <img class="card-img-top" src="/img/img-card.jpg" alt="image" style="width:100%">
                        <div class="card-header">
                            Hactiv GOJEK Scholarship </div>
                        <div class="card-content">Hacktiv gojek scholarship merupakan beasiswa yang diberikan kepada kamu yang ingin mendalami mengenai fullstack developer</div>
                    </div>
                </div>
              
            </div>
        </div>
    </section>
@endsection