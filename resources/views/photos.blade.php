<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container mt-5">
    <div class="search mb-3">
        <h3>All Categories</h3>
        <form class="d-flex me-auto ms-auto" action="{{route('all-photos')}}" method="GET">
            <select name="category" class="form-control" style="width: 250px" id="">
                <option disabled>All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                @endforeach
            </select>
            <button class="btn btn-success">Search</button>
        </form>
    </div>
    <div class="row">

        @if (count($photo) > 0)
            @foreach ($photo as $item)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a href="{{ route('view-photo-details', $item->id) }}">
                            <img src="{{ asset('gallery_main_images/' . $item->main_image) }}" alt="image"
                                class="img-fluid mb-4" />
                        </a>
                    </div>
            @endforeach
        @else
            <p class="text-danger text-center">No photo found</p>
        @endif

        <div class="paginate mt-3">
            {{ $photo->links() }}
        </div>
    </div>
</div>
@endsection