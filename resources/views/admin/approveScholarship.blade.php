@extends('layouts.app')

@section('content')
<style>

.content > .row > .col-md-10 {
	    margin-top: 100px;
    background: #fff;
    padding: 0;
    border: 2px solid #F1F1F1;
    border-radius: 20px;
    overflow: hidden;
}

.content > .row > .col-md-10 > .col-md-4 {
	overflow: hidden;
    height: 215px;
    padding : 0;
}

.content > .row > .col-md-10 > .col-md-4 > img {
	height: 100%;
}
}

</style>
<section class="content content-stretch">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
				<div class="col-md-4">
					<img src="/img/img.jpg" class="square-lg">
				</div>

				<div class="col-md-7">

				</div>
		</div>
	</div>
</section>
@endsection