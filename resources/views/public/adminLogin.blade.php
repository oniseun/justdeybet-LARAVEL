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
        <div class="row">
          <br/>
            <div class="col-lg-offset-3 col-lg-6">
              <div class="page-header">
                <h1>Login  <small>admin login</small></h1>
              </div>
              <br/>
              <form class="form-horizontal"  action="/finalize/login" method="post">
                @csrf

                <div class="form-group form-group-lg">
                  <label for="username" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control input-lg" id="username" name="username"  placeholder="Enter username here...">
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
                    <button type="submit" class="btn btn-primary btn-lg ajax-submit">Login Now</button>
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
