<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

       <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
     

       <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
       {{-- Bootstrap5  --}}
       <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
       {{-- Owl Carousel--}} 
       <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
       <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
       {{-- Google Font --}}
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

       <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

       {{--Font Awesome--}}
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
</head>
<body>
    @include('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
    </div>


    <!-- Core JS File -->

    {{-- Dosent work custom.js --}}
    <script src="{{ asset('frontend/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

     <script>

    var availableTags = [];

    $.ajax({
      method:"GET",
      url: "/prdouct-list",
      success: function(response){
       // console.log(response);
        startAutoComplete(response);
      } 
    });
    
    function startAutoComplete(availableTags)
    {
        $( "#serach-product" ).autocomplete({
          source: availableTags
        });
    }

  </script>
   
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    @yield('scripts')
    
</body>
</html>
