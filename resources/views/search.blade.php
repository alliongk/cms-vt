@extends('layouts.app')
@section('content')
<style>
    .owl-dots.disabled{
        margin-top: 0px !important;
    }
</style>



<section id="project" class="container py-2">
    <div class="row pt-4 mt-5 ">
        <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter">
           <a href="{{ url('search') }}"><h2 class="font-weight-bold mb-1">Project</h2>   </a>       
        </div>
    </div>

    <div class="row pt-1 mt-1 mb-3">
        <div class="col text-center">
            <div class="header-nav-features">										
                <div class="header-nav-feature header-nav-features-search d-inline-flex">	
                    <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">			
                        <form action="" method="get">		
                    <div class="simple-search input-group">					
                            <input class="form-control text-1" name="keyword" type="text" placeholder="Search...">														
                        <button class="btn">															
                            <i class="fas fa-search header-nav-top-icon"></i>														
                        </button>													
                    </div>												
                        </form>											
            </div>										
        </div>										
        </div>
    </div>
    </div>

    <div class="row">
        @forelse ($forms as $form)
        <div class="col-lg-4 col-md-6 mb-4">
            <article class="post post-large pb-5">
                <div class="post-image text-center">
                    <a href="{{ route('front.details-vt', $form->slug ) }}">
                        <img src="{{ Storage::url($form->path_logo) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" style="width: 200px;height: 200px;object-fit: contain;">
                    </a>
                </div>
                <div class="post-content">
            
                    <h4><a href="{{ route('front.details-vt' , $form->slug )}}" class="text-decoration-none">{{ $form->nama_vt }}</a></h4>
                    <span class="text-2 mb-0" value="{{ $form->slug }}">{{ $form->type->type }}</span>
                    <p class="mb-1">{{ $form->excerpt }}</p>
                    <a href="{{ route('front.details-vt' , $form->slug )}}" class="read-more btn btn-primary">read more <i class="fas fa-chevron-right text-1 ms-1"></i></a>
            
                </div>
            </article>
        </div>
        @empty
            <div class="alert alert-danger">
                Data form belum Tersedia.
            </div>
        @endforelse
        {{ $forms ->links() }}
    </div>
</section>

@endsection