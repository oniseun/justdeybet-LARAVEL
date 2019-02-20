
                  <p class="text-center">
                    <hr>
                    <h2 class="text-center"><span class="label label-success">PAGE {{ $_GET['page'] }}</span></h2>
                    <br>
                  </p>
                  <table class="table data-table">


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
                  
                 @if(count($activityList) >= 15)
                     
                  <p class="text-center">
                    
                    <button class="btn btn-primary ajax-next-button" 
                    href="/admin/next/activities/{{ strtotime($activityInfo->action_date) }}/?page=<?=((int)$_GET['page'] + 1)?>" role="button">More activites</button>
                  </p>
                 @endif
