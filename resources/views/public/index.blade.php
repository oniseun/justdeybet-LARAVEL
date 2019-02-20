@extends('master.public')    

@section('title','Home')
    
@section('content')


@include('components.public.thumbnail')
                  <br/>

                    <!-- Available games -->
  <div class="panel  panel-info">
        <div class="panel-heading"><b>Available Games ({{ number_format($siteInfo->available_games_count) }})</b> </div>
        <div class="panel-body">

            <table class="table data-table table-bordered">
            
            @foreach($availableGames as $game_info)
            
                <tr>
                  <th role="row">{{ date("D d/m",strtotime($game_info->match_date)) }}</th>
                  <td class="text-center">{{ ucfirst($game_info->home_team) }}</td>
                  <td class="text-center">v</td>
                  <td class="text-center">{{ ucfirst($game_info->away_team) }}</td>
                  <td>  <span class="label label-default">{{ $game_info->played_games }} tickets</span></td>

                </tr>            
            @endforeach
            
        </table>

      </div>
      </div>

        <hr/>

        <!-- Played Games -->

      <div class="panel  panel-default">
        <div class="panel-heading"><b>Played Games ({{ number_format($siteInfo->played_games_count) }})</b> </div>
        <div class="panel-body">
            <table class="table data-table table-bordered">
            
            @foreach($playedGames as $game_info)
            
                <tr>
                  <td><span style="color:seagreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></td>
                  <th role="row">{{ date("D d/m",strtotime($game_info->match_date)) }}</th>
                  <td class="text-center">{{ ucfirst($game_info->home_team) }}</td>
                  <td class="text-center text-bold">{{ $game_info->home_score }} - {{ $game_info->away_score }}</td>
                  <td class="text-center">{{ ucfirst($game_info->away_team) }}</td>
                  <td><span class="label label-default">{{ $game_info->played_games }} tickets</span></td>

                </tr>
            
            @endforeach
            
        </table>

      </div>
      </div>

@endsection