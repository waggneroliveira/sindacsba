<div class="d-flex justify-content-between">
    <div class="row col-lg-12">
        <div class="mb-3">
            <label for="title" class="form-label">Título </label>
            <input type="text" name="title" class="form-control" id="{{isset($stack)?$stack->id:''}}" value="{{isset($stack)?$stack->title:''}}" placeholder="Título">
        </div>      
        <div class="col-lg-12">
            <div class="mt-3">
                <label for="title" class="form-label">Imagem</label>
                <input type="file" name="path_image" data-plugins="dropify" data-default-file="{{isset($stack)?$stack->path_image<>''?url('storage/'.$stack->path_image):'':''}}"  />
                <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
                <input name="active" {{ isset($stack->active) && $stack->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($stack->id)?$stack->id:''}}" />
                <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
    </div>
    
</div>
