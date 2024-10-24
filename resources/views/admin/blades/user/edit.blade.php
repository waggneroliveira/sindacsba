@extends('admin.core.admin')
@section('content')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row col-12">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.user.index')}}">Usuários</a></li>
                                <li class="breadcrumb-item active">Meu perfil</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Usuário</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row col-12">
                <div class="col-12 col-lg-12">
                    <div class="card card-body">
                        @include('admin.blades.user.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection