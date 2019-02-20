 
 @extends('master.admin')

@section('title','Manage Admins ')
@section('content')

            <div class="jumbotron">
            <h1>Manage Admins</h1>
                <p>In this section , you can perform activities that pertains to the added admins in the system.
                  Activities such as addition of new admin,update password and set priviledges</p>
                <p>
                  <a class="btn btn-primary btn-lg" onClick="open_dialog('/admin/dialogs/add/admin','Add Admin',850,500)" href="#" role="button">Add new admin</a>
                  <a class="btn btn-default btn-lg" href="/admin/list" role="button">
                    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh list
                  </a>
                </p>
           
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">Admin list (<b> {{ number_format($siteInfo->admin_count) }}</b>) </div>
              <div class="panel-body">

                
                @if(count($siteInfo->admin_count) < 1)
                  
                 <h1>No record found</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">

                   <thead>
                      <tr>
                        <th>Last active</th>
                        <th>Full name </th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                   <tbody>
                    @foreach($adminList as $adminInfo)
                    
                        <tr>
                    <th>{{ date("D d/m",strtotime($adminInfo->date_registered)) }}</th>
                          <td>{{ $adminInfo->display_name }}</td>
                          <td>{{ $adminInfo->phone }}</td>
                          <td>
                            @if( $adminInfo->suspended === 'yes' )
                            
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
                                        <li><a onClick="open_dialog('/admin/dialogs/edit/account/info/{{ $adminInfo->ID }}','Edit account Info',850,500)" href="#">Account Info</a></li>
                                        <li><a onClick="open_dialog('/admin/dialogs/edit/account/permission/{{ $adminInfo->ID }}','Edit Account permission',850,500)" href="#">Permissions</a></li>
                                        <li><a onClick="open_dialog('/admin/dialogs/edit/account/password/{{ $adminInfo->ID }}','Edit Account password',850,500)" href="#">Update Password</a></li>

                                            @if($adminInfo->suspended === 'yes')

                                            <li><a href="/admin/reactivate/{{ $adminInfo->ID }}">Reactivate {{ $adminInfo->display_name }}</a></li>

                                            @else
                                            <li><a href="/admin/suspend/{{ $adminInfo->ID }}">Suspend {{ $adminInfo->display_name }}</a></li>
                                            
                                            @endif
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