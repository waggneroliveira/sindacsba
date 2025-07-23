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
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('dashboard.title_dashboard')}}</a></li>
                                <li class="breadcrumb-item active">Contato</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Contato</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-12 d-flex justify-between">
                                    <div class="col-12 d-flex justify-content-end">
                                        @if (Auth::user()->hasRole('Super') || 
                                        Auth::user()->can('usuario.tornar usuario master') || 
                                        Auth::user()->can('contato.visualizar') &&
                                        Auth::user()->can('contato.criar'))
                                            @if (empty($contact))                                            
                                                <button type="button" class="btn btn-primary text-black waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#contact-create"><i class="mdi mdi-plus-circle me-1"></i> {{__('dashboard.btn_create')}}</button>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="contact-create" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="contact modal-dialog modal-dialog-centered" style="max-width: 100%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light">
                                                            <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_create')}}</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body p-2 px-3 px-md-4">
                                                            <form action="{{route('admin.dashboard.contact.store')}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @include('admin.blades.contact.form', ['textareaId' => 'textarea-create'])  
                                                                <div class="d-flex justify-content-end gap-2">
                                                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                    <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_create')}}</button>
                                                                </div>                                                 
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="table-responsive">
                                <table class="table-sortable table table-centered table-nowrap table-striped" id="products-datatable">
                                    <thead>                                        
                                        <tr>
                                            <th></th>
                                            <th>Título da sessão</th>
                                            <th>{{__('dashboard.created_at')}}</th>
                                            <th style="width: 85px;">{{__('dashboard.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($contact))                                            
                                            <tr>
                                                <td><span class="btnDrag mdi mdi-drag-horizontal font-22"></span></td>
                                                <td>{{isset($contact->name_section)?$contact->name_section:''}}</td>                                  
                                                <td>
                                                    @php
                                                        $locales = [
                                                            'pt' => 'd/m/Y H:i:s',
                                                            'en' => 'Y-m-d H:i A',          
                                                            'es' => 'Y-m-d H:i A',          

                                                        ];
                                                        $locale = session()->get('locale');
                                                    @endphp
                                                        @if ($contact && $contact->created_at)
                                                            @if (array_key_exists($locale, $locales))
                                                                {{$contact->created_at->format($locales[$locale])}}
                                                                @else
                                                                {{$contact->created_at->format('d/m/Y H:i:s')}}
                                                            @endif
                                                            @else
                                                            -
                                                        @endif
                                                </td>
            
                                                <td class="d-flex gap-lg-1 justify-center" style="padding: 18px 15px 0px 0px;">
                                                    @if (Auth::user()->hasRole('Super') || 
                                                    Auth::user()->can('usuario.tornar usuario master') || 
                                                    Auth::user()->can('contato.visualizar') &&
                                                    Auth::user()->can('contato.editar')) 
                                                        <button data-bs-toggle="modal" data-bs-target="#contact-edit-{{$contact->id}}" class="tabledit-edit-button btn btn-primary text-black" style="padding: 2px 8px;width: 30px"><span class="mdi mdi-pencil"></span></button>
                                                        <div class="modal fade" id="contact-edit-{{$contact->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="contact modal-dialog modal-dialog-centered" style="max-width: 100%;">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light">
                                                                        <h4 class="modal-title" id="myCenterModalLabel">{{__('dashboard.btn_edit')}}</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                                    </div>
                                                                    <div class="modal-body p-2 px-3 px-md-4">
                                                                        <form action="{{ route('admin.dashboard.contact.update', ['contact' => $contact->id]) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            @php
                                                                                $textareaId = $textareaId ?? 'text' . (isset($contact->id) ? $contact->id : '');
                                                                            @endphp

                                                                            <div class="row g-3">
                                                                                <h4 class="page-title">Informações da sessão</h4>
                                                                                <div class="col-12 mb-3">
                                                                                    <div class="card card-body my-0 p-0 p-md-3">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-lg-4 mb-3">
                                                                                                <label for="name_section" class="form-label">Nome da sessão</label>
                                                                                                <input type="text" name="name_section" class="form-control" id="name_section" value="{{ isset($contact)?$contact->name_section:'' }}" placeholder="Nome da sessão">
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-8 mb-3">
                                                                                                <label for="text_input" class="form-label">Texto</label>
                                                                                                <input type="text" name="text" class="form-control" id="text_input" value="{{ isset($contact)?$contact->text:'' }}" placeholder="Texto">
                                                                                            </div>
                                                                                            <div class="col-12 mt-3">
                                                                                                <label for="maps" class="form-label">Link mapa</label>
                                                                                                <input type="text" name="maps" class="form-control" id="maps" value="{{ isset($contact)?$contact->maps:'' }}" placeholder="Mapa">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <h4 class="page-title">Informações das redes Sociais</h4>
                                                                                <div class="col-12 mb-3">
                                                                                    <div class="card card-body my-0 p-0 p-md-3">
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-12 col-lg-8 mb-3">
                                                                                                <label for="name_section_social_media" class="form-label">Nome da sessão</label>
                                                                                                <input type="text" name="name_section_social_media" class="form-control" id="name_section_social_media" value="{{ isset($contact)?$contact->name_section_social_media:'' }}" placeholder="Nome da sessão">
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-4 mb-3">
                                                                                                <label for="mention" class="form-label">Menção</label>
                                                                                                <input type="text" name="mention" class="form-control" id="mention" value="{{ isset($contact)?$contact->mention:'' }}" placeholder="Menção">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-12 col-lg-6 mb-3">
                                                                                                <label for="link_insta" class="form-label">Link Instagram</label>
                                                                                                <input type="text" name="link_insta" class="form-control" id="link_insta" value="{{ isset($contact)?$contact->link_insta:'' }}" placeholder="Link Instagram">
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-6 mb-3">
                                                                                                <label for="link_x" class="form-label">Link X</label>
                                                                                                <input type="text" name="link_x" class="form-control" id="link_x" value="{{ isset($contact)?$contact->link_x:'' }}" placeholder="Link X">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-12 col-lg-6 mb-3">
                                                                                                <label for="link_youtube" class="form-label">Link Youtube</label>
                                                                                                <input type="text" name="link_youtube" class="form-control" id="link_youtube" value="{{ isset($contact)?$contact->link_youtube:'' }}" placeholder="Link Youtube">
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-6 mb-3">
                                                                                                <label for="link_face" class="form-label">Link Facebook</label>
                                                                                                <input type="text" name="link_face" class="form-control" id="link_face" value="{{ isset($contact)?$contact->link_face:'' }}" placeholder="Link Facebook">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-lg-6 mb-3">
                                                                                                <label for="link_tik_tok" class="form-label">Link Tik Tok</label>
                                                                                                <input type="text" name="link_tik_tok" class="form-control" id="link_tik_tok" value="{{ isset($contact)?$contact->link_tik_tok:'' }}" placeholder="Link Tik Tok">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <h4 class="page-title">Informações das Filiais</h4>

                                                                                <div class="col-12 col-lg-4 mb-3">
                                                                                    <div class="card card-body my-0 h-100 p-0 p-md-3">
                                                                                        <div class="mb-3">
                                                                                            <label for="name_one" class="form-label">Nome da filial 1</label>
                                                                                            <input type="text" name="name_one" class="form-control" id="name_one" value="{{ isset($contact)?$contact->name_one:'' }}" placeholder="Título">
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-12 col-lg-7 mb-3">
                                                                                                <label for="opening_hours_one" class="form-label">Horário de funcionamento</label>
                                                                                                <input type="text" name="opening_hours_one" class="form-control" id="opening_hours_one" value="{{ isset($contact)?$contact->opening_hours_one:'' }}" placeholder="Horário de funcionamento">
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-5 mb-3">
                                                                                                <label for="phone_one" class="form-label">Telefone</label>
                                                                                                <input type="text" name="phone_one" class="form-control" id="phone_one" value="{{ isset($contact)?$contact->phone_one:'' }}" placeholder="Telefone">
                                                                                            </div>
                                                                                        </div>
                                                                                        <label for="address_one" class="form-label">Endereço</label>
                                                                                        <textarea name="address_one" id="address_one-1" placeholder="Texto" class="form-control" rows="5">{!! isset($contact->address_one) ? $contact->address_one : '' !!}</textarea>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-lg-4 mb-3">
                                                                                    <div class="card card-body my-0 h-100 p-0 p-md-3">
                                                                                        <div class="mb-3">
                                                                                            <label for="name_two" class="form-label">Nome da filial 2</label>
                                                                                            <input type="text" name="name_two" class="form-control" id="name_two" value="{{ isset($contact)?$contact->name_two:'' }}" placeholder="Título">
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-12 col-lg-7 mb-3">
                                                                                                <label for="opening_hours_two" class="form-label">Horário de funcionamento</label>
                                                                                                <input type="text" name="opening_hours_two" class="form-control" id="opening_hours_two" value="{{ isset($contact)?$contact->opening_hours_two:'' }}" placeholder="Horário de funcionamento">
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-5 mb-3">
                                                                                                <label for="phone_two" class="form-label">Telefone</label>
                                                                                                <input type="text" name="phone_two" class="form-control" id="phone_two" value="{{ isset($contact)?$contact->phone_two:'' }}" placeholder="Telefone">
                                                                                            </div>
                                                                                        </div>
                                                                                        <label for="address_two" class="form-label">Endereço</label>
                                                                                        <textarea name="address_two" id="address_two-2" placeholder="Texto" class="form-control" rows="5">{!! isset($contact->address_two) ? $contact->address_two : '' !!}</textarea>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-12 col-lg-4 mb-3">
                                                                                    <div class="card card-body my-0 h-100 p-0 p-md-3">
                                                                                        <div class="mb-3">
                                                                                            <label for="name_three" class="form-label">Nome da filial 3</label>
                                                                                            <input type="text" name="name_three" class="form-control" id="name_three" value="{{ isset($contact)?$contact->name_three:'' }}" placeholder="Título">
                                                                                        </div>
                                                                                        <div class="row mb-3">
                                                                                            <div class="col-12 col-lg-7 mb-3">
                                                                                                <label for="opening_hours_three" class="form-label">Horário de funcionamento</label>
                                                                                                <input type="text" name="opening_hours_three" class="form-control" id="opening_hours_three" value="{{ isset($contact)?$contact->opening_hours_three:'' }}" placeholder="Horário de funcionamento">
                                                                                            </div>
                                                                                            <div class="col-12 col-lg-5 mb-3">
                                                                                                <label for="phone_three" class="form-label">Telefone</label>
                                                                                                <input type="text" name="phone_three" class="form-control" id="phone_three" value="{{ isset($contact)?$contact->phone_three:'' }}" placeholder="Telefone">
                                                                                            </div>
                                                                                        </div>
                                                                                        <label for="address_three" class="form-label">Endereço</label>
                                                                                        <textarea name="address_three" id="address_three-3" placeholder="Texto" class="form-control" rows="5">{!! isset($contact->address_three) ? $contact->address_three : '' !!}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                                                                       
  
                                                                            <div class="d-flex justify-content-end gap-2">
                                                                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">{{__('dashboard.btn_cancel')}}</button>
                                                                                <button type="submit" class="btn btn-primary text-black waves-effect waves-light">{{__('dashboard.btn_save')}}</button>
                                                                            </div>                                                                                                                      
                                                                        </form>                                                                    
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    @endif
                                                    @if (Auth::user()->hasRole('Super') || 
                                                    Auth::user()->can('usuario.tornar usuario master') || 
                                                    Auth::user()->can('contato.visualizar') &&
                                                    Auth::user()->can('contato.remover'))
                                                        <form action="{{route('admin.dashboard.contact.destroy',['contact' => $contact->id])}}" style="width: 30px" method="POST">
                                                            @method('DELETE') @csrf        
                                                            
                                                            <button type="button" style="width: 30px"class="demo-delete-row btn btn-danger btn-xs btn-icon btSubmitDeleteItem"><i class="fa fa-times"></i></button>
                                                        </form>                                                    
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const editors = ["address_one-1", "address_two-2", "address_three-3"];
    editors.forEach(function(id) {
        if (document.getElementById(id)) {
            CKEDITOR.replace(id);
        }
    });
});
</script>
@endsection
