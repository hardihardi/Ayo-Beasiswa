@extends('layouts.login_layout')
@section('content')
 <!-- Login Card -->
    <div class="container login-container" >
        <div class="row" style="">
            <div class="col-md-4 col-sm-8 col-md-offset-4 col-sm-offset-2">
                <div class="card card-clean">
                    <div class="card-icon">
                        <img class="img-icon" src="/img/icon.png">
                    </div>
                    <div class="card-content">
                     
                        <div class="tab">
                          <button class="tablinks active" onclick="openTab(event, 'Login')">Login</button>
                          <button class="tablinks" onclick="openTab(event, 'Register')">Register</button>
                        </div>
                        <div id="Login" class="tabcontent" style="display : block">
                         <form style="margin:0;" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                         @if(session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning')}}
                            </div>
                        @endif
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" placeholder="E-mail" value="{{ old('email') }}" id="email" required autofocus name="email" type="email">
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>Kesalahan Email atau Password tidak cocok</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input  class="form-control" placeholder="Password" value="{{ old('password') }}" id="password" required name="password" type="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                            <div class="col-md-6 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-belizehole btn-md btn-block btn-capital"><i class="fa fa-sign-in"></i> Sign In</button>
                            </div>
                        </form>
                        </div>

                        <div id="Register" class="tabcontent">
                       
                         <form class="" role="form" method="POST" action="{{ route('register') }}">
                             {{ csrf_field() }}
                           <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" placeholder="Username" value="{{ old('username') }}" id="username" name="name" id="username">
                                  @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                           <div class="form-group {{ $errors->has('email-registration') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" placeholder="E-mail" value="{{ old('email-registration') }}" id="email" required autofocus name="email" type="email">
                                 @if ($errors->has('email-registration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email-registration') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <input  class="form-control" placeholder="Password" value="{{ old('password') }}" id="passowrd" name="password"  type="password" required>
                                  @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password_confirmation" type="password" class="form-control" placeholder="Re-Password" required name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-belizehole btn-md btn-block btn-capital"><i class="fa fa-sign-in"></i> Sign Up</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
