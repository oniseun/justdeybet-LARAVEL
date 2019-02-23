 @extends('master.adminOneColumn')

@section('title')
Remove Game : {{ $gameInfo->home_team }} vs {{ $gameInfo->away_team }} 
@endsection
@section('content')

     <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">

              <div class="panel  panel-warning">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Are you sure you want to remove this game ? </b></div>
                <div class="panel-body">

                  <form class="text-center"  action="admin/finalize/remove/game" method="post">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $gameInfo->game_id }}"/>
                    <p>
                      <h3><b> {{ $gameInfo->home_team }} </b> vs <b> {{ $gameInfo->away_team }} </b></h3><hr/>
                       If you remove this game , all related/linked information chain including tickets ,
                       activities and winnings will be removed from the system.
                    </p>


                     <p><br/>
                       <a class="btn btn-default " href="/admin/dashboard" role="button">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to games
                       </a>
                         <button class="btn btn-danger" role="button">Remove game</button>

                   </p>
                </form>

                </div>
              </div>

            </div>
          </div>

 @endsection