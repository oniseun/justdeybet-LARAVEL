 
 @extends('master.admin')

@section('title','Manage Cashiers ')
@section('content')

            <div class="jumbotron">
             <h1>Manage Cashiers</h1>
            <p>In this section , you can perform activities that pertains to the cashiers in the system.
              Activities such as addition of new cashiers,update password and set priviledges</p>
            <p>
                  <a class="btn btn-primary btn-lg" onClick="open_dialog('/admin/dialogs/add/cashier','Add Cashier',850,500)" href="#" role="button">Add new cashier</a>
                  <a class="btn btn-default btn-lg" href="/admin/cashiers/list" role="button">
                    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh list
                  </a>
                </p>
           
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">Cashier list (<b> {{ number_format($siteInfo->cashier_count) }}</b>) </div>
              <div class="panel-body">

                @if(count($siteInfo->cashier_count) < 1)
                  
                 <h1>No record found</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">

                   <thead>
                      <tr>
                        <th>Last active</th>
                        <th>Full name </th>
                        <th>Shop Name </th>
                        <th>Phone Number</th>
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
                              <!-- Single button -->
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a onClick="open_dialog('/admin/dialogs/edit/account/info/{{ $cashierInfo->ID }}','Edit account Info',850,500)" href="#">Account Info</a></li>
                                        <li><a onClick="open_dialog('/admin/dialogs/edit/account/permission/{{ $cashierInfo->ID }}','Edit account spermission',850,500)" href="#">Permissions</a></li>
                                        <li><a onClick="open_dialog('/admin/dialogs/edit/account/password/{{ $cashierInfo->ID }}','Edit account password',850,500)" href="#">Update Password</a></li>

                                            @if($cashierInfo->suspended === 'yes')

                                            <li><a href="/admin/reactivate/cashier/{{ $cashierInfo->ID }}">Reactivate {{ $cashierInfo->display_name }}</a></li>
                                            <li><a href="/admin/suspend/cashier/{{ $cashierInfo->ID }}">Suspend {{ $cashierInfo->display_name }}</a></li>
                                            
                                            @endif
                                      </ul>
                                  </div>
                            </td>

                        </tr>
                </tbody>
                  @endforeach

                </table>

                @endif

               </div>
              </div>
     @endsection