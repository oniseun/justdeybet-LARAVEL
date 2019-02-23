<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="no-referrer" />
<meta name="robots" content="noindex,nofollow" />
<title> JustDeyBet - Login </title>

@include('components.public.cssList')

</head>
<body class="">
@include('components.public.header')
    <div class="container">
      
    @if(session('failure'))
        <p>
        {!! ajax_alert('danger',session('failure')) !!}
        </p>
        
    @endif

    @if(session('success'))
        <p>
        {!! ajax_alert('success',session('success')) !!}
        </p>
    @endif

        <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">
              <div class="page-header">
                <h1>Login  <small>admin login</small></h1>
              </div>
              <br/>
              <form class="form-horizontal"  action="/finalize/login" method="post">
                @csrf
                @if(session('redirect_url'))
              <input type="hidden" name="redirect_url" value="/{{ session('redirect_url') }}" />
              @endif

                <div class="form-group form-group-lg">
                  <label for="email" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control input-lg" id="email" name="email"  placeholder="Enter email here...">
                  </div>
                </div>

                <div class="form-group form-group-lg">
                  <label for="password" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control input-lg" for="password"
                    name="password" placeholder="Enter Password..">
                  </div>
                </div>

                <div class="form-group">
                 <div class="col-sm-offset-4 col-sm-8">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="remember"> Remember me
                     </label>
                   </div>
                 </div>
               </div>


                <div class="form-group form-group-lg">
                  <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-primary btn-lg">Login Now</button>
                  </div>
                </div>

              </form>




</div>

    </div>

    </div>
@include('components.public.footer')

@include('components.public.jsList')
   
</body>
</html>

</body>
</html>
