@extends('admin.core.admin')
@section('content')
<style>
    .btn-group.focus-btn-group{
        display: none;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Configuração de E-mail</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Configuração de E-mail</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ isset($settingEmail) ? route('admin.dashboard.settingEmail.update', $settingEmail->id) : route('admin.dashboard.settingEmail.store') }}" method="post">
                                @csrf
                                @if(isset($settingEmail))
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="mail_mailer" class="form-label">Mail Mailer <span class="text-danger">*</span></label>
                                        <input type="text" name="mail_mailer" class="form-control" id="mail_mailer{{isset($settingEmail->id)?$settingEmail->id:''}}" value="{{isset($settingEmail)?$settingEmail->mail_mailer:''}}" required>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="mail_host" class="form-label">E-mail do Host<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_host" value="{{isset($settingEmail)?$settingEmail->mail_host:''}}" class="form-control" id="mail_host{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="mail_port" class="form-label">Porta<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_port" value="{{isset($settingEmail)?$settingEmail->mail_port:''}}" class="form-control" id="mail_port{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="mail_username" class="form-label">E-mail do usuário <span class="text-danger">*</span></label>
                                        <input type="email" name="mail_username" value="{{isset($settingEmail)?$settingEmail->mail_username:''}}" class="form-control" id="mail_username{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>                              
                                    <div class="mb-3 col-6">
                                        <label for="mail_password" class="form-label">Senha do E-mail<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_password" value="{{isset($settingEmail)?$settingEmail->mail_password:''}}" class="form-control" id="mail_password{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>                              
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="mail_encryption" class="form-label">Criptografia<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_encryption" value="{{isset($settingEmail)?$settingEmail->mail_encryption:''}}" class="form-control" id="mail_encryption{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>                              
                                    <div class="mb-3 col-4">
                                        <label for="mail_from_address" class="form-label">E-mail destinatário<span class="text-danger">*</span></label>
                                        <input type="email" name="mail_from_address" value="{{isset($settingEmail)?$settingEmail->mail_from_address:''}}" class="form-control" id="mail_from_address{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>                              
                                    <div class="mb-3 col-4">
                                        <label for="mail_from_name" class="form-label">Nome do corpo de e-mail<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_from_name" value="{{isset($settingEmail)?$settingEmail->mail_from_name:''}}" class="form-control" id="mail_from_name{{isset($settingEmail->id)?$settingEmail->id:''}}">
                                    </div>                              
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Salvar</button>
                                </div> 
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection
