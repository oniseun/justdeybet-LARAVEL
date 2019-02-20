 
 @extends('master.admin')

@section('title','Update Profile ')
@section('content')

      <div class="jumbotron">
                  <h1>Edit profile</h1>
                  <p>In this section , you can edit your basic profile information such as email, phone number and etc</p>
                  <p>
                    <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to dashboard
                    </a>
                    <a class="btn btn-primary btn-lg" href="/admin/my/password" role="button">Change Password</a>
                  </p>
              </div>

              <!-- form -->
              <hr/>
              <br/>
             
              <!-- form -->

              <form class="form-horizontal"  action="/admin/finalize/update/my/info" method="post">
                @csrf
                <div class="form-group form-group-lg">
                  <label for="username" class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="username" name="username" value="{{ $adminInfo->username }}" placeholder="Enter username here...">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="display_name" class="col-sm-3 control-label">Display Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="display_name" name="display_name" value="{{ $adminInfo->display_name }}" placeholder="Enter display name here...">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" value="{{ $adminInfo->email }}" class="form-control input-lg" id="email" placeholder="Enter email here...">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="shop_name" class="col-sm-3 control-label">Shop name</label>
                  <div class="col-sm-9">
                    <input type="text" name="shop_name" value="{{ $adminInfo->shop_name }}" class="form-control input-lg" id="shop_name" placeholder="Enter shop name here...">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="gender" class="col-sm-3 control-label">Gender</label>
                  <div class="col-sm-9">
                    <select class="form-control input-lg" id="gender" name="gender">
                      <option value="male" <?=$adminInfo->gender === 'male' ? 'selected="selected"' : ''?>>Male</option>
                     <option value="female" <?=$adminInfo->gender === 'female' ? 'selected="selected"' : ''?>>Female</option>

                    </select>
                  </div>
                </div>


                <div class="form-group form-group-lg">
                  <label for="about" class="col-sm-3 control-label">About you</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="about" rows="4">{{ $adminInfo->about }}</textarea>
                  </div>
                </div>


                <div class="form-group form-group-lg">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary btn-lg ajax-submit">Update Details</button>
                  </div>
                </div>

              </form>
             

              <br/>
     @endsection