<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="container">          
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit Photo</h3>
                    <span class="float-end"><a href="{{route('admin.photos')}}">All Photos</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="" for=""><h3><strong>Cover Photo</strong></h3></label>
            
                                        <img src="/gallery_main_images/{{$photo->main_image}}" alt="" style="display: block" width="250px" class="mt-2 img-responsive">
                                        {{-- <form action="{{route('admin.deleteMainImage',$property->id)}}" method="POST"  >
                                            <button class="btn btn-danger btn-sm mt-1">Delete</button>
                                            @csrf
                                            @method('delete')
                                        </form> --}}
                                </div>
                            </div>
                                <hr class="text-dark">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="" for=""><h3><strong>More Photos</strong></h3></label><br>
        
                                        @foreach ($images as $image)
                                            <img src="/gallery_sub_images/{{$image->image}}" width="200px" class="img-responsive mt-2" alt="">
                                            <form action="{{route('admin.deleteSubImage',$image->id)}}" method="POST"  >
                                                <button class="btn btn-danger btn-sm mt-1">Delete</button>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endforeach
                                </div>
                            </div>
                        
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <form action="{{route('admin.update-photo',$photo->id)}}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <label class="" for="">Category</label>
                                        <select name="category_id" class="form-control" id="">
                                            <option value="{{$photo->category_id}}">{{ucfirst($photo->category->name)}}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                            @endforeach
                                        </select>
                                            @error('category_id')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <em class="text-warning">Note: 1 stands for active and 0 stands for in-active</em>
                                        </div>
                                        
                                        <label class="" for="">Status</label>
                                        <select name="status" class="form-control" id="">
                                            <option value="{{$photo->status}}">{{$photo->status}}</option>
                                        <option value="1">1</option>
                                        <option value="0">0</option>
                                        </select>
                                            @error('status')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="main_image">Cover Photo</label>
                                        <input type="file" class="form-control" value="gallery_main_images/{{$photo->main_image}}" accept="image/*" name="main_image" >
                                        @error('main_image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">More Photo</label>
                                        <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                                    
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection