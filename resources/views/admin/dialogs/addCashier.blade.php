 @extends('master.dialogs')

@section('title','Add Cashier ')
@section('content')

<div class="row">
          <br/>
            <div class="col-lg-offset-2 col-lg-8">
              <div class="panel  panel-default">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Add Cashier </b></div>
              <div class="panel-body">
                <!-- form -->

                <form class="form-horizontal" class="reset-on-success" action="/admin/finalize/add/cashier" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="display_name" class="col-sm-3 control-label">Display Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="display_name" name="display_name"  placeholder="Enter display name here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="shop_name" class="col-sm-3 control-label">Shop Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="shop_name" name="shop_name"  placeholder="Enter display name here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="gender" name="gender">
                          <option value="male">Male</option>
                         <option value="female">Female</option>
                      </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="about" class="col-sm-3 control-label">About you</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="about" rows="4"></textarea>
                    </div>
                  </div>

                  <hr/>
                  <h3> Cashier Permissions <small>default selected</small></h3><br/>
                  <div class="form-group">
                    <label for="can_create_tickets" class="col-sm-3 control-label">can_create_tickets</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_create_tickets" name="can_create_tickets">
                          <option value="yes">Yes</option>
                         <option value="no">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_add_games" class="col-sm-3 control-label">can_add_games</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_add_games" name="can_add_games">
                          <option value="yes">Yes</option>
                         <option value="no">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_play_games" class="col-sm-3 control-label">can_play_games</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_play_games" name="can_play_games">
                          <option value="yes">Yes</option>
                         <option value="no">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_update_scores" class="col-sm-3 control-label">can_update_scores</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_update_scores" name="can_update_scores">
                          <option value="yes">Yes</option>
                         <option value="no" selected="selected">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_remove_games" class="col-sm-3 control-label">can_remove_games</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_remove_games" name="can_remove_games">
                          <option value="yes">Yes</option>
                         <option value="no" selected="selected">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group ">
                    <div class="col-sm-offset-3 col-sm-9">
                      <a class="btn btn-default" onClick="window.close()" href="#" role="button">Close WIndow</a>
                      <button type="submit" class="btn btn-primary ajax-submit">Submit Cashier</button>
                    </div>
                  </div>

                </form>

            </div>
          </div>
        </div>
              <br/>

         </div>
    </div>

@endsection