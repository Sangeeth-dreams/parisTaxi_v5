<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="gauto | Car Rental HTML Template from Themescare">
      <meta name="keyword" content="taxi,car,rent,hire,transport">
      <meta name="author" content="Themescare">
      <!-- Title -->
      <title>Private Disney Taxi</title>
      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/assets/img/favicon/favicon-32x32.png')}}">
      <!--Bootstrap css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.css')}}">
      <!--Font Awesome css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
      <!--Magnific css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
      <!--Owl-Carousel css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
      <!--Animate css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
      <!--Datepicker css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery.datepicker.css')}}">
      <!--Nice Select css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">
      <!-- Lightgallery css -->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/lightgallery.min.css')}}">
      <!--ClockPicker css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery-clockpicker.min.css')}}">
      <!--Slicknav css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/slicknav.min.css')}}">
      <!--Site Main Style css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
      <!--Responsive css-->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">

      {{-- Google Fonts --}}
      <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Federo:regular" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet" />
      
   </head>
   <body>
       

            @include('frontend.layouts.header')
            <!-- Start of Main-->
            
            @yield('content')
            
            <!-- End of Main -->
            @include('frontend.layouts.footer')


       
     
     
       
       
      <!--Jquery js-->
      <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
      <!-- Popper JS -->
      <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
      <!--Bootstrap js-->
      <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
      <!--Owl-Carousel js-->
      <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
      <!--Lightgallery js-->
      <script src="{{asset('frontend/assets/js/lightgallery-all.js')}}"></script>
      <script src="{{asset('frontend/assets/js/custom_lightgallery.js')}}"></script>
      <!--Slicknav js-->
      <script src="{{asset('frontend/assets/js/jquery.slicknav.min.js')}}"></script>
      <!--Magnific js-->
      <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
      <!--Nice Select js-->
      <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
      <!-- Datepicker JS -->
      <script src="{{asset('frontend/assets/js/jquery.datepicker.min.js')}}"></script>
      <!--ClockPicker JS-->
      <script src="{{asset('frontend/assets/js/jquery-clockpicker.min.js')}}"></script>
      <!--Main js-->
      <script src="{{asset('frontend/assets/js/main.js')}}"></script>
   </body>
</html>

