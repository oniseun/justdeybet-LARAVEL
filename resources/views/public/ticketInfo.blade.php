<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="no-referrer" />
<meta name="robots" content="noindex,nofollow" />
<title> Betting Site - Ticket Info  </title>

@include('components.public.cssList')
<style>

</style>
</head>
<body class="">
@include('components.public.header')
<div class="container">
  <div class="row">
    <br/>
          <!-- content column -->
          <div class="col-lg-8 col-md-offset-2">

            <div class="jumbotron text-center">
            <h2>Ticket Info</h2>
            <h1>{{ $ticketInfo->ticket_id }}</h1>
            <p>S/N: {{ $ticketInfo->serial_number }}</p>
            </div>
            <!-- other ticket info-->
            <div class="panel  panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Other ticket info</div>

                    <table class="table data-table">

                    <tbody>
                      <tr>
                        <th role="row">Date Created</th>
                        <td>{{ $ticketInfo->date_created }}</td>
                      </tr>
                        <tr>
                          <th role="row">Max Usage</th>
                          <td>{{ $ticketInfo->max_usage }} </td>
                        </tr>
                        <tr>
                          <th role="row">Games played</th>
                          <td>{{ $ticketInfo->usage_count }} </td>
                        </tr>
                        <tr>
                          <th role="row">Amount Staked</th>
                          <td>N {{ number_format($ticketInfo->amount) }} </td>
                        </tr>
                        <tr>
                          <th role="row">Ticket status </th>
                          <td>

                            @if($ticketInfo->paid_out == 'no' && $ticketInfo->cancelled == 'no' )
                             <span class="label label-info">Used</span>
                            @endif
                            
                            @if( $ticketInfo->cancelled == 'yes')
                            <span class="label label-danger">Canceled</span>
                            @endif

                            @if($ticketInfo->paid_out == 'yes' && $ticketInfo->cancelled == 'no' )
                            <span class="label label-success">
                              Paid Out <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
                            </span>
                           @endif
                          </td>
                        </tr>
                    </tbody>
                </table>
              </div>
                <!-- registration info -->
            <div class="panel  panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Registeration info </div>

                    <table class="table data-table">

                    <tbody>
                        <tr>
                          <th role="row">Full name</th>
                          <td>{{ $ticketInfo->full_name }}</td>
                        </tr>
                        <tr>
                          <th role="row">Phone No</th>
                          <td>{{ $ticketInfo->phone }}</td>
                        </tr>
                        <tr>
                          <th role="row">Phone No (2)</th>
                          <td>{{ $ticketInfo->phone2 }}</td>
                        </tr>
                        <tr>
                          <th role="row">Email address</th>
                          <td>{{ $ticketInfo->email }}</td>
                        </tr>
                        <tr>
                          <th role="row">Other info</th>
                          <td>{{ $ticketInfo->address }}</td>
                        </tr>
                    </tbody>
                </table>
              </div>


              <div class="panel  panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Games played ({{ $ticketInfo->games_played }}) </div>
                <table class="table data-table table-bordered">
                
                @foreach($ticketGames as $game_info)
                <?php
                  $label = 'danger';
                  if($game_info->points_won > 0 && $game_info->points_won <= 2)
                  {
                    $label = 'primary';
                  }
                  elseif($game_info->points_won > 2 && $game_info->points_won <= 7)
                  {
                    $label = 'success';
                  }
                ?>
                    <tr>
                      <td>

                        @if($game_info->played == 'yes')
                        <span style="color:seagreen" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                        @endif
                        
                      </td>
                      <th role="row">{{ date("D d/m",strtotime($game_info->match_date)) }}</th>
                      <td class="text-center">{{ ucfirst($game_info->home_team) }}</td>
                      <td class="text-center text-bold">{{ $game_info->home_score }} - {{ $game_info->away_score }}</td>
                      <td class="text-center">{{ ucfirst($game_info->away_team) }}</td>
                      <td class="text-center">
                        
                        @if($game_info->played == 'yes')
                             <span class="label label-{{ $label }}">{{ $game_info->points_won }}</span>
                        @else 
                        {{ ' - ' }}
                        @endif
                         
                      </td>
                    </tr>
                
              @endforeach 


                @if($ticketInfo->total_points >= 20 )
    
                        <tr>
                          <th role="row" colspan="5">Total</th>
                          <td  class="text-center">
                            <span class="label label-success">{{ $ticketInfo->total_points }}</span>
                          </td>

                        </tr>

                        <tr>
                          <th role="row" colspan="5">Total Payout</th>
                          <td  class="text-center">
                            <span class="label label-success">N{{ number_format(ticket_payout($ticketInfo->amount,$ticketInfo->total_points)) }}</span>
                          </td>

                        </tr>
                        
                @endif
            </table>
              </div>

                       <br/>
                       <p class="text-center">

                         <a class="btn btn-default btn-lg" href="javascript:window.print()" role="button">Print Ticket</a>

                       </p>
                       <br/>
         </div>

  </div>

</div>

@include('components.public.footer')

@include('components.public.jsList')
   
</body>
</html>
