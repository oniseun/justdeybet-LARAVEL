 @extends('master.dialogs')

@section('title','Account Permission Settings ')
@section('content')


  <div class="row">
          <br/>
            <div class="col-lg-offset-2 col-lg-8">
              <div class="panel  panel-default">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Account Permission </b></div>
              <div class="panel-body">
                <!-- form -->

                <form class="form-horizontal"  action="/admin/finalize/update/account/permission" method="post">
                    @csrf
                  <input type="hidden" name="account_id" value="{{ $accountInfo->ID }}"/>
                  <h1 class="text-center">{{ $accountInfo->display_name }} <small> {{ $accountInfo->user_type }} </small></h1>
                  <hr/>
                  <div class="form-group">
                    <label for="can_create_tickets" class="col-sm-3 control-label">can_create_tickets</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_create_tickets" name="can_create_tickets">
                          <option value="yes" <?=toggle_select($accountInfo->can_create_tickets,'yes')?>>Yes</option>
                         <option value="no" <?=toggle_select($accountInfo->can_create_tickets,'no')?>>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_add_games" class="col-sm-3 control-label">can_add_games</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_add_games" name="can_add_games">
                          <option value="yes" <?=toggle_select($accountInfo->can_add_games,'yes')?>>Yes</option>
                         <option value="no" <?=toggle_select($accountInfo->can_add_games,'no')?>>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_play_games" class="col-sm-3 control-label">can_play_games</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_play_games" name="can_play_games">
                          <option value="yes" <?=toggle_select($accountInfo->can_play_games,'yes')?>>Yes</option>
                         <option value="no" <?=toggle_select($accountInfo->can_play_games,'no')?>>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_update_scores" class="col-sm-3 control-label">can_update_scores</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_update_scores" name="can_update_scores">
                          <option value="yes" <?=toggle_select($accountInfo->can_update_scores,'yes')?>>Yes</option>
                         <option value="no" <?=toggle_select($accountInfo->can_update_scores,'no')?>>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="can_remove_games" class="col-sm-3 control-label">can_remove_games</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="can_remove_games" name="can_remove_games">
                          <option value="yes" <?=toggle_select($accountInfo->can_remove_games,'yes')?>>Yes</option>
                         <option value="no" <?=toggle_select($accountInfo->can_remove_games,'no')?>>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group ">
                    <div class="col-sm-offset-3 col-sm-9">
                      <a class="btn btn-default" onClick="window.close()" href="#" role="button">Close window</a>
                      <button type="submit" class="btn btn-primary ajax-submit">Update Account Permission</button>

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