<?php

use App\Tickets;

$counter = Tickets::ticket_list_count();
$winningTickets = Tickets::winning_tickets_list(5);
$paidOutTickets = Tickets::paidout_tickets_list(5);


?>
<div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading">Latest Winners <span class="label label-info">{{ number_format($counter->winning_ticket_count) }}</span></div>

  <!-- Table -->
 <table class="table table-bordered">
     <thead>
         <tr> <th>#</th> <th>Fullname</th> <th>Amount Due</th>  </tr>
     </thead>
     <tbody>
       <?php
       $c = 1 ;
       ?>
       @foreach($winningTickets as $ticket_info)
         <tr> 
           <th scope="row">{{ $c++ }}</th> 
          <td>{{ $ticket_info->full_name }}</td>  
          <td>
            <span style="color:#999">N{{ number_format(ticket_payout($ticket_info->amount,$ticket_info->total_points)) }}</span>
          </td> 
        </tr>
        
       @endforeach
        
     </tbody>
 </table>

   <div class="panel-footer"><a href="/admin/tickets/winning">View all winners</a></div>
</div>

<hr/>

<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading">Latest Payouts <span class="label label-success">{{ number_format($counter->paid_out_ticket_count) }}</span></div>

  <!-- Table -->
 <table class="table table-bordered">
     <thead>
         <tr> <th>#</th> <th>Fullname</th> <th>Amount Paid</th>  </tr>
     </thead>
     <tbody>
       <?php
       $c = 1 ;
         ?>
       @foreach($paidOutTickets as $ticket_info)
     
     <tr> <th scope="row">{{ $c++ }}</th> 
          <td>{{ $ticket_info->full_name }}</td>  
          <td><span style="color:#999">N{{ number_format($ticket_info->amount_paid_out) }}</span></td> </tr>
         
       @endforeach
       </tbody>

 </table>
 <div class="panel-footer"><a href="/admin/tickets/paidout">View all paid out tickets</a></div>

</div>