<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <title>@yield('title', 'Admin Panel')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/plugins/pace/pace.css')}}" rel="stylesheet">

    <link href="{{asset('assets/admin/css/main.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet">
    @yield('css')

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/admin/images/neptune.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/admin/images/neptune.png')}}" />

</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        @include('layouts.admin.sidebar')

        <div class="app-container">

            @include('layouts.admin.header')

            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/admin/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/main.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/custom.js')}}"></script>
    <script src="{{asset('assets/admin/js/pages/dashboard.js')}}"></script>
    @include('sweetalert::alert')
    @yield('js')

</body>
</html>
