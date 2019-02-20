 @extends('master.dialogs')

@section('title','Change Account Password ')
@section('content')
 <div class="row">
          <br/>
            <div class="col-lg-offset-2 col-lg-8">
              <div class="panel  panel-default">
                <!-- Default panel contents -->
              <div class="panel-heading">Change Password:<b> {{ $accountInfo->display_name }} </b> ({{ $accountInfo->user_type }})</div>
              <div class="panel-body">
                <!-- form -->

                <form class="form-horizontal"  action="/admin/finalize/update/account/password" method="post">
                  @csrf
                  <input type="hidden" name="account_id" value="{{ $accountInfo->ID }}"/>
                  <div class="form-group " >
                    <label for="new_password" class="col-sm-4 control-label">New Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control " for="new_password" name="new_password" placeholder="Enter new Password..">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="confirm_password" class="col-sm-4 control-label">Re-enter New Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control " for="confirm_password" name="confirm_password" placeholder="Re-enter new Password..">
                    </div>
                  </div>

                  <div class="form-group ">
                    <div class="col-sm-offset-4 col-sm-8">
                      <a class="btn btn-default" onClick="window.close()" href="#" role="button">Close window</a>
                      <button type="submit" class="btn btn-success ajax-submit">Change Account Password</button>
                    </div>
                  </div>

                </form>




                </form>

            </div>
          </div>
        </div>
              <br/>

         </div>
    </div>
@endsection