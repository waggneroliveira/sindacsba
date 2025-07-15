@php
    $textareaId = $textareaId ?? 'description' . (isset($announcement->id) ? $announcement->id : '');
@endphp

<div class="row">
    <div class="row col-lg-12">        
        <div class="mb-3">
            <label for="link" class="form-label">Link </label>
            <input type="text" name="link" class="form-control" id="link{{isset($announcement->id)?$announcement->id:''}}" value="{{isset($announcement)?$announcement->link:''}}" placeholder="Link">
        </div>
        
        <div class="mb-3">
            <div class="form-check">
                <input name="active" {{ isset($announcement->active) && $announcement->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($announcement->id)?$announcement->id:''}}" />
                <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
    </div>
    
    <div class="row col-lg-12">
        <div class="col-lg-6">
            <div class="mt-3">
                <label for="path_image" class="form-label">Imagem horizontal </label>
                <input type="file" name="path_image" data-plugins="dropify" data-default-file="{{isset($announcement)?$announcement->path_image<>''?url('storage/'.$announcement->path_image):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mt-3">
                <label for="path_image_vertical" class="form-label">Imagem vertical </label>
                <input type="file" name="path_image_vertical" data-plugins="dropify" data-default-file="{{isset($announcement)?$announcement->path_image_vertical<>''?url('storage/'.$announcement->path_image_vertical):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.getElementById("{{$textareaId}}")) {
            CKEDITOR.replace("{{$textareaId}}");
        }
    });
</script>