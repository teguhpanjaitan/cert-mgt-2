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
        <i class="fa fa-plus"></i> Add New Certificate
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
                    <h3 class="box-title">Certificate Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ url('certificate/add') }}" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="certno" class="col-sm-2 control-label">Certificate Number</label>
                            <div class="col-sm-10">
                                <input class="form-control c_validate" data-valid="cred_reference" id="certno"
                                    name="certno" placeholder="Certificate Number" type="text" required=""
                                    value="{{ old('certno') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dateawarded" class="col-sm-2 control-label">Date of Awarded</label>
                            <div class="col-sm-10">
                                <input class="form-control datemask" id="dateawarded" name="dateawarded"
                                    placeholder="Date Awarded" type="date" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient" class="col-sm-2 control-label">Name of Recipient</label>

                            <div class="col-sm-10">
                                <input class="form-control" id="recipient" name="recipient"
                                    placeholder="Name of Recipient" type="text" required=""
                                    value="{{ old('recipient') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="type" name="type" placeholder="Type"
                                    type="text" required="" value="{{ old('type') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="awarded" class="col-sm-2 control-label">Awarded</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="awarded" name="awarded"
                                    placeholder="Awarded" type="text" required=""
                                    value="{{ old('awarded') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="certified" class="col-sm-2 control-label">Certified</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="certified" name="certified"
                                    placeholder="Certified" type="text" required=""
                                    value="{{ old('certified') }}">
                            </div>
                        </div>
                    </div>
                    @csrf
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('certificate') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" name="save_cert" class="btn btn-info pull-right">Save</button>
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