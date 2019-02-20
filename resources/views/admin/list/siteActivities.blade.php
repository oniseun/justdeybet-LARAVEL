 
 @extends('master.admin')

@section('title','site activities ')
@section('content')

            <div class="jumbotron">
            <h1>Site Activities</h1>
            <p>This page display all acivities performed on the site by super admin, admins and cashiers.
              Activities may include ticket creation, playing of games etc </p>
            <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">
              Create Ticket
            </a>
            </div>
            <div class="panel  panel-warning">
              <!-- Default panel contents -->
              <div class="panel-heading"><b>Sitewide Activities ({{ number_format($siteInfo->activity_count) }})</b> </div>
              <div class="panel-body">

                @if(count($activityList) < 1)
                  
                 <h1>You are yet to perform any site activity ..</h1>
                  
                @else
            

                  <table class="table data-table table-bordered">


                   <thead>
                       <tr>
                          <th>Full name </th>
                          <th>Comment </th>
                          <th>action_type</th>
                          <th>timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($activityList as $activityInfo)
                        <tr>

                            <td>{{ $activityInfo->username }}</td>
                            <td>{{ $activityInfo->comment }} </td>
                            <td>{{ $activityInfo->action_type }}</td>
                            <td>{{ $activityInfo->action_date }}</td>
                        </tr>
                  @endforeach
                </tbody>
                </table>

                 <p class="next-list text-center">
                    <button class="btn btn-primary ajax-next-button" href="/admin/next/activities/{{ strtotime($activityInfo->action_date) }}/?page=2" role="button">
                    More activites ({{ $activityInfo->action_date }})</button>
                  </p>

                @endif

               </div>
              </div>
     @endsection

     @section('scripts')
     <script>
$(function(){


      $("body").on('click','.ajax-next-button',function(){
        var get_url = $(this).attr('href');
        var list_container = $(this).parents('.next-list');
        $(this).remove();
          $.get(get_url, function(data, status){
            list_container.append(data);

          });
      });


});
    </script>
     @endsection