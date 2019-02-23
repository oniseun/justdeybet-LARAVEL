@extends('master.adminOneColumn')
@section('title','Page Not Found ')
@section('content')

<div class="row">
    <br/>
          <br/>
            <div class="col-lg-offset-2 col-lg-8">

                <!-- ticket id panel -->
              <div class="panel  panel-danger">
                <div class="panel-heading"><strong>PAGE NOT FOUND</strong></div>
                  <div class="panel-body">
                   <h1> Page Not Found </h1>
                   <h4> Page was not found on this server </h4>
                    
                    <p>
                    <center>
                  <a class="btn btn-default btn-lg" href="/admin/dashboard" role="button">Go home</a>
                    </center>
                    </p>
                
                </div>
                  </div>

             

         </div>

  </div>
@endsection