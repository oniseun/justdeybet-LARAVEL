<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="no-referrer" />
<meta name="robots" content="noindex,nofollow" />
<title> Betting Site Admin - 
@yield('title')    
</title>

@include('components.cssList')

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

<style>

</style>
</head>
<body class="">


    <div class="container">
                
                  <br/>
                  @yield('content')
       
            

    </div>

@include('components.jsList')

@yield('scripts')

</body>
</html>