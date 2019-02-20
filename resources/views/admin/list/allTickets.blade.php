 
 @extends('master.admin')

@section('title','All Tickets List ')
@section('content')

            <div class="jumbotron">
             <h1>Manage Tickets</h1>
            <p>In this section ,you can manage created tickets.
              Tickets must be registered before it can be used. Registered tickets can only be used to play <b>6 games</b> .
              .</p>
            <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">
              Create Ticket
            </a>
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">All ticket list (<b> {{ number_format($ticketListCount->ticket_list_count) }}</b>) </div>
              <div class="panel-body">

                @if(count($allTickets) < 1)
                  
                 <h1>You have not created any ticket  yet..</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">

                   <thead>
                      <tr>

                        <th>date</th>
                        <th>Name</th>
                        <th> Ticket no</th>
                        <th> Amount</th>
                        <th> Total points</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($allTickets as $ticketInfo)
                        <tr>

                            <td>{{ date("D d/m",strtotime($ticketInfo->date_created)) }}</td>
                          <td>{{ $ticketInfo->full_name }}</td>
                          <th role="row">{{ $ticketInfo->ticket_id }}</th>
                          <td>{{ number_format($ticketInfo->amount) }}</td>
                          <td>{{ $ticketInfo->total_points }}</td>
                          <td>
                               
                            <a role="button" href="/admin/ticket/{{ $ticketInfo->ticket_id }}"  type="button" class="btn btn-info">Ticket info</a>
                            <a class="btn btn-danger" href="/admin/cancel/ticket/{{ $ticketInfo->ticket_id }}" role="button">
                                 Cancel ticket
                                </a>
                          </td>


                        </tr>
                  @endforeach
                </tbody>
                </table>

                @endif

               </div>
              </div>
     @endsection