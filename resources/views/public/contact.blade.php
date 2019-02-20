  @extends('master.public')    

@section('title','Contact us')
    
@section('content')  
  
  <div class="page-header">
                <h1>Contact us  <small>JustDeyBet Pages</small></h1>
              </div>
              <p>
                <b>Your enquiries are important to us </b><br>
                Please fill in your details and comment in the form below.<br/>
              </p>
              <!--/ form here -->
              <hr/>
              <br/>

              <!-- form -->

              <form class="form-horizontal"  action="/finalize/contact/us" method="post">

                @csrf
                <div class="form-group form-group-lg">
                  <label for="display_name" class="col-sm-3 control-label">Full name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="display_name"
                     name="full_name" placeholder="Enter full name here ...">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="email" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email"class="form-control input-lg" id="email"
                    placeholder="Enter email here...">
                  </div>
                </div>



                <div class="form-group form-group-lg">
                  <label for="about" class="col-sm-3 control-label">Comment</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="comment" rows="4"></textarea>
                  </div>
                </div>


                <div class="form-group form-group-lg">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary btn-lg ajax-submit">Submit form</button>
                  </div>
                </div>

              </form>

              <br/>
@endsection