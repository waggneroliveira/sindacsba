<!DOCTYPE html>
<html  lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-user="true">
    <head>
        <meta charset="utf-8" />
        <title>{{env('APP_NAME')}} - Painel Gerenciador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema de gerenciamento do site {{env('APP_NAME')}}" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/admin/images/logo-hoom.png')}}">

        <link href="{{ asset('build/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('build/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('build/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('build/admin/js/head.js') }}"></script>
   
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Authentication js -->
        <script src="{{ asset('build/admin/js/pages/authentication.init.js') }}"></script>
    </body>
</html>
