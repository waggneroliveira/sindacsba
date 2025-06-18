@php
    $textareaId = $textareaId ?? 'description' . (isset($slide->id) ? $slide->id : '');
    $titleInputId = 'title' . (isset($slide->id) ? $slide->id : '');
@endphp

<div class="d-flex justify-content-between">
    <div class="row col-lg-6">
        <div class="mb-3">
            <label for="title" class="form-label">Título </label>
            <input type="text" name="title" class="form-control" id="{{$titleInputId}}" value="{{isset($slide)?$slide->title:''}}" placeholder="Título">
            <div class="mt-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="boldSelectionTitle()"><b>B</b></button>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="link" class="form-label">Link </label>
            <input type="text" name="link" class="form-control" id="link{{isset($slide->id)?$slide->id:''}}" value="{{isset($slide)?$slide->link:''}}" placeholder="Link">
        </div>
        
        <div class="row">    
            <div class="mb-3 col-12">
                <label for="{{$textareaId}}" class="form-label text-white">Descrição</label>
                <textarea name="description" id="{{$textareaId}}" placeholder="Texto" class="col-12" rows="10">
                    {!!isset($slide->description)?$slide->description: ''!!}
                </textarea>
            </div>
        </div>
        
        <div class="mb-3">
            <div class="form-check">
                <input name="active" {{ isset($slide->active) && $slide->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($slide->id)?$slide->id:''}}" />
                <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
    </div>
    
    <div class="row col-lg-6">
        <div class="col-lg-12">
            <div class="mt-3">
                <label for="title" class="form-label">Imagem desktop </label>
                <input type="file" name="path_image" data-plugins="dropify" data-default-file="{{isset($slide)?$slide->path_image<>''?url('storage/'.$slide->path_image):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mt-3">
                <label for="title" class="form-label">Imagem mobile </label>
                <input type="file" name="path_image_mobile" data-plugins="dropify" data-default-file="{{isset($slide)?$slide->path_image_mobile<>''?url('storage/'.$slide->path_image_mobile):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
    </div>
</div>

<script>
    function boldSelectionTitle() {
        var input = document.getElementById("{{$titleInputId}}")
        if (!input) return;
        var start = input.selectionStart;
        var end = input.selectionEnd;
        if (start === end) return; // nada selecionado
        var selected = input.value.substring(start, end);
        var before = input.value.substring(0, start);
        var after = input.value.substring(end);
        // Se já está em bold, remove
        if (selected.startsWith('<b>') && selected.endsWith('</b>')) {
            selected = selected.replace(/^<b>(.*)<\/b>$/i, '$1');
        } else {
            selected = '<b>' + selected + '</b>';
        }
        input.value = before + selected + after;
        // Ajusta seleção para o novo texto
        input.setSelectionRange(before.length, before.length + selected.length);
        input.focus();
    }
    document.addEventListener("DOMContentLoaded", function() {
        if (document.getElementById("{{$textareaId}}")) {
            CKEDITOR.replace("{{$textareaId}}");
        }
    });
</script>