 @extends('master.adminOneColumn')

@section('title','Logout')
@section('content')

     <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">

              <div class="panel  panel-danger">
                <!-- Default panel contents -->
                <div class="panel-heading"><b>Are you sure you want to logout ? </b></div>
                <div class="panel-body">
                  <form class="text-center" action="/admin/finalize/logout" method="post">
                    @csrf
                     If you logout , you will not be able to access your stored details until you login again

                     <p><br/>
                     <button class="btn btn-danger" name="logout" role="button">Logout now</button>
                     <a class="btn btn-default " href="/admin/dashboard" role="button">
                       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to dashboard
                     </a>
                   </p>
                </form>
                </div>
              </div>

            </div>
    </div>

 @endsection