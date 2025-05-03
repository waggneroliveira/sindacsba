<div class="mb-3">
    <label for="name" class="form-label">{{__('blades/configEmail.slide')}} <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control" id="name{{isset($slide->id)?$slide->id:''}}" value="{{isset($slide)?$slide->name:''}}" placeholder="Digite seu nome" required>
</div>

<div class="col-lg-12">
    <div class="mt-3">
        <input type="file" name="path_image" data-plugins="dropify" data-default-file="{{isset($slide)?$slide->path_image<>''?url('storage/'.$slide->path_image):'':''}}"  />
        <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
    </div>
</div>

<div class="row">
    <div class="mb-3 col-12">
        <label for="{{$textareaId}}" class="form-label text-white">Apresentação da Modelo</label>
        <textarea name="description" id="{{$textareaId}}" placeholder="Texto" class="col-12" rows="10">
            {!!isset($companion->description)?$companion->description: ''!!}
        </textarea>
    </div>
</div>

<div class="row">
    <div class="mb-3 col-12">
        <label for="{{$textareaId}}" class="form-label text-white">Apresentação da Modelo</label>
        <textarea name="description" id="{{$textareaId}}" placeholder="Texto" class="col-12" rows="10">
            {!!isset($companion->description)?$companion->description: ''!!}
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.getElementById("{{$textareaId}}")) {
            CKEDITOR.replace("{{$textareaId}}");
        }
    });
</script>