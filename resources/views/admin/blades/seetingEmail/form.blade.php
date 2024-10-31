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
                <div class="col-12 col-lg-6">
                    <div class="card card-body">
                        <p>Para configurar e-mails de outros provedores recomendamos pesquisar no google: <i>Como configurar SMTP hostgator</i>, por exemplo.</p>
                        <div class="accordion custom-accordion mb-4" id="custom-accordion-one">
                            <div class="card mb-1">
                                <div class="card-header" id="headingNine">
                                    <h5 class="m-0 position-relative">
                                        <a class="custom-accordion-title text-reset d-block collapsed" data-bs-toggle="collapse" href="#collapseGamail" aria-expanded="false" aria-controls="collapseNine">
                                            <i class="mdi mdi-help-circle me-1 text-dark"></i>
                                            Configurar conta Gmail
                                            <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>
            
                                <div id="collapseGamail" class="collapse" aria-labelledby="headingFour" data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <ul>
                                            <li><b>Host:</b> smtp.gmail.com</li>
                                            <li><b>Usuário:</b> Seu endereço completo do Gmail (ex.: you@gmail.com)</li>
                                            <li><b>Senha:</b> Sua senha de app. Não sabe como configurar? clique <a href="https://support.google.com/mail/answer/185833?hl=pt-BR" target="_blank" rel="noopener noreferrer">aqui</a></li>
                                            <li><b>Porta</b> 465</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-1">
                                <div class="card-header" id="headingNine">
                                    <h5 class="m-0 position-relative">
                                        <a class="custom-accordion-title text-reset d-block collapsed" data-bs-toggle="collapse" href="#collapseOutlook" aria-expanded="false" aria-controls="collapseNine">
                                            <i class="mdi mdi-help-circle me-1 text-dark"></i>
                                            Configurar conta Outlook
                                            <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>
            
                                <div id="collapseOutlook" class="collapse" aria-labelledby="headingFour" data-bs-parent="#custom-accordion-one">
                                    <div class="card-body">
                                        <ul>
                                            <li><b>Host:</b> smtp.office365.com</li>
                                            <li><b>Usuário:</b> Seu endereço completo do outlook (ex.: you@outlook.com)</li>
                                            <li><b>Senha:</b> Senha do email</li>
                                            <li><b>Porta</b> 587</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                        @if (Auth::user()->hasRole('Super') || 
                        Auth::user()->can('usuario.tornar usuario master') || 
                        Auth::user()->can('email.visualizar') && Auth::user()->can('email.testar conexao smtp'))
                            <div class="col-2">
                                <a href="{{route('admin.dashboard.settingEmail.smtpVerify')}}" id="testSmtp" class="btn btn-warning">Testar Conexão</a>
                            </div>
                            <div class="detailsTestSmtp"></div>
                        @endif
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
    
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{Auth::user()->hasRole('Super') || 
                                Auth::user()->can('usuario.tornar usuario master') || 
                                Auth::user()->can('email.visualizar') && Auth::user()->can('email.configurar smtp') ? isset($settingEmail) ? route('admin.dashboard.settingEmail.update', $settingEmail->id) : route('admin.dashboard.settingEmail.store') : '' }}" method="post">
                                @csrf
                                @if(isset($settingEmail))
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="mail_mailer" class="form-label">Mail Mailer <span class="text-danger">*</span></label>
                                        <input type="text" name="mail_mailer" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }}  class="form-control" id="mail_mailer{{isset($settingEmail->id)?$settingEmail->id:''}}" value="{{isset($settingEmail)?$settingEmail->mail_mailer:''}}" required>
                                    </div>                                    
                                    <div class="mb-3 col-6">
                                        <label for="mail_port" class="form-label">Porta<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_port" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }} value="{{isset($settingEmail)?$settingEmail->mail_port:''}}" class="form-control" id="mail_port{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="mail_encryption" class="form-label">Criptografia<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_encryption" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }} value="{{isset($settingEmail)?$settingEmail->mail_encryption:''}}" class="form-control" id="mail_encryption{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>   
                                    <div class="mb-3 col-10">
                                        <label for="mail_host" class="form-label">Host<span class="text-danger">*</span></label>
                                        <input type="text" name="mail_host" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }} value="{{isset($settingEmail)?$settingEmail->mail_host:''}}" class="form-control" id="mail_host{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-7">
                                        <label for="mail_username" class="form-label">Usuário<span class="text-danger">*</span></label>
                                        <input type="email" name="mail_username" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }} value="{{isset($settingEmail)?$settingEmail->mail_username:''}}" class="form-control" id="mail_username{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>                              
                                    <div class="mb-3 col-5">
                                        <label for="mail_password" class="form-label">Senha<span class="text-danger">*</span></label>
                                        <input type="password" name="mail_password" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }} value="{{isset($settingEmail)?$settingEmail->mail_password:''}}" class="form-control" id="mail_password{{isset($settingEmail->id)?$settingEmail->id:''}}" {{ !isset($settingEmail) ? 'required' : '' }}>
                                        <div class="row">
                                            <span class="mt-2 text-warning"><i class="mdi mdi-alert"></i> Sua senha não ficará visível por questões de segurança.</span>
                                        </div>
                                    </div>                              
                                </div>
                                <div class="row">                           
                                    <div class="mb-3 col-6">
                                        <label for="mail_from_address" class="form-label">E-mail remetente<span class="text-danger">*</span></label>
                                        <input type="email" name="mail_from_address" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }} value="{{isset($settingEmail)?$settingEmail->mail_from_address:''}}" class="form-control" id="mail_from_address{{isset($settingEmail->id)?$settingEmail->id:''}}" required>
                                    </div>                              
                                    <div class="mb-3 col-6">
                                        <label for="mail_from_name" class="form-label">Identificador do e-mail</label>
                                        <input type="text" name="mail_from_name" {{ (Auth::user()->can('email.visualizar') && !Auth::user()->can('email.configurar smtp')) ? 'readonly' : '' }} value="{{isset($settingEmail)?$settingEmail->mail_from_name:''}}" class="form-control" id="mail_from_name{{isset($settingEmail->id)?$settingEmail->id:''}}">
                                    </div>                              
                                </div>
                                @if (Auth::user()->hasRole('Super') || 
                                Auth::user()->can('usuario.tornar usuario master') || 
                                Auth::user()->can('email.visualizar') && Auth::user()->can('email.configurar smtp'))
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Salvar</button>
                                    </div> 
                                @endif
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection
