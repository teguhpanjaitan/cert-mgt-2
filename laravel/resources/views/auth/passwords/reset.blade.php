@extends('layouts.singleform')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>SIPMM </b>ADMIN</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @if($errors->any())
        <div class="callout callout-danger">
            @foreach ($errors->all() as $error)
            <h5>{{$error}}</h5>
            @endforeach
        </div>
        @endif
        <p class="login-box-msg">Reset Password</p>
        <div id="formlogin">
            <form method="POST" action="{{ route('password.update') }}">
                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                        placeholder="Enter your registered email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Enter your new password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm your new password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
                <input type="hidden" name="token" value="{{ $token }}">
                @csrf
            </form>
        </div>
        <a href="/login">Login</a>
    </div>
</div>
@endsection