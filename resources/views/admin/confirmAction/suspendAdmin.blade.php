@extends('master.dialogs')

@section('title')
Suspend Admin : {{ $adminInfo->display_name }} 
@endsection
@section('content')

    <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">

              <div class="panel  panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Suspend Admin</b></div>
                <div class="panel-body">

                  <form class="text-center"  action="/admin/finalize/suspend/admin" method="post">
                    @csrf
                    <input type="hidden" name="admin_id" value="{{ $adminInfo->ID }}"/>
                    <p>
                      <h1><b> {{ $adminInfo->display_name }} </b></h1><hr/>
                       Are you sure you want to suspend this admin ? All activities will be frozen until they're reacivated  ?
                    </p>


                     <p><br/><a class="btn btn-default " href="admin/manage/admins" role="button">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to list
                     </a>
                         <button class="btn btn-danger ajax-submit" role="button">Suspend {{ $adminInfo->display_name }}</button>

                   </p>
                </form>

                </div>
              </div>

            </div>
    </div>

 @endsection