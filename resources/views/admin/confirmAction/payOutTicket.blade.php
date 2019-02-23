 
 @extends('master.adminOneColumn')

@section('title')
Pay Out Ticket (N {{ ticket_payout($ticketInfo->amount,$ticketInfo->total_points) }} - {{ $ticketInfo->ticket_id }} )
@endsection
@section('content')


 <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">

              <div class="panel  panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Payout Ticket ? </b></div>
                <div class="panel-body">

                  <form class="text-center"  action="/admin/finalize/payout/ticket" method="post">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticketInfo->ticket_id }}"/>
                    <input type="hidden" name="amount_paid_out" value="{{ ticket_payout($ticketInfo->amount,$ticketInfo->total_points) }}"/>
                    <p>
                      <h1><b> {{ $ticketInfo->ticket_id }} </b></h1><hr/>
                      <h3><b style="color:seagreen"> {{ number_format(ticket_payout($ticketInfo->amount,$ticketInfo->total_points)) }} </b></h3><hr/>
                       Are you sure you've paid out <b> {{ number_format(ticket_payout($ticketInfo->amount,$ticketInfo->total_points)) }}</b> to <b> {{ $ticketInfo->full_name }}  ?
                    </p>


                     <p><br/>
                          <a class="btn btn-default " href="/admin/tickets/winning" role="button">
                         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to tickets
                          </a>
                         <button class="btn btn-success" role="button">Yes I'm sure</button>

                         <a class="btn btn-info" href="/admin/ticket/{{ $ticketInfo->ticket_id }}" role="button">
                          View Ticket Info
                         </a>
                   </p>
                </form>

                </div>
              </div>

            </div>
    </div>

     @endsection