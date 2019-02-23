<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> JustDeyBet - @yield('title')  - Number 1 walk in kiosk betting site in nigeria </title>

@include('components.public.cssList')
<style>

</style>
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
            <div class="col-lg-8">
        @yield('content')
            </div>

          <!-- sidebar -->
        <div class="col-lg-4">
            @include('components.public.sidebar')

        </div>
           </div>
    </div>

            @include('components.public.footer')

          
            @include('components.public.jsList')
            
            @yield('scripts')

</body>
</html>