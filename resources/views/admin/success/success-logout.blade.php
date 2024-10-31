<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-user="true">

    <head>
        <meta charset="utf-8" />
        <title>{{env('APP_NAME')}} - Painel Gerenciador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="author" content="WHI - Web de Alta Inspiração">
        <meta name="description" content="Painel gerenciador de conteúdo {{env('APP_NAME')}}">
        <meta name="copyright" content="© 2024 WHI - Web de Alta Inspiração." />
        <meta name="robots" content="none">
        <meta name="googlebot" content="noarchive">

        <!-- plugin css -->
        <link rel="stylesheet" href="{{ asset('build/admin/js/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">
        <!-- Bootstrap css -->
        <link href="{{ asset('build/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- App css -->
        <link href="{{ asset('build/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons css -->
        <link href="{{ asset('build/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="authentication-bg authentication-bg-pattern">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">
        
                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-brand">
                                        <a href="" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('build/admin/images/whi.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                    
                                        <a href="" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('build/admin/images/whi.png')}}" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                </div>
        
                                <div class="text-center">
                                    <div class="mt-4">
                                        <div class="logout-checkmark">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                                <circle class="path circle" fill="none" stroke="#4bd396" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                                                <polyline class="path check" fill="none" stroke="#4bd396" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                                            </svg>
                                        </div>
                                    </div>
        
                                    <h3>Logout realizado com sucesso!</h3>
        
                                    <p class="text-muted"> Sua sessão foi encerrada. Volte quando quiser! </p>
                                </div>
        
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        
            <script>
                // Função de redirecionamento
                function redirecionar() {
                    window.location.href = '/painel'; // Redireciona diretamente
                }
        
                // Chama a função de redirecionamento após 1 segundo
                setTimeout(redirecionar, 1800); // 1000 ms = 1 segundo
            </script>
        </div>
    </body>
</html>
