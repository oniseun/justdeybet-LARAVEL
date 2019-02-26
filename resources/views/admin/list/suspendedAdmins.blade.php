 
 @extends('master.admin')

@section('title','Suspended Admins ')
@section('content')

            <div class="jumbotron">
            <h1>Suspended Admins</h1>
            <p>In this section , you can perform suspend admins from performing all functions pertaining to their role on the site.
              Once suspended the restrictions take effect from that moment </p>
            <p>
              <a class="btn btn-default btn-lg" href="/admin/list" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to admin list
              </a>
              <a class="btn btn-primary btn-lg"  href="/admin/suspended" role="button">
                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</a>
            </p>
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading">Suspended Admin list (<b> {{ number_format($siteInfo->suspended_admin_count) }}</b>) </div>
              <div class="panel-body">

                @if($siteInfo->suspended_admin_count < 1)
                  
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
                   
                    @foreach($adminList as $adminInfo)
                    <tbody>
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
                                        <a href="/admin/reactivate/{{ $adminInfo->ID }}" role="button" class="btn btn-primary">Re-activate</a>

                                    </td>
                            

                        </tr>
                </tbody>
                  @endforeach

                </table>

                @endif

               </div>
              </div>
     @endsection