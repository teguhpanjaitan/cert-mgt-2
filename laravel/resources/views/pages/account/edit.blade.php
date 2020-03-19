<form class="form-horizontal" action="account/update" method="post" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label for="userrole" class="col-sm-2 control-label">User Role</label>
            <div class="col-sm-10">
                <select class="form-control" required="required" name="role">
                    <option value="">Select Role</option>
                    @if ($user->user_role === "admin")
                    <option value="admin" selected>Administrator</option>
                    <option value="user">User</option>
                    @elseif ($user->user_role === "user")
                    <option value="admin">Administrator</option>
                    <option value="user" selected>User</option>
                    @else
                    <option value="admin">Administrator</option>
                    <option value="user">User</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="loginid" class="col-sm-2 control-label">Login ID</label>
            <div class="col-sm-10">
                <input class="form-control c_validate" data-valid="login_id" id="loginid" name="login_id"
                    placeholder="Login ID" type="text" required="required" value="{{$user->login_id}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
                <input class="form-control" id="inputPassword3" name="inputPassword3" placeholder="Password"
                    type="password">
            </div>
        </div>
        <div class="form-group">
            <label for="fullname" class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-10">
                <input class="form-control" id="fullname" name="fullname" placeholder="Full Name" type="text"
                    required="required" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
                <input class="form-control c_validate" data-valid="email" id="inputEmail3" name="inputEmail3"
                    placeholder="Email" type="email" required="required" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group">
            <label for="remarks" class="col-sm-2 control-label">Remarks</label>

            <div class="col-sm-10">
                <textarea name="remarks" id="remarks" class="form-control" rows="3" placeholder="Enter ..."
                    style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none 0s ease 0s ;">{{$user->remarks}}</textarea>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{$user->id}}" />
    @csrf
    <!-- /.box-body -->
    <div class="box-footer">
        <a href="/account" class="btn btn-default">Cancel</a>
        <button type="submit" name="save_account" class="btn btn-info pull-right">Save</button>
    </div>
    <!-- /.box-footer -->
    <div class="form-group">
        <div class="col-sm-12">
            <label class=" control-label" style="float:right"><b>Last Updated By</b>: @if(isset($updatedBy->name))
                {{$updatedBy->name}} @else {{""}} @endif at
                {{ \Carbon\Carbon::parse($user->updated_at)->format('d-M-Y h:i:s A')}}</label>
        </div>
    </div>
</form>