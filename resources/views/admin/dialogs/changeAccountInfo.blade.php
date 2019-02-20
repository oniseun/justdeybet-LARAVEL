 @extends('master.dialogs')

@section('title','Change Account Info ')
@section('content')
 <div class="row">
          <br/>
            <div class="col-lg-offset-2 col-lg-8">
              <div class="panel  panel-default">
                <!-- Default panel contents -->
              <div class="panel-heading">Edit User Account info : <b> {{ $accountInfo->display_name }} </b> ({{ $accountInfo->user_type }})</div>
              <div class="panel-body">
                <!-- form -->

                <form class="form-horizontal"  action="/admin/finalize/update/account/info" method="post">
                    @csrf
                  <input type="hidden" name="account_id" value="{{ $accountInfo->ID }}"/>
                  <div class="form-group ">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control " id="username" name="username" value="{{ $accountInfo->username }}" placeholder="Enter username here...">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="display_name" class="col-sm-3 control-label">Display Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control " id="display_name" name="display_name" value="{{ $accountInfo->display_name }}"  placeholder="Enter display name here...">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="email" class="form-control " id="email" value="{{ $accountInfo->email }}" placeholder="Enter email here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="shop_name" class="col-sm-3 control-label">Shop name</label>
                    <div class="col-sm-9">
                      <input type="text" name="shop_name" value="{{ $accountInfo->shop_name }}" class="form-control input-lg" id="shop_name" placeholder="Enter shop name here...">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                      <select class="form-control " id="gender" name="gender">
                          <option value="male" <?=$accountInfo->gender === 'male' ? 'selected="selected"' : ''?>>Male</option>
                         <option value="female" <?=$accountInfo->gender === 'female' ? 'selected="selected"' : ''?>>Female</option>
                      </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="about" class="col-sm-3 control-label">About you</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="about" rows="4">{{ $accountInfo->about }}</textarea>
                    </div>
                  </div>


                  <div class="form-group ">
                    <div class="col-sm-offset-3 col-sm-9">
                      <a class="btn btn-default" onClick="window.close()" href="#" role="button">Close window</a>
                      <button type="submit" class="btn btn-primary ajax-submit">Update Details</button>
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