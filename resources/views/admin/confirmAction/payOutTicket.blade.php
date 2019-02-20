 
 @extends('master.dialogs')

@section('title','pay Out ticket ')
@section('content')


 <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">

              <div class="panel  panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Payout Ticket ? </b></div>
                <div class="panel-body">

                  <form class="text-center"  action="/admin/finalize/payout" method="post">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $info->id }}"/>
                    <input type="hidden" name="amount_paid_out" value="{{ ticket_payout($info->amount,$info->total_points) }}"/>
                    <p>
                      <h1><b> <?=$ticket_id?> </b></h1><hr/>
                      <h3><b style="color:seagreen"> {{ number_format(ticket_payout($info->amount,$info->total_points)) }} </b></h3><hr/>
                       Are you sure you've paid out <b> {{ number_format(ticket_payout($info->amount,$info->total_points)) }}</b> to <b> {{ $info->full_name }}  ?
                    </p>


                     <p><br/>
                          <a class="btn btn-default " href="/admin/tickets/winning" role="button">
                         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to tickets
                          </a>
                         <button class="btn btn-success ajax-submit" role="button">Yes I'm sure</button>

                         <a class="btn btn-info" href="/admin/ticket/{{ $info->ticket_id }}" role="button">
                          View Ticket Info
                         </a>
                   </p>
                </form>

                </div>
              </div>

            </div>
    </div>

     @endsection