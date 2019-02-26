 
 @extends('master.admin')

@section('title','Suspended Cashiers ')
@section('content')

            <div class="jumbotron">
                    <h1>Suspended Cashiers</h1>
                    <p>In this section , you can perform suspend cashiers from performing all functions pertaining to their role on the site.
                    Once suspended, the restrictions take effect from that moment </p>
                    <p>
                    <a class="btn btn-default btn-lg" href="/admin/cashiers/list" role="button">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to  list
                    </a>
                    <a class="btn btn-primary btn-lg"  href="/admin/cashiers/suspended" role="button">
                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</a>
                    </p>
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">Suspended Cashier list (<b> {{ number_format($siteInfo->suspended_cashier_count) }}</b>) </div>
              <div class="panel-body">

                @if($siteInfo->suspended_cashier_count < 1)
                  
                 <h1>No record found</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">

                   <thead>
                      <tr>
                       <th>Last active</th>
                        <th>Full name </th>
                        <th>Shop name</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                   
                    @foreach($cashierList as $cashierInfo)
                    <tbody>
                        <tr>
                            <th>{{ date("D d/m",strtotime($cashierInfo->date_registered)) }}</th>
                          <td>{{ $cashierInfo->display_name }}</td>
                          <td>{{ $cashierInfo->shop_name }}</td>
                          <td>{{ $cashierInfo->phone }}</td>
                          <td>
                            @if( $cashierInfo->suspended === 'yes' )
                            
                            <span class="label label-danger">suspended</span>

                            @else

                            <span class="label label-default">active</span>

                            @endif

                          </td>
                            <td>
                                <a href="/admin/reactivate/cashier/{{ $cashierInfo->ID }}" role="button" class="btn btn-primary">Re-activate</a>

                            </td>
                            

                        </tr>
                </tbody>
                  @endforeach

                </table>

                @endif

               </div>
              </div>
     @endsection