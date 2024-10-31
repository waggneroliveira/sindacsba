@extends('admin.core.auth')
@section('content')
<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">
                            
                            <div class="text-center w-75 m-auto">
                                <div class="auth-brand">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('build/admin/images/whi.png')}}" alt="" height="22">
                                        </span>
                                    </a>
                
                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('build/admin/images/whi.png')}}" alt="" height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Digite seu endereço de e-mail e enviaremos um e-mail com instruções para redefinir sua senha.</p>
                            </div>

                            <form action="{{route('password.email')}}" method="POST">
                                @csrf

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach  
                                @endif
        
                                @if(session('success'))
                                    <p class="text-success">
                                        {{ session('success') }}
                                    </p>
                                @endif

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">E-mail</label>
                                    <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Digite seu e-mail">
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Redefinir Senha </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Voltar para <a href="{{route('admin.dashboard.painel')}}" class="text-white ms-1"><b>Login</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
    </footer>    
</body>
@endsection