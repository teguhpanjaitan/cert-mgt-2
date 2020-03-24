@extends('layouts.singleform')

@section('title', 'Forget Password')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>WCI </b>ADMIN</a>
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
        <p class="login-box-msg">Forgot Password</p>
        <div id="formlogin">
            <form action="forgot-password" method="post">
                <div class="form-group has-feedback">
                    <input class="form-control" type="email" name="reg_email" placeholder="Enter your registered email"
                        required="">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <!-- /.col -->
                <div class="row">
                    <div class="col-xs-8">
                        &nbsp;
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="loginreq" class="btn btn-primary btn-block btn-flat">Reset</button>
                    </div>
                </div>
                <!-- /.col -->
                @csrf
            </form>
        </div>
        <a href="/login">Login</a>
    </div>
</div>
</div>
<!-- /.login-box -->
@endsection