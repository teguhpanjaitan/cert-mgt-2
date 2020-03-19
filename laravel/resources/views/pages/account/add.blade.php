@extends('layouts.default')

@section('title', '| Certificates')

@section('content')

@if($errors->any())
<div class="callout callout-danger">
    @foreach ($errors->all() as $error)
    <h4>{{$error}}</h4>
    @endforeach
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-plus"></i> Add New Account
    </h1>
    <div class="breadcrumb"></div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Account Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="account/add" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="userrole" class="col-sm-2 control-label">User Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" required="required" name="role">
                                    <option value="">Select Role</option>
                                    <option value="admin">Administrator</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="loginid" class="col-sm-2 control-label">Login ID</label>
                            <div class="col-sm-10">
                                <input class="form-control c_validate" data-valid="login_id" id="loginid"
                                    name="login_id" placeholder="Login ID" type="text" required="required"
                                    value="{{ old('login_id') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input class="form-control" id="inputPassword3" name="inputPassword3"
                                    placeholder="Password" type="password" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fullname" class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="fullname" name="fullname" placeholder="Full Name"
                                    type="text" required="required" value="{{ old('fullname') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input class="form-control c_validate" data-valid="email" id="inputEmail3"
                                    name="inputEmail3" placeholder="Email" type="email" required="required"
                                    value="{{ old('inputEmail3') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remarks" class="col-sm-2 control-label">Remarks</label>

                            <div class="col-sm-10">
                                <textarea name="remarks" id="remarks" class="form-control" rows="3"
                                    placeholder="Enter ..."
                                    style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none 0s ease 0s ;">{{ old('remarks') }}</textarea>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="account" class="btn btn-default">Cancel</a>
                        <button type="submit" name="save_account" class="btn btn-info pull-right">Save</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>

            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection