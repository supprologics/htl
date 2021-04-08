<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title  -->
    <title>{{config('app.name')}} | {{isset($title)?$title:''}}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('/admin/css/dashlite.css?ver=2.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('/admin/css/theme.css?ver=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('/admin/css/custom.css') }}">

    @yield('css')
</head>

<body class="nk-body bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->

                @include('layouts.lec_includes.sidenav')

            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->

                    @include('layouts.lec_includes.headernav')

                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content nk-content-fluid"  id="content-fill">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                @yield('content-fluid')
                <!-- footer @s -->
                
                    @include('layouts.lec_includes.footer')

                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('/admin/js/bundle.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('/admin/js/scripts.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('/admin/js/example-toastr.js?ver=2.0.0') }}"></script>

    
    @include('layouts.components.toast')

    @yield('script')
</body>

</html>