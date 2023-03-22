@extends('layouts.app')
@section('content')
<style>
    .carousel-item img{
        width: auto;
        height: 245px;
        max-height: 245px;
        margin: auto; 
        display: block;
    }
</style>
<div class="container pb-4 pt-5 mt-5">
    <div class="row py-4 mb-2">
        <div class="col-md-3 order-2">
            <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'dots': false}">
                <div>
                    <div class="img-thumbnail border-0 p-0 d-block justify-content-center">
                        <img class="img-fluid border-radius-0" src="{{ Storage::url($form->path_logo) }}" alt="" style="max-width: 300px;max-height: 300px;">
                    </div>
                </div>
                <div>
                    <div class="img-thumbnail border-0 p-0 d-block justify-content-center">
                        <img class="img-fluid border-radius-0" src="{{ Storage::url($form->path_qr) }}" alt="" style="max-width: 300px;max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
            <div class="overflow-hidden">
                <h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $form->nama_vt }}</h2>
            </div>
            <div class="overflow-hidden mb-3">
                <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500" value="{{ $form->id }}">{{ $form->type->type }}</p>
            </div>
            <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">{{ $form->description }} </p>
            <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
            <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                <div class="col-lg-6">
                    <input type="text" value="{{ route('front.details-vt' , $form->slug )}}/" id="myInput" style="display: none;">
                    <a href="{{ $form->link_vt }}" target="_blank" data-hash="" data-hash-offset="0" data-hash-offset-lg="100" class="btn btn-dark font-weight-semi-bold px-4 btn-py-2 text-3">View VT Full <i class="fas fa-external-link-alt ms-1"></i></a>
                    <a onclick="myFunction()" class="btn btn-gradient-primary border-primary btn-effect-4 font-weight-semi-bold px-4 btn-py-2 text-3">
                        Copy Link 
                        <i class="fas fa-arrow-down ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-4 mb-2">
        <div class="owl-carousel carousel-center-active-item-3 dots-modern mt-2 mb-0" data-plugin-options="{'items': 1, 'loop': false, 'margin': 60, 'autoplay': true, 'autoplayTimeout': 6000, 'nav':true,'dots':false}" style="height: 991px;">
            <div>
                <div class="img-thumbnail border-0 p-0 d-block">
                    <iframe width="100%" height="640" style="width: 100%; height: 640px; border: none; max-width: 100%;" allow="xr-spatial-tracking; vr; gyroscope; accelerometer; fullscreen; autoplay; xr" scrolling="no" allowfullscreen="true"  frameborder="0" src="{{ $form->link_vt }}" allowvr="yes" ></iframe>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

@section('script')
<script>
    function myFunction() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      
      var tooltip = document.getElementById("myTooltip");
    }
    </script>
@endsection