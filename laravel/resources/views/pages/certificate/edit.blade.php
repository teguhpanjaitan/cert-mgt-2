<form class="form-horizontal" action="{{ url('/certificate/update') }}" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="certno" class="col-sm-2 control-label">Certificate Number</label>
            <div class="col-sm-10">
                <input class="form-control c_validate" data-valid="cred_reference" id="certno" name="certno"
                    placeholder="Certificate Number" type="text" required="" value="{{ $certificate->number  }}">
            </div>
        </div>
        <div class="form-group">
            <label for="dateawarded" class="col-sm-2 control-label">Date of Awarded</label>
            <div class="col-sm-10">
                <input class="form-control datemask" id="dateawarded" name="dateawarded" placeholder="Date Awarded"
                    type="date" required="" value="{{ $certificate->date }}">
            </div>
        </div>
        <div class="form-group">
            <label for="recipient" class="col-sm-2 control-label">Name of Recipient</label>

            <div class="col-sm-10">
                <input class="form-control" id="recipient" name="recipient" placeholder="Name of Recipient" type="text"
                    required="" value="{{ $certificate->name  }}">
            </div>
        </div>
        <div class="form-group">
            <label for="type" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-10">
                <input class="form-control" id="type" name="type" placeholder="Type" type="text" required=""
                    value="{{ $certificate->type }}">
            </div>
        </div>
        <div class="form-group">
            <label for="awarded" class="col-sm-2 control-label">Awarded</label>
            <div class="col-sm-10">
                <input class="form-control" id="awarded" name="awarded" placeholder="Awarded" type="text" required=""
                    value="{{ $certificate->awarded }}">
            </div>
        </div>
        <div class="form-group">
            <label for="certified" class="col-sm-2 control-label">Certified</label>
            <div class="col-sm-10">
                <input class="form-control" id="certified" name="certified" placeholder="Certified" type="text"
                    required="" value="{{ $certificate->certified }}">
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $certificate->id }}" />
    @csrf
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="update_cert" class="btn btn-info pull-right">Update</button>
    </div>
    <!-- /.box-footer -->
    <!-- /.box-footer -->
    <div class="form-group">
        <div class="col-sm-12">
            <label class=" control-label" style="float:right"><b>Last Updated By</b>: @if(isset($user->name))
                {{$user->name}} @else {{""}} @endif at
                {{ \Carbon\Carbon::parse($certificate->updated_at)->format('d-M-Y h:i:s A')}}</label>
        </div>
    </div>
</form>