 
 @extends('master.admin')

@section('title','Canceled Tickets List ')
@section('content')

            <div class="jumbotron">
            <h1>Cancelled Tickets</h1>
            <p>In this section , you can view tickets that were cancelled by admin</p>
            <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">
              Create Ticket
            </a>
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">Cancelled ticket list (<b> {{ number_format($ticketListCount->cancelled_ticket_count) }}</b>) </div>
              <div class="panel-body">

                @if(count($canceledTickets) < 1)
                  
                 <h1>You have not cancelled any ticket  yet..</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">

                   <thead>
                      <tr>

                        <th>Serial Number </th>
                        <th>Ticket no</th>
                        <th>Usage Count</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($canceledTickets as $ticketInfo)
                        <tr>

                          <td>{{ $ticketInfo->serial_number }}</td>
                          <th role="row">{{ $ticketInfo->ticket_id }}</th>
                          <td> {{ $ticketInfo->usage_count }}</td>
                          <td>
                                <a role="button" href="/admin/ticket/{{ $ticketInfo->ticket_id }}"  type="button" class="btn btn-default">Ticket info</a>
                          </td>

                        </tr>
                  @endforeach
                </tbody>
                </table>

                @endif

               </div>
              </div>
     @endsection