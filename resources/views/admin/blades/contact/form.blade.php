@php
    $textareaId = $textareaId ?? 'text' . (isset($contact->id) ? $contact->id : '');
@endphp

<div class="container">
    <div class="row">
        {{-- Sessão --}}
        <div class="col-12 mb-4">
            <h4 class="page-title">Informações da sessão</h4>
            <div class="card card-body">
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <label for="name_section" class="form-label">Nome da sessão</label>
                        <input type="text" name="name_section" class="form-control" id="name_section"
                            value="{{ $contact->name_section ?? '' }}" placeholder="Nome da sessão">
                    </div>
                    <div class="col-12 col-md-8">
                        <label for="text" class="form-label">Texto</label>
                        <input type="text" name="text" class="form-control" id="text"
                            value="{{ $contact->text ?? '' }}" placeholder="Texto">
                    </div>
                    <div class="col-12">
                        <label for="maps" class="form-label">Link mapa</label>
                        <input type="text" name="maps" class="form-control" id="maps"
                            value="{{ $contact->maps ?? '' }}" placeholder="Mapa">
                    </div>
                </div>
            </div>
        </div>

        {{-- Redes sociais --}}
        <div class="col-12 mb-4">
            <h4 class="page-title">Informações das redes sociais</h4>
            <div class="card card-body">
                <div class="row g-3">
                    <div class="col-12 col-md-8">
                        <label for="name_section_social_media" class="form-label">Nome da sessão</label>
                        <input type="text" name="name_section_social_media" class="form-control" id="name_section_social_media"
                            value="{{ $contact->name_section_social_media ?? '' }}" placeholder="Nome da sessão">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="mention" class="form-label">Menção</label>
                        <input type="text" name="mention" class="form-control" id="mention"
                            value="{{ $contact->mention ?? '' }}" placeholder="Menção">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="link_insta" class="form-label">Link Instagram</label>
                        <input type="text" name="link_insta" class="form-control" id="link_insta"
                            value="{{ $contact->link_insta ?? '' }}" placeholder="Link Instagram">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="link_x" class="form-label">Link X</label>
                        <input type="text" name="link_x" class="form-control" id="link_x"
                            value="{{ $contact->link_x ?? '' }}" placeholder="Link X">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="link_youtube" class="form-label">Link Youtube</label>
                        <input type="text" name="link_youtube" class="form-control" id="link_youtube"
                            value="{{ $contact->link_youtube ?? '' }}" placeholder="Link Youtube">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="link_face" class="form-label">Link Facebook</label>
                        <input type="text" name="link_face" class="form-control" id="link_face"
                            value="{{ $contact->link_face ?? '' }}" placeholder="Link Facebook">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="link_tik_tok" class="form-label">Link Tik Tok</label>
                        <input type="text" name="link_tik_tok" class="form-control" id="link_tik_tok"
                            value="{{ $contact->link_tik_tok ?? '' }}" placeholder="Link Tik Tok">
                    </div>
                </div>
            </div>
        </div>

        {{-- Filiais --}}
        <div class="col-12 mb-4">
            <h4 class="page-title">Informações das Filiais</h4>
            <div class="row g-4">
                @foreach ([1, 2, 3] as $i)
                    <div class="col-12 col-lg-4">
                        <div class="card card-body h-100">
                            <div class="mb-3">
                                <label for="name_{{ $i }}" class="form-label">Nome da filial {{ $i }}</label>
                                <input type="text" name="name_{{ $i }}" class="form-control" id="name_{{ $i }}"
                                    value="{{ $contact->{'name_'.$i} ?? '' }}" placeholder="Título">
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-12 col-md-7">
                                    <label for="opening_hours_{{ $i }}" class="form-label">Horário de funcionamento</label>
                                    <input type="text" name="opening_hours_{{ $i }}" class="form-control" id="opening_hours_{{ $i }}"
                                        value="{{ $contact->{'opening_hours_'.$i} ?? '' }}" placeholder="Horário">
                                </div>
                                <div class="col-12 col-md-5">
                                    <label for="phone_{{ $i }}" class="form-label">Telefone</label>
                                    <input type="text" name="phone_{{ $i }}" class="form-control" id="phone_{{ $i }}"
                                        value="{{ $contact->{'phone_'.$i} ?? '' }}" placeholder="Telefone">
                                </div>
                            </div>
                            <div>
                                <label for="address_{{ $i }}" class="form-label">Endereço</label>
                                <textarea name="address_{{ $i }}" id="address_{{ $i }}" placeholder="Texto" class="form-control" rows="5">{!! $contact->{'address_'.$i} ?? '' !!}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editors = ["address_one", "address_two", "address_three"];
        editors.forEach(function (id) {
            if (document.getElementById(id)) {
                CKEDITOR.replace(id);
            }
        });
    });
</script>
