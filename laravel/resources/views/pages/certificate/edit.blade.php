<form class="form-horizontal" action="/certificate/update" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="certno" class="col-sm-2 control-label">Credential Reference</label>
            <div class="col-sm-10">
                <input class="form-control c_validate" data-valid="cred_reference" id="certno" name="certno"
                    placeholder="Credential Reference" type="text" required=""
                    value="{{ $certificate->cred_reference }}">
            </div>
        </div>
        <div class="form-group">
            <label for="dateawarded" class="col-sm-2 control-label">Date of Awarded</label>
            <div class="col-sm-10">
                <input class="form-control datemask" id="dateawarded" name="dateawarded" placeholder="Date Awarded"
                    type="date" required="" value="{{ $certificate->awarded_date }}">
            </div>
        </div>
        <div class="form-group">
            <label for="recipient" class="col-sm-2 control-label">Name of Recipient</label>

            <div class="col-sm-10">
                <input class="form-control" id="recipient" name="recipient" placeholder="Name of Recipient" type="text"
                    required="" value="{{ $certificate->recipient }}">
            </div>
        </div>
        <div class="form-group">
            <label for="awardname" class="col-sm-2 control-label">Name of Award</label>
            <div class="col-sm-10">
                <input class="form-control" id="awardname" name="awardname" placeholder="Name of Award" type="text"
                    required="" value="{{ $certificate->name_of_award }}">
            </div>
        </div>
        <div class="form-group">
            <label for="natureofaward" class="col-sm-2 control-label">Nature of Award</label>
            <div class="col-sm-10">
                <input class="form-control" id="natureofaward" name="natureofaward" placeholder="Nature of Award"
                    type="text" required="" value="{{ $certificate->nature_of_award }}">
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