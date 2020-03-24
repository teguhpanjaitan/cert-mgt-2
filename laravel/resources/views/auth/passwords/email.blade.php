@extends('layouts.singleform')

@section('title', '| Reset password')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>WCI </b>ADMIN</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @error('email')
        <div class="callout callout-danger">
            <h5>{{ $message }}</h5>
        </div>
        @enderror
        <p class="login-box-msg">Forgot Password</p>
        <div id="formlogin">
            <form method="POST" action="{{ route('password.email') }}">
                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="Enter your registered email" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <!-- /.col -->
                <div class="row">
                    <div class="col-xs-8">
                        &nbsp;
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ __('Reset') }}
                        </button>
                    </div>
                </div>
                <!-- /.col -->
                @csrf
            </form>
        </div>
        <a href="{{ url('login') }}">Login</a>
    </div>
</div>
<!-- /.login-box -->
@endsection