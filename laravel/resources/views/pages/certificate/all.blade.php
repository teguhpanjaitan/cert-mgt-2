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
        Academic Certificates
    </h1>
    <div class="breadcrumb">
        <a href="certificate/add" class="btn btn-block btn-primary"><i class="fa fa-th"></i> New Certificate</a><br>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> All Certificates</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Credential Reference</th>
                                <th>Date of Award</th>
                                <th>Name Recipient</th>
                                <th>Name of Award</th>
                                <th>Nature of Award</th>
                                @if ($role === "admin")
                                <th style="min-width:65px">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificates as $certificate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $certificate->cred_reference }}</td>
                                <td>{{ \Carbon\Carbon::parse($certificate->awarded_date)->format('d-M-Y')}}</td>
                                <td>{{ $certificate->recipient }}</td>
                                <td>{{ $certificate->name_of_award }}</td>
                                <td>{{ $certificate->nature_of_award }}</td>
                                @if ($role === "admin")
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editmodel"
                                        data-certid="{{ $certificate->id }}" data-title="Edit Certificate">
                                        <i class='fa fa-pencil' aria-hidden='true' style="padding:0px 5px 0px 5px"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#deletemodel"
                                        data-certid="{{ $certificate->id }}">
                                        <i class="fa fa-trash-o" aria-hidden="true" style="padding:0px 5px 0px 5px"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial No</th>
                                <th>Credential Reference</th>
                                <th>Date of Award</th>
                                <th>Name Recipient</th>
                                <th>Name of Award</th>
                                <th>Nature of Award</th>
                                @if ($role === "admin")
                                <th>Action</th>
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->

<!-- /modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editmodel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Certificate</h4>
            </div>
            <div class="modal-body">
                <p>Loding content &hellip;</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./modal -->

<!-- /modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="deletemodel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you want to Delete?</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6">
                        <center>
                            <a class="btn btn-danger" id="confirm-link" href="#">
                                Yes
                            </a>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>
                            <a class="btn btn-info" href="#" data-dismiss="modal">
                                No
                            </a>
                        </center>
                    </div>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ./modal -->
@endsection

@section('additional_foot')
<script>
    $('#table').DataTable();

    $('#editmodel').on('show.bs.modal', function(event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('title'); // Extract info from data-* attributes
        var cert_id = button.data('certid');
        $.ajax({
            type: "GET",
            cache: false,
            url: "certificate/edit/" + cert_id,
            success: function(resp) {
                modal.find('.modal-body').html(resp);
            }
        });

        modal.find('.modal-title').text(recipient);

    });

    $('#editmodel').on('hide.bs.modal', function(event) {
        var modal = $(this);
        modal.find('.modal-body').html("<p>Loding content &hellip;</p>");
        modal.find('.modal-title').text("");

    });

    $('#deletemodel').on('show.bs.modal', function(event) {
        var modal = $(this);
        var button = $(event.relatedTarget);
        var cert_id = button.data('certid');
        modal.find('.modal-body #confirm-link').attr('href', 'certificate/delete/' + cert_id);
    });
</script>
<style>
    #table_filter {
        text-align: right;
    }
</style>
@endsection