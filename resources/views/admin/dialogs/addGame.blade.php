 @extends('master.dialogs')

@section('title','Add Game ')
@section('content')

<div class="row">
          <br/>
            <div class="col-lg-offset-2 col-lg-8">
              <div class="panel  panel-default">
                <!-- Default panel contents -->
              <div class="panel-heading"><b>Add Games </b></div>
              <div class="panel-body">
                <!-- form -->

                <form class="form-horizontal" class="reset-on-success" action="/admin/finalize/add/game" method="post">
                    @csrf

                  <div class="form-group">
                    <label for="home_team" class="col-sm-3 control-label">Home team</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="home_team" name="home_team" placeholder="Enter home team or first team here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="away_team" class="col-sm-3 control-label">Away team</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="away_team" name="away_team"  placeholder="Enter Away team here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="match_date" class="col-sm-3 control-label datetime-picker">Match date</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="match_date" name="match_date"  placeholder="Enter Match date here...">
                    </div>
                  </div>

                  <div class="form-group ">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="submit" class="btn btn-primary ajax-submit">Submit Game</button>
                      <a class="btn btn-default" onClick="window.close()" href="#" role="button">Close</a>
                    </div>
                  </div>

<hr/>

<h4>Additional information...<small> **not required</small></h4><br/>
                  <div class="form-group">
                    <label for="league" class="col-sm-3 control-label">league</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="league" name="league"  placeholder="Enter league here...">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="match_stage" class="col-sm-3 control-label">match stage</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="match_stage" name="match_stage"  placeholder="Enter match stage here...">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="season" class="col-sm-3 control-label">Season</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="season" name="season"  placeholder="Enter season here...">
                    </div>
                  </div>

                    <div class="form-group">
                      <label for="match_venue" class="col-sm-3 control-label">Match venue</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="match_venue" name="match_venue"  placeholder="Enter match venue here...">
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