@php
    $textareaId = $textareaId ?? 'text' . (isset($contact->id) ? $contact->id : '');
@endphp

<div class="row">
    <div class="row g-3 my-0">
        <h4 class="page-title">Informações da sessão</h4>
        <div class="col-12 col-lg-12 mb-3">
            <div class="card card-body h-100 my-0">
                <div class="row">
                    <div class="col-4">
                        <label for="name_section" class="form-label">Nome da sessão </label>
                        <input type="text" name="name_section" class="form-control" id="name_section" value="{{ isset($contact)?$contact->name_section:'' }}" placeholder="Nome da sessão">
                    </div>
                    <div class="col-8">
                        <label for="text" class="form-label">Texto </label>
                        <input type="text" name="text" class="form-control" id="text" value="{{ isset($contact)?$contact->text:'' }}" placeholder="Texto">
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <label for="maps" class="form-label">Link mapa </label>
                    <input type="text" name="maps" class="form-control" id="maps" value="{{isset($contact)?$contact->maps:''}}" placeholder="Mapa">
                </div>
            </div>
        </div> 
        <h4 class="page-title">Informações das redes Sociais</h4>
        <div class="col-12 col-lg-12 mb-3">
            <div class="card card-body h-100 my-0">
                <div class="row mb-3">
                    <div class="col-8">
                        <label for="name_section_social_media" class="form-label">Nome da sessão </label>
                        <input type="text" name="name_section_social_media" class="form-control" id="name_section_social_media" value="{{ isset($contact)?$contact->name_section_social_media:'' }}" placeholder="Nome da sessão">
                    </div>
                    <div class="col-4">
                        <label for="mention" class="form-label">Menção </label>
                        <input type="text" name="mention" class="form-control" id="text" value="{{ isset($contact)?$contact->mention:'' }}" placeholder="Menção">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="link_insta" class="form-label">Link Instagram </label>
                        <input type="text" name="link_insta" class="form-control" id="link_insta" value="{{ isset($contact)?$contact->link_insta:'' }}" placeholder="Link Instagram">
                    </div>
                    <div class="col-6">
                        <label for="link_x" class="form-label">Link X </label>
                        <input type="text" name="link_x" class="form-control" id="link_x" value="{{ isset($contact)?$contact->link_x:'' }}" placeholder="Link X">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="link_youtube" class="form-label">Link Youtube </label>
                        <input type="text" name="link_youtube" class="form-control" id="link_youtube" value="{{ isset($contact)?$contact->link_youtube:'' }}" placeholder="Link Youtube">
                    </div>
                    <div class="col-6">
                        <label for="link_face" class="form-label">Link Facebook </label>
                        <input type="text" name="link_face" class="form-control" id="link_face" value="{{ isset($contact)?$contact->link_face:'' }}" placeholder="Link Facebook">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="link_tik_tok" class="form-label">Link Tik Tok </label>
                        <input type="text" name="link_tik_tok" class="form-control" id="link_tik_tok" value="{{ isset($contact)?$contact->link_tik_tok:'' }}" placeholder="Link Tik Tok">
                    </div>
                </div>
            </div>
        </div> 
        <h4 class="page-title">Informações das Filiais</h4>
        <div class="col-12 col-lg-4 mb-0">
            <div class="card card-body h-100 my-0">
                <div class="mb-3">
                    <label for="name_one" class="form-label">Nome da filial 1 </label>
                    <input type="text" name="name_one" class="form-control" id="name_one" value="{{ isset($contact)?$contact->name_one:'' }}" placeholder="Título">
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-lg-7">
                        <label for="opening_hours_one" class="form-label">Horário de funcionamento</label>
                        <input type="text" name="opening_hours_one" class="form-control" id="opening_hours_one" value="{{ isset($contact)?$contact->opening_hours_one:'' }}" placeholder="Horário de funcionamento">
                    </div>
                    <div class="col-12 col-lg-5">
                        <label for="phone_one" class="form-label">Telefone</label>
                        <input type="text" name="phone_one" class="form-control" id="phone_one" value="{{ isset($contact)?$contact->phone_one:'' }}" placeholder="Telefone">
                    </div>
                </div>
                <div>
                    <label for="address_one" class="form-label">Endereço</label>
                    <textarea name="address_one" id="address_one" placeholder="Texto" class="form-control" rows="5">{!! isset($contact->address_one) ? $contact->address_one : '' !!}</textarea>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-0">
            <div class="card card-body h-100 my-0">
                <div class="mb-3">
                    <label for="name_two" class="form-label">Nome da filial 2 </label>
                    <input type="text" name="name_two" class="form-control" id="name_two" value="{{ isset($contact)?$contact->name_two:'' }}" placeholder="Título">
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-lg-7">
                        <label for="opening_hours_two" class="form-label">Horário de funcionamento</label>
                        <input type="text" name="opening_hours_two" class="form-control" id="opening_hours_two" value="{{ isset($contact)?$contact->opening_hours_two:'' }}" placeholder="Horário de funcionamento">
                    </div>
                    <div class="col-12 col-lg-5">
                        <label for="phone_two" class="form-label">Telefone</label>
                        <input type="text" name="phone_two" class="form-control" id="phone_two" value="{{ isset($contact)?$contact->phone_two:'' }}" placeholder="Telefone">
                    </div>
                </div>
                <div>
                    <label for="address_two" class="form-label">Endereço</label>
                    <textarea name="address_two" id="address_two" placeholder="Texto" class="form-control" rows="5">{!! isset($contact->address_two) ? $contact->address_two : '' !!}</textarea>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-0">
            <div class="card card-body h-100 my-0">
                <div class="mb-3">
                    <label for="name_three" class="form-label">Nome da filial 3 </label>
                    <input type="text" name="name_three" class="form-control" id="name_three" value="{{ isset($contact)?$contact->name_three:'' }}" placeholder="Título">
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-lg-7">
                        <label for="opening_hours_three" class="form-label">Horário de funcionamento</label>
                        <input type="text" name="opening_hours_three" class="form-control" id="opening_hours_three" value="{{ isset($contact)?$contact->opening_hours_three:'' }}" placeholder="Horário de funcionamento">
                    </div>
                    <div class="col-12 col-lg-5">
                        <label for="phone_three" class="form-label">Telefone</label>
                        <input type="text" name="phone_three" class="form-control" id="phone_three" value="{{ isset($contact)?$contact->phone_three:'' }}" placeholder="Telefone">
                    </div>
                </div>
                <div>
                    <label for="address_three" class="form-label">Endereço</label>
                    <textarea name="address_three" id="address_three" placeholder="Texto" class="form-control" rows="5">{!! isset($contact->address_three) ? $contact->address_three : '' !!}</textarea>
                </div>
            </div>
        </div>
    </div>    
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editors = ["address_one", "address_two", "address_three"];
        editors.forEach(function(id) {
            if (document.getElementById(id)) {
                CKEDITOR.replace(id);
            }
        });
    });
</script>
