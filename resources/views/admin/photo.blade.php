<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card ">
                <div class="card-header">
                    <h3 class="float-start">Photos</h3>
                    <span ><a href="{{ route('admin.add-photo') }}"><button
                                class="btn btn-success">+</button></a></span>
                                <div class="search mb-3">
                                    <h3>All Categories</h3>
                                    <form class="d-flex me-auto ms-auto" action="{{route('admin.photos')}}" method="GET">
                                        <select name="category" class="form-control" style="width: 250px" id="">
                                            <option disabled>All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-success">Search</button>
                                    </form>
                                </div>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            @if (count($photos) > 0)
                                <thead>
                                    <tr>
                                        {{-- <th>id</th> --}}
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($photos as $photo)
                                        <tr>
                                            {{-- <td>{{$photo->id}}</td> --}}
                                            <td><img src="/gallery_main_images/{{$photo->main_image}}" width="50px" class="img-responsive" alt=""></td>
                                            <td>{{ $photo->status }}</td>
                                            <td>{{ $photo->category->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.view-photo', $photo->id) }}"><i
                                                        class="fa fa-eye fa-2x"></i></a>
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.edit-photo', $photo->id) }}"><i
                                                        class="fa fa-edit fa-2x"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.deletePhoto',$photo->id)}}" method="post">
                                                    <button class="ml-1" onclick="return confirm('You are about to delete this photo')"><i class="fa fa-trash fa-2x text-danger"></i></button>                                            
                                                    @csrf
                                                    @method('delete')
                                                    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p class="text-center text-danger">No photo found</p>
                            @endif
                        </table>
                        <div>
                            {{ $photos->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection