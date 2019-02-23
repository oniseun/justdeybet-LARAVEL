 
 @extends('master.adminOneColumn')

@section('title','Confirm Cancel ticket ')
@section('content')

 <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">

              <div class="panel  panel-warning">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Cancel Ticket ? </b></div>
                <div class="panel-body">
                  <!-- form -->
                  <form class="text-center" action="/admin/finalize/cancel/ticket" method="post">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticketInfo->ticket_id }}"/>
                    <p>
                      <h1><b> {{ $ticketInfo->ticket_id }} </b></h1><hr/>
                       Are you sure you want to cancel this ticket and forfeit any feasible earnings or information attached to it? This action cannot be undone.  ?
                    </p>


                     <p><br/>
                       <a class="btn btn-default " href="/admin/tickets/list" role="button">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to tickets
                     </a>
                         <button class="btn btn-primary" role="button">Cancel Ticket</button>

                         <a class="btn btn-info " href="/admin/ticket/{{ $ticketInfo->ticket_id }}" role="button">
                          View Ticket Info
                         </a>
                   </p>
                </form>

                </div>
              </div>

            </div>
    </div>
     @endsection