<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <link href="{{ asset('css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('css/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="{{ asset('css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div id="app">

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <!--  BEGIN CONTENT AREA  -->
            @yield('content')
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->
    </div>
</body>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
$(document).ready(function() {
    App.init();
});
</script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/dashboard/dash_1.js') }}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</html>