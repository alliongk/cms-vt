@extends('layouts.app_back')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card card-xl-stretch">
            <div class="card-header align-items-center border-0 mt-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="fw-bolder mb-2 text-dark">Form : Edit</span>                  
                </h3>
            </div>
                <div class="card-body pt-5">
                    <form action="{{ route('home.forms.update',[$form->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <!--begin::Timeline-->
                    <!--begin::Timeline-->
                    <div class="mb-10">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('back/media/mountain.jpeg') }}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ Storage::url($form->path_logo) }})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel logo">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove logo">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        @error('logo')
                        <div class="invalid-feedback">  
                            <span class="text-danger">{{ $message }}</span>      
                        </div>   
                        @enderror  
                        <!--end::Hint-->
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Name VT</label>
                        <input type="text" name="nama_vt"  value="{{ $form->nama_vt }}" class="form-control form-control-solid @error('nama_vt') is-invalid @enderror" />
                        @error('nama_vt')
                        <div class="invalid-feedback">  
                            <span class="text-danger">{{ $message }}</span>      
                        </div>   
                        @enderror  
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Excerpt</label>
                        <input type="text" name="excerpt" value="{{ $form->excerpt }}" class="form-control form-control-solid @error('excerpt') is-invalid @enderror" />
                        @error('excerpt')
                        <div class="invalid-feedback">  
                            <span class="text-danger">{{ $message }}</span>      
                        </div>   
                        @enderror 
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Description</label>
                        <textarea class="form-control form-control-solid @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10">{{ $form->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">  
                            <span class="text-danger">{{ $message }}</span>      
                        </div>   
                        @enderror 
                    </div>
                    <div class="mb-10">        
                                <label for="status">Publish Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" {{ $form->status == 1 ? 'selected':'' }}>Publish</option>
                                    <option value="0" {{ $form->status == 0 ? 'selected':'' }}>Draft</option>
                                </select>
                    </div>
                    <div class="mb-10">
                        <label for="type_id" class="required form-label">Type VT</label>
                        <select class="form-select" name="type_id" id="type_id" aria-label="Select example" >
                            <option disabled selected>Select one!</option>
                            @foreach($tp as $type)
                                <option {{ $type->id == $form->type_id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                        <div class="invalid-feedback">
                            <span class="text-danger">{{ $message }}</span>  
                        </div>
                        @enderror 
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Link VT</label>
                        <input type="text" name="link_vt" value="{{ $form->link_vt }}" class="form-control form-control-solid @error('link_vt') is-invalid @enderror" />
                        @error('link_vt')
                        <div class="invalid-feedback">  
                            <span class="text-danger">{{ $message }}</span>      
                        </div>   
                        @enderror 
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">SEO tittle</label>
                        <input type="text" name="seo_tittle" value="{{ $form->seo_tittle }}" class="form-control form-control-solid @error('seo_tittle') is-invalid @enderror" />
                        @error('seo_tittle')
                        <div class="invalid-feedback">  
                            <span class="text-danger">{{ $message }}</span>      
                        </div>   
                        @enderror 
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">SEO description</label>
                        <input type="text" name="seo_desc" value="{{ $form->seo_desc }}" class="form-control form-control-solid @error('seo_desc') is-invalid @enderror" />
                        @error('seo_desc')
                        <div class="invalid-feedback">  
                            <span class="text-danger">{{ $message }}</span>      
                        </div>   
                        @enderror 
                    </div>
                    <div class="mb-10">
                        <button class="btn btn-primary " type="submit" > Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
