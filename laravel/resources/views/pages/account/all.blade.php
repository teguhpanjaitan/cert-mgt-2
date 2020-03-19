@extends('layouts.default')

@section('title', '| Account')

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
        Manage Accounts
    </h1>
    <div class="breadcrumb">
        <a href="{{ url('account/add') }}" class="btn btn-block btn-primary"><i class="fa fa-user"></i> New Account</a><br>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> All Accounts</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>User Role</th>
                                <th>Login Id</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Remarks</th>
                                @if ($role === "admin")
                                <th style="min-width:90px">Edit</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->id }}</td>
                                <td>{{ $account->user_role }}</td>
                                <td>{{ $account->login_id }}</td>
                                <td>{{ $account->email }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->remarks }}</td>
                                @if ($role === "admin")
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editmodel"
                                        data-userid="{{ $account->id }}" data-title="Edit Account">
                                        <i class='fa fa-pencil' aria-hidden='true' style="padding:0px 10px 0px 10px">
                                        </i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#deletemodel"
                                        data-userid="{{ $account->id }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-title="{{ $account->locked }}"
                                        data-target="#lockmodel" data-userid="{{ $account->id }}">
                                        @if ($account->locked === 1)
                                        <i class="fa fa-unlock-alt" aria-hidden="true"
                                            style="padding:0px 10px 0px 10px"></i>
                                        @else
                                        <i class="fa fa-lock" aria-hidden="true" style="padding:0px 10px 0px 10px"></i>
                                        @endif
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>User Id</th>
                                <th>User Role</th>
                                <th>Login Id</th>
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Remarks</th>
                                @if ($role === "admin")
                                <th>Edit</th>
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
                <h4 class="modal-title">Edit Account</h4>
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

<div class="modal fade" tabindex="-1" role="dialog" id="lockmodel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you want to lock this user?</h4>
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
</div>
@endsection

@section('additional_foot')
<script>
    $('#table').DataTable();

    $('#editmodel').on('show.bs.modal', function(event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // Button that triggered the modal
        var userid = button.data('userid');
        $.ajax({
            type: "GET",
            cache: false,
            url: "account/edit/" + userid,
            success: function(resp) {
                modal.find('.modal-body').html(resp);
            }
        });
    });

    $('#editmodel').on('hide.bs.modal', function(event) {
        var modal = $(this);
        modal.find('.modal-body').html("<p>Loding content &hellip;</p>");
        modal.find('.modal-title').text("");

    });

    $('#deletemodel').on('show.bs.modal', function(event) {
        var modal = $(this);
        var button = $(event.relatedTarget);
        var userid = button.data('userid');
        modal.find('.modal-body #confirm-link').attr('href', 'account/delete/' + userid);
    });

    $('#lockmodel').on('show.bs.modal', function(event) {
        var modal = $(this);
        var button = $(event.relatedTarget);
        var userid = button.data('userid');
        var ttile = button.data('title');
        if (ttile == 0) {
            ttile = "Are you sure you want to lock this user?"
            modal.find('.modal-body #confirm-link').attr('href', 'account/lock/' + userid + '/1');
        } else {
            ttile = "Are you sure you want to unlock this user?"
            modal.find('.modal-body #confirm-link').attr('href', 'account/lock/' + userid + '/0');
        }
        modal.find('.modal-title').text(ttile);


    });
</script>
<style>
    #table_filter {
        text-align: right;
    }
</style>
@endsection