 
 @extends('master.admin')

@section('title','Change Password ')
@section('content')

      <div class="jumbotron">
                 <h1>Change Password</h1>
                  <p>In this section , you can change your password to a stronger one.</p>
                  <p>
                    <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to dashboard
                    </a>
                    <a class="btn btn-primary btn-lg" href="/admin/my/info" role="button">Update profile</a>
                  </p>
              </div>

              <!-- form -->
              <hr/>
              <br/>
             
              <!-- form -->

               <form class="form-horizontal" action="/admin/finalize/update/my/password" method="post">
                @csrf

                <!-- <div class="form-group form-group-lg">
                  <label for="current_password" class="col-sm-4 control-label">Current password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control input-lg" for="current_password" name="current_password" placeholder="Enter current Password..">
                  </div>
                </div> -->

                <div class="form-group form-group-lg" >
                  <label for="new_password" class="col-sm-4 control-label">New Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control input-lg" for="new_password" name="new_password" placeholder="Enter new Password..">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="confirm_password" class="col-sm-4 control-label">Re-enter New Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control input-lg" for="confirm_password" name="confirm_password" placeholder="Re-enter new Password..">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-success btn-lg ajax-submit">Change Password</button>
                  </div>
                </div>

              </form>

              <br/>
     @endsection