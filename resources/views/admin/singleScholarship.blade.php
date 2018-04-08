@extends('layouts.app')

@section('content')
 <section class="content content-stretch">
          <div class="hero">
            <div class="hero-overlay">
                    <div class="left-side">
                        <img src="" alt="">
                         <div class="hero-title">HACKTIV SCHOLARSHIP</div>
                        <div class="hero-description">Merupakan Beasiswa yang ditujukan kepada pada developer muda untuk menitih kalir di dunia programming </div>
                         <div class="toolbar-menu">
                            <a href="" class="btn btn-success btn-outline btn-rounded"><i class="fa fa-edit"></i> Edit</a>
                            <a href="" class="btn btn-danger btn-outline btn-rounded"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                        </div>
            </div>
        </div>
        <div class="toolbar">
            <div class="toolbar-title">List Of Registrant</div>
        </div>

        <div class="content-inner">
            <table id="table-post" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Education</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Education</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection