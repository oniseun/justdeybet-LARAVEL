 
 @extends('master.admin')

@section('title','Paid Out Tickets List ')
@section('content')

            <div class="jumbotron">
            <h1>Paid out Tickets</h1>
            <p>In this section , you can view tickets that won and have been paid out by the system .</p>
            <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">
              Create Ticket
            </a>
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">paid Out ticket list (<b> {{ number_format($ticketListCount->paid_out_ticket_count) }}</b>) </div>
              <div class="panel-body">

                @if(count($paidOutTickets) < 1)
                  
                 <h1>No paid out ticket on your list yet..</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">


                   <thead>
                      <tr>

                       <th>Serial No. </th>
                        <th>Ticket No.</th>
                        <th>Games Played</th>
                        <th>Points</th>
                        <th>Amount Staked</th>
                        <th>Amount paid out</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($paidOutTickets as $ticketInfo)
                        <tr>

                          <td>{{ $ticketInfo->serial_number }}</td>
                          <th role="row">{{ $ticketInfo->ticket_id }}</th>
                          <td> {{ $ticketInfo->usage_count }}</td>
                          <td>{{ $ticketInfo->total_points }}</td>
                          <td>N {{ number_format($ticketInfo->amount) }}</td>
                           <td><b style="color:seagreen">N{{ number_format($ticketInfo->amount_paid_out) }}</b></td>
                            <td><a  role="button" target="_blank" href="/admin/ticket/{{ $ticketInfo->ticket_id }}"  type="button" class="btn btn-primary">Ticket info</a></td>

                        </tr>
                  @endforeach
                </tbody>
                </table>

                @endif

               </div>
              </div>
     @endsection