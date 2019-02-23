 
 @extends('master.admin')

@section('title','Winning Tickets List ')
@section('content')



            <div class="jumbotron">
            <h1>Winning Tickets</h1>
            <p>In this section , you can view tickets that won but are not yet paid by the system </p>
            <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">
              Create Ticket
            </a>
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">Winning ticket list (<b> {{ number_format($ticketListCount->winning_ticket_count) }}</b>) </div>
              <div class="panel-body">

                @if(count($winningTickets) < 1)
                  
                 <h1>No winning ticket on your list yet..</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">


                     <thead>
                      <tr>

                        <th>Serial No. </th>
                        <th>Ticket No.</th>
                        <th>Games Played</th>
                        <th>Points</th>
                        <th>Amount Staked</th>
                        <th>Amount Won</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($winningTickets as $ticketInfo)
                        <tr>

                          <td>{{ $ticketInfo->serial_number }}</td>
                          <th role="row">{{ $ticketInfo->ticket_id }}</th>
                          <td> {{ $ticketInfo->usage_count }}</td>
                          <td>{{ $ticketInfo->total_points }}</td>
                          <td>N {{ number_format($ticketInfo->amount) }}</td>
                          <td><b style="color:seagreen">N{{ number_format(ticket_payout($ticketInfo->amount,$ticketInfo->total_points)) }}</b></td>
                          <td>
                            <!-- Single button -->

                                <div class="btn-group">
                                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Action <span class="caret"></span>
                                  </button>
                                    <ul class="dropdown-menu">

                                      <li><a href="/admin/payout/ticket/{{ $ticketInfo->ticket_id }}">Pay-out Ticket</a></li>
                                      <li><a  href="/admin/ticket/{{ $ticketInfo->ticket_id }}" >Ticket info</a></li>
                                      <li><a  href="/admin/cancel/ticket/{{ $ticketInfo->ticket_id }}" >Cancel info</a></li>
                                    </ul>
                                </div>
                          </td>


                        </tr>
                  @endforeach
                </tbody>
                </table>

                @endif

               </div>
              </div>
     @endsection