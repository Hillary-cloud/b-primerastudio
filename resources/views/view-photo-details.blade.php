<base href="/public">
@extends('layouts.base')
@section('content')
    {{-- Be like water. --}}
    <div class="container mt-5">
        <div class="header mb-2">
            {{-- <span class="float-start text-white"><h2>{{$photo->category->name}}</h2></span> --}}
            {{-- <span class="float-end"><a href="{{route('/')}}">Back</a></span> --}}
        </div><br><br>
        <div class="row">
            <div class="cover-photo" data-aos="fade-left" data-aos-duration="2000">
                <img src="{{asset('gallery_main_images')}}/{{$photo->main_image}}" alt="image" width="500px" class="img-fluid" />
            </div>
        </div><br>

        <div class="row">
            
            @foreach ($images as $item)
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="div" data-aos="fade-right" data-aos-duration="2000">
                    <img src="{{asset('gallery_sub_images')}}/{{$item->image}}" width="400px" alt="image" class="img-fluid" />
                </div><br>
            </div>
            @endforeach
        </div>
    
    </div>

@endsection