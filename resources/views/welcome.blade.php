@extends('layouts.app')
@section('content')
<style>
    .owl-dots.disabled{
        margin-top: 0px !important;
    }
</style>
<div class="owl-carousel carousel-center-active-item-3 dots-modern mt-2 mb-0" data-plugin-options="{'items': 1, 'loop': true, 'margin': 60, 'autoplay': true, 'autoplayTimeout': 6000, 'nav':true,'dots':false}" style="height: 991px;">
    <div>
        <div class="img-thumbnail border-0 p-0 d-block">
            <img class="img-fluid border-radius-0" src="{{  asset('front/img/Panosphere1.jpg') }}" alt="">
        </div>
    </div>
</div>
<section id="services" class="section section-height-3 bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn">
    <div class="container my-3">
        <div class="row mb-5">
            <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                <h2 class="font-weight-bold text-color-light mb-2">Virtual Tour Services</h2>
                <p class="text-color-light opacity-7">
                    360 Virtual Tour adalah simulasi akurat dari suatu lokasi yang dapat dilihat secara 360 derajat.
                    Virtual Tour berbasis website jadi dapat diakses kapan saja dan dimana saja.
                    360 Virtual Tour menghadirkan sebuah pengalaman unik dan praktis yang menjangkau lebih banyak viewers dengan cara mudah karena aksesibel melalui smartphone.
                </p>
            </div>
        </div>
        <div class="row mb-lg-4">
            <div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
                <div class="feature-box feature-box-style-2">
                    <div class="fa-3x">
                        <i class="fa-solid fa-map-location-dot text-color-light"></i>
                    </div>
                    <div class="feature-box-info">
                        <h4 class="font-weight-bold text-color-light text-4 mb-2">Integrasi Google Map</h4>
                        <p class="text-color-light opacity-7" style="text-align: justify">
                            Selain melalui website, Virtual Tour juga dapat diakses melalui Google Maps.
                            Google menyediakan vitur 360 dimana kita dapat mengintegrasikan Virtual Tour kami.
                            Intergrasi tersebut menambah daya tarik kepada viewers yang mengakses melalui Google Maps,
                            sehingga membuka banyak peluang untuk Virtual Tour dapat diakses.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter">
                <div class="feature-box feature-box-style-2">
                    <div class="fa-3x"> 
                        <i class="fa-solid fa-vr-cardboard text-color-light"></i>
                    </div>
                    <div class="feature-box-info">
                        <h4 class="font-weight-bold text-color-light text-4 mb-2">Aerial Virtual Tour</h4>
                        <p class="text-color-light opacity-7" style="text-align: justify">
                            Merupakan Virtual Tour yang kami buat dari udara dengan menggunakan teknologi drone.
                            VT ini merupakan solusi bagi lokasi yang memiliki kawasan luas atau landscape untuk dapat dilihat udara.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">
                <div class="feature-box feature-box-style-2">
                    <div class="fa-3x">
                        <i class="fa-brands fa-instagram text-color-light"></i>
                    </div>
                    <div class="feature-box-info">
                        <h4 class="font-weight-bold text-color-light text-4 mb-2">Menerapkan Virtual Tour Melalui Filter Instagram</h4>
                        <p class="text-color-light opacity-7" style="text-align: justify">
                            Selain dapat diakses melalui website, Virtual Tour yang kami buat dapat dimasukkan ke halaman instagram sebagai filter.
                            Penerapan filter 360 pada instagram akan memberikan pengalaman unik dan daya tarik lebih kepada pengunjung instagram.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<div id="project" class="container py-2">
    <div class="row pt-1 mt-1 mb-3">
        <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter">
            <h2 class="font-weight-bold mb-1">Project</h2>         
        </div>
    </div>

    <div class="row pt-1 mt-1 mb-3">
        <div class="col text-center">
            <div class="header-nav-features">										
                <div class="header-nav-feature header-nav-features-search d-inline-flex">	
                    <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">			
                        <form action="{{ url('search') }}" method="get">		
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
</div>

<section id="contact" class="section bg-primary border-0 m-0">
    <div class="container">
        <div class="row justify-content-center text-center text-lg-start py-4">
            <div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter">
                <div class="feature-box feature-box-style-2 d-block d-lg-flex mb-4 mb-lg-0">
                    <div class="feature-box-icon">
                        <i class="fa-regular fa-paper-plane text-color-light"></i>
                    </div>
                    <div class="feature-box-info ps-1">
                        <h5 class="font-weight-light text-color-light opacity-7 mb-0">EMAIL US NOW</h5>
                        <a href="mailto:daya.handika@harma-digital.com" class="text-color-light font-weight-semibold mb-0 text-decoration-none">daya.handika@harma-digital.com</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                <div class="feature-box feature-box-style-2 d-block d-lg-flex mb-4 mb-lg-0 px-xl-4 mx-lg-5">
                    <div class="feature-box-icon">
                        <i class="icon-call-out icons text-color-light"></i>
                    </div>
                    <div class="feature-box-info ps-1">
                        <h5 class="font-weight-light text-color-light opacity-7 mb-0">CALL US NOW</h5>
                        <a href="tel:+8001234567" class="text-color-light font-weight-semibold text-decoration-none">+62 857-2517-9548</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                <div class="feature-box feature-box-style-2 d-block d-lg-flex">
                    <div class="feature-box-icon">
                        <i class="icon-share icons text-color-light"></i>
                    </div>
                    <div class="feature-box-info ps-1">
                        <h5 class="font-weight-light text-color-light opacity-7 mb-0">FOLLOW US</h5>
                        <p class="mb-0">
                            <span class="social-icons-instagram "><a style="text-decoration: none;" href="https://www.instagram.com/harma.digital/?hl=id" target="_blank" class="text-color-light font-weight-semibold" title="Linkedin"><i class="me-1 fab fa-instagram"></i> INSTAGRAM</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection