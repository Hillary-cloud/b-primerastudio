@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="image-box">
        <img src="{{asset('assets/img/main-slider-1-1.jpg')}}" alt="" data-aos="fade-left" data-aos-duration="2000" style="width: 100%;" class="img-fluid">
    </div>
</div>

<div class="container py-2">
    <h3 class="text-center py-3" data-aos="fade-left"
        data-aos-duration="2000" style="color: rgb(175, 146, 73);">
        <strong>Our Services</strong>
        <hr />
    </h3>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4
            text-white" data-aos="fade-right" data-aos-duration="2000">
            <div class="text-center photo-logo">
                <i class="fa fa-camera fa-2x"></i>
            </div>
            <h5 class="text-center"><strong>Photography</strong></h5>
            <p class="text-center">
                Lorem ipsum, dolor sit amet consectetur adipisicing
                elit.
                Expedita doloremque alias sed culpa possimus suscipit
                quam
                reiciendis dicta rerum necessitatibus pariatur,
                veritatis,
                recusandae ullam facere mollitia libero similique ab
                maxime?
            </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4
            text-white" data-aos="fade-down" data-aos-duration="2000">
            <div class="text-center photo-logo">
                <i class="fa fa-video-camera fa-2x"></i>
            </div>
            <h5 class="text-center"><strong>Videography</strong></h5>
            <p class="text-center">
                Lorem ipsum, dolor sit amet consectetur adipisicing
                elit.
                Expedita doloremque alias sed culpa possimus suscipit
                quam
                reiciendis dicta rerum necessitatibus pariatur,
                veritatis,
                recusandae ullam facere mollitia libero similique ab
                maxime?
            </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4
            text-white" data-aos="fade-left" data-aos-duration="2000">
            <div class="text-center photo-logo">
                <i class="fa fa-users fa-2x"></i>
            </div>
            <h5 class="text-center"><strong>Event Coverage</strong></h5>
            <p class="text-center">
                Lorem ipsum, dolor sit amet consectetur adipisicing
                elit.
                Expedita doloremque alias sed culpa possimus suscipit
                quam
                reiciendis dicta rerum necessitatibus pariatur,
                veritatis,
                recusandae ullam facere mollitia libero similique ab
                maxime?
            </p>
        </div>
    </div>
    <hr />
</div>

<!-- photo Galleries -->
<div class="container py-2">
    <h3 class="text-center py-3" data-aos="fade-right"
        data-aos-duration="2000" style="color: rgb(175, 146, 73);">
        <strong>Photo Collage</strong>
        <hr />
    </h3>
    <div class="row">
        @foreach ($collages as $collage)
            <img data-aos="zoom-in" data-aos-duration="2000" width="100%" class="img-fluid" src="{{asset('collage_images/'.$collage->collage_image)}}" alt="image"  />
        @endforeach
        </div>
    <hr />
</div>

<!-- our collection -->
<div class="container py-2">
    <h3 class="text-center py-3" data-aos="fade-left"
        data-aos-duration="2000" style="color: rgb(175, 146, 73);">
        <strong>Our Collections</strong>
        <hr />
    </h3>
    <!-- <span class="float-left"><a href="">More Galleries</a></span> -->
    <div class="row">
        <a href="{{route('all-photos')}}" class="ml-auto" style="text-decoration: none; color:
            rgb(175, 146, 73);">More
            Photos <i class="fa fa-angle-double-right"></i></a>
        <div class="col" data-aos="fade-left" data-aos-duration="2000">
            <div class="owl-carousel property-carousel owl-theme">
                @foreach ($photos as $photo)
                <div class="card" >
                     <a href="{{route('view-photo-details',$photo->id)}}">
                         <img src="{{asset('/gallery_main_images/'.$photo->main_image)}}" alt="image"  />
                     </a>
                 </div>
                 @endforeach
            </div>
        </div>
    </div><hr>
</div>
@endsection
