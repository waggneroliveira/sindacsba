<div class="row">
    <div class="mb-3 col-6 d-flex align-items-start flex-column">
        <label for="category-select" class="form-label">Categoria(s) <span class="text-danger">*</span></label>
        @php
            $currentCategory = isset($blog) ? $blog->blog_category_id : null;
        @endphp
    
        <select name="blog_category_id" class="form-select" id="category-select" required>
            <option value="" disabled selected>Selecione o Cliente</option>
            @foreach ($blogCategory as $categoryValue => $categoryLabel)
                <option value="{{ $categoryValue }}" {{ $categoryValue == $currentCategory ? 'selected' : '' }}>
                    {{ $categoryLabel }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3 col-6">
        <label for="date" class="form-label">Data de publicação</label>
        <input type="date" name="date" class="form-control" id="date{{isset($blog->id)?$blog->id:''}}" value="{{isset($blog)?$blog->date:''}}">
    </div>
</div>

<div class="mb-3 col-12">
    <label for="title" class="form-label">Título</label>
    <input type="text" name="title" class="form-control" id="title{{isset($blog->id)?$blog->id:''}}" value="{{isset($blog)?$blog->title:''}}" placeholder="Digite seu nome">
</div>

<div class="mb-3 col-12 d-flex align-items-start flex-column">
    <label for="{{ $textareaId }}" class="form-label">Texto</label>
    <textarea name="text" class="form-control col-12" id="{{ $textareaId }}" rows="5">
        {!!isset($blog)?$blog->text:''!!}
    </textarea>
</div>

<div class="col-lg-12">
    <div class="mt-3">
        <label for="path_image" class="form-label">Imagem</label>
        <input type="file" name="path_image" data-plugins="dropify" data-default-file="{{isset($blog)?$blog->path_image<>''?url('storage/'.$blog->path_image):'':''}}"  />
        <p class="text-muted text-center mt-2 mb-0">{{__('dashboard.text_img_size')}} <b class="text-danger">2 MB</b>.</p>
    </div>
</div>

<div class="mb-3">
    <div class="form-check">
        <input name="active" {{ isset($blog->active) && $blog->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($blog->id)?$blog->id:''}}" />
        <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
    <div class="form-check">
        <input name="super_highlight" type="checkbox" class="form-check-input" id="invalidCheck2{{isset($blog->id)?$blog->id:''}}" />
        <label class="form-check-label" for="invalidCheck2{{isset($blog->id)?$blog->id:''}}">Super destaque?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
    <div class="form-check">
        <input name="highlight" type="checkbox" class="form-check-input" id="invalidCheck3{{isset($blog->id)?$blog->id:''}}" />
        <label class="form-check-label" for="invalidCheck3{{isset($blog->id)?$blog->id:''}}">Destaque?</label>
        <div class="invalid-feedback">
            You must agree before submitting.
        </div>
    </div>
</div>

