@extends('layouts.default')

@section('title', '| Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        WCI Administration Portal
    </h1>
    <div class="breadcrumb"></div>

</section>
<!-- Main content -->
<section class="content">

    <div class="row">

        <!-- ./col -->

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <p>Users </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ url('account') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $certCount }}</h3>
                    <p>Certificates</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ url('certificate') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    </div>
    <!-- /.col -->

    <!-- /.row -->
</section>
<!-- /.content -->
@endsection