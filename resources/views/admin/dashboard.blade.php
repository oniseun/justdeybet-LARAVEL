@extends('master.admin')

@section('title')
 {{ date("D, d-M-Y") }} ( {{ date("h:i A") }} )
@endsection
@section('content')


      @include('components.thumbnail')

                        <br/>
         <!-- Available games -->
      <div class="panel  panel-info">
        <div class="panel-heading"><b>Available Games ({{ number_format($siteInfo->available_games_count) }})</b> </div>
        <div class="panel-body">
          <form action="/admin/games/play" method="post">
          @csrf 
            <table class="table data-table table-bordered">
                
            
            @foreach($availableGames as $game_info)

                <tr>
                <td>
                
                @if($currentUser->can_create_tickets === 'yes' && time() < (strtotime($game_info->match_date) - (15 * 60)) )
                    <input type="checkbox" class="game-check" game-id="game{{ $game_info->game_id }}" name="game_id[]"  value="{{ $game_info->game_id }}">
                @endif
                </td>

                  <th role="row">{{ date("D d/m",strtotime($game_info->match_date)) }}</th>
                  <td class="text-center">{{ ucfirst($game_info->home_team) }} <input type="hidden"  name="game_score[{{ $game_info->game_id }}][home_team]"  value="{{ $game_info->home_team }}"></td>
       
                @if($currentUser->can_create_tickets === 'yes' && time() < (strtotime($game_info->match_date) - (15 * 60)))
                
                <td class="text-center"><? score_drop('game_score['.$game_info->game_id.'][home_score]','game'.$game_info->game_id,'home-select') ?></td>
                <td class="text-center"><? score_drop('game_score['.$game_info->game_id.'][away_score]','game'.$game_info->game_id,'away-select') ?></td>
                @else
                   
                   <td class="text-center" colspan="2"> - </td>
                   @endif
                  <td class="text-center">{{ ucfirst($game_info->away_team) }} <input type="hidden"  name="game_score[{{ $game_info->game_id }}][away_team]"  value="{{ $game_info->away_team }}"></td>
                  <td>  <span class="label label-default">{{ $game_info->played_games }} tickets</span></td>
                    <td>
                 
                    @if((($currentUser->can_remove_games === 'yes' || $currentUser->can_update_scores === 'yes') && $game_info->creator_id === $currentUser->ID)
                      || $currentUser->user_type == 'super_admin' )

                   
                          <!-- Single button -->
                              <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Select Action <span class="caret"></span>
                                </button>
                                  <ul class="dropdown-menu">

                                    @if(($currentUser->can_update_scores === 'yes' && $game_info->creator_id === $currentUser->ID)
                      || $currentUser->user_type == 'super_admin' )
                                    <li><a href="/admin/games/update/scores/{{ $game_info->game_id }}">Update Scores</a></li>
                                    @endif

                                    @if(($currentUser->can_remove_games === 'yes' && $game_info->creator_id === $currentUser->ID)
                      || $currentUser->user_type == 'super_admin' )
                                    <li><a href="/admin/games/remove/{{ $game_info->game_id }}">Remove Game</a></li>
                                    @endif

                                  </ul>
                              </div>
                        @endif
                     </td>
                </tr>
            
          @endforeach
            
        </table>
        <p class="text-center button-wrap">
          <button class="btn btn-success btn-lg "> Submit selected matches </button>
        </p>
      </form>

      </div>
      </div>

        <hr/>

        <!-- Played Games -->

      <div class="panel  panel-default">
        <div class="panel-heading"><b>Played Games ({{ number_format($siteInfo->played_games_count) }})</b> </div>
        <div class="panel-body">
            <table class="table data-table table-bordered">
            
            @foreach($playedGames as $game_info)
            
                <tr >
                  <td><span style="color:seagreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></td>
                  <th role="row">{{ date("D d/m",strtotime($game_info->match_date)) }}</th>
                  <td class="text-center"> {{ ucfirst($game_info->home_team) }}</td>
                  <td class="text-center text-bold">{{ $game_info->home_score }} - {{ $game_info->away_score }}</td>
                  <td class="text-center">{{ ucfirst($game_info->away_team) }}</td>
                  <td><span class="label label-default">{{ $game_info->played_games }} tickets</span></td>
                  <td>
                  
                    @if((($currentUser->can_remove_games === 'yes' || $currentUser->can_update_scores === 'yes') || $game_info->creator_id === $currentUser->ID)
                      || $currentUser->user_type == 'super_admin'  )


                          <!-- Single button -->
                              <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Select Action <span class="caret"></span>
                                </button>
                                  <ul class="dropdown-menu">
                                    
                                      @if(($currentUser->can_update_scores === 'yes' && $game_info->creator_id === $currentUser->ID)
                      || $currentUser->user_type == 'super_admin' )

                                    <li><a href="/admin/games/update/scores/{{ $game_info->game_id }}">Re-Update Scores</a></li>
                                    @endif

                                      @if(($currentUser->can_remove_games === 'yes' && $game_info->creator_id === $currentUser->ID)
                      || $currentUser->user_type == 'super_admin' )

                                    <li><a href="/admin/games/remove/{{ $game_info->game_id }}">Remove Game</a></li>
                                    @endif
                                    
                                  </ul>
                              </div>
                    @endif
                     </td>
                </tr>
            
          @endforeach
        </table>

      </div>
      </div>
@endsection

     @section('scripts')
   <script>
                        function button_enabler(tick_count)
                        {
                                if(tick_count >= 3 )
                                {
                                    $(".button-wrap").show();
                                }
                                else
                                {
                                    $(".button-wrap").hide();
                                }
                        }

                        $(function(){

                        $(".button-wrap").hide();

                        $(".home-select").change(function()
                        {

                            var id = $(this).attr('id');
                            var home_value = $(this).find(':selected').val();
                            var away_value = $('.away-select[id='+id+']').find(':selected').val();
                            if(home_value != ''  && away_value != '' )
                            {
                                $('.game-check[game-id='+id+']').attr('checked', true);
                                button_enabler($('.game-check:checked').length);
                            }

                        });

                        $(".away-select").change(function() {


                            var id = $(this).attr('id');
                            var away_value = $(this).find(':selected').val();
                            var home_value = $('.away-select[id='+id+']').find(':selected').val();
                            if(home_value != ''  && away_value != '' )
                            {
                                $('.game-check[game-id='+id+']').attr('checked', true);

                                button_enabler($('.game-check:checked').length);
                            }

                        });


                        });
            </script>
     @endsection
