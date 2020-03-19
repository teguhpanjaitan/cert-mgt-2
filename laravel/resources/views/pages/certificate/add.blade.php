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
                <form class="form-horizontal" action="certificate/add" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="certno" class="col-sm-2 control-label">Credential Reference</label>
                            <div class="col-sm-10">
                                <input class="form-control c_validate" data-valid="cred_reference" id="certno"
                                    name="certno" placeholder="Credential Reference" type="text" required=""
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
                            <label for="awardname" class="col-sm-2 control-label">Name of Award</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="awardname" name="awardname" placeholder="Name of Award"
                                    type="text" required="" value="{{ old('awardname') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="natureofaward" class="col-sm-2 control-label">Nature of Award</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="natureofaward" name="natureofaward"
                                    placeholder="Nature of Award" type="text" required=""
                                    value="{{ old('natureofaward') }}">
                            </div>
                        </div>
                    </div>
                    @csrf
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="certificate" class="btn btn-default">Cancel</a>
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