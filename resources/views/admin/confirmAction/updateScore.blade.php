 @extends('master.adminOneColumn')

@section('title')
Update Scores : {{ $gameInfo->home_team }} vs {{ $gameInfo->away_team }} 
@endsection
@section('content')

      <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">
              @if( $gameInfo->game_status == 'played')
             
                {!! ajax_alert('warning','<b>Re-updating scores will remove all awarded points for this match</b> ') !!}

              @endif
               
              <div class="panel  panel-default">
                <!-- Default panel contents -->
              <div class="panel-heading"><?=$gameInfo->game_status == 'played' ? 'Re-' : '';?>Update Scores : <b>{{ $gameInfo->home_team }}</b> vs <b>{{ $gameInfo->away_team }}</b></div>
              <div class="panel-body">
                <!-- form -->


                <form class="form-horizontal" action="/admin/finalize/update/game/score" method="post">

                  @if($gameInfo->game_status == 'played')
                  
                    <input type="hidden" name="re_update" value="yes"/>
                  @endif

                  <input type="hidden" name="game_id" value="{{ $gameInfo->game_id }}"/>
                  <div class="form-group">
                    <label for="home_score" class="col-sm-5 control-label">{{ $gameInfo->home_team }} (score)</label>
                    <div class="col-sm-7">
                      <select class="form-control" id="home_score" name="home_score">
                        
                        @for($i=0; $i<=10; $i++)
                          
                          <option value="{{ $i }}"> {{ $i }}</option>
                      
                        @endfor
                       
                      </select>  </div>
                  </div>

                  <div class="form-group">
                    <label for="away_score" class="col-sm-5 control-label">{{ $gameInfo->away_team }} (score)</label>
                    <div class="col-sm-7"><select class="form-control" id="away_score" name="away_score">
                      
                        @for($i=0; $i<=10; $i++)
                        
                            <option value="{{ $i }}">{{ $i }}</option>
                     
                        @endfor
                     
                    </select>
                    </div>
                  </div>

                  <div class="form-group ">
                    <div class="col-sm-offset-5 col-sm-7">
                    <a class="btn btn-default"  href="/admin/dashboard" role="button">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>  Back to games
                    </a>
                      <button type="submit" class="btn btn-primary ajax-submit">Submit Scores</button>
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