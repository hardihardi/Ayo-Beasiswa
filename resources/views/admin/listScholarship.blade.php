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

                @foreach($beasiswas as $beasiswa) 
                    <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1" id="1" style="margin-bottom:50px;">
                        <div class="card">
                            <a href="{{route('singleList', ['id' => $beasiswa->str_slug ])}}" class="clickarea"></a>
                            <img class="card-img-top" src="{{Storage::url($beasiswa->alamat_gambar)}}" alt="image" style="width:100%">
                            <div class="card-header">

                                @if($beasiswa->created_at->diffForHumans())
                                     <h5 class="date_text"> Since {{ $beasiswa->created_at->diffForHumans() }}</h5>
                                @else 
                                     <h5 class="date_text"> Since 12 days ago</h5>

                                @endif
                               
                                 <div class="category">
                                    @if($beasiswa->categories != null)
                                        @foreach($beasiswa->categories->slice(0,3) as $category)
                                            <p>{{$category->judul}}</p>
                                        @endforeach
                                    @endif
                                </div>
                                <h3 class="title_text">{{$beasiswa->nama_beasiswa }}</h3>
                               
                            </div>
                            <div class="card-content">
                               
                            </div>
                        </div>
                    </div>

                @endforeach
              
            </div>
        </div>
    </section>
@endsection

