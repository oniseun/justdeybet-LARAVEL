@extends('master.dialogs')

@section('title','Reactivate suspended admin')
@section('content')

     <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">

              <div class="panel  panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Re-activate Admin? </b></div>
                <div class="panel-body">

                  <form class="text-center"  action="/admin/finalize/reactivate/admin" method="post">
                   @csrf
                    <input type="hidden" name="admin_id" value="<?=$admininfo->ID?>"/>
                    <p>
                      <h1><b> {{ $admininfo->display_name }} </b></h1><hr/>
                       Are you sure you want to re-activate this admin ? All activities will be resumed immediately afte reactivation
                    </p>


                     <p><br/><a class="btn btn-default " href="/admin/suspended/admins" role="button">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to list
                     </a>
                         <button class="btn btn-danger ajax-submit" role="button">Re-activate <?=$display_name?></button>

                   </p>
                </form>

                </div>
              </div>

            </div>
    </div>

 @endsection