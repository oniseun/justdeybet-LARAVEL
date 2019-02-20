<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="no-referrer" />
<meta name="robots" content="noindex,nofollow" />
<title> Betting Site Admin - 
@yield('title')    
</title>

@include('components.cssList')
<style>

</style>
</head>
<body class="">
@include('components.header')

    <div class="container">
        <div class="row">
          <br/>

            <div class="col-lg-8">
                
                
                  @yield('content')
       
            </div>

         <!-- sidebar -->
            <div class="col-lg-4">

                @include('components.sidebar')

            </div>
    </div>

    </div>

@include('components.footer')
@include('components.jsList')

@yield('scripts')

         

</body>
</html>