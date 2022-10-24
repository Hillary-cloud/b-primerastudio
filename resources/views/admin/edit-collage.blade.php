<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="container">          
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit collage</h3>
                    <span class="float-end"><a href="{{route('admin.collages')}}">All collages</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                                <form action="{{route('admin.update-collage',$collage->id)}}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <div>
                                            <em class="text-warning">Note: 1 stands for active and 0 stands for in-active</em>
                                        </div>
                                        
                                        <label class="" for="">Status</label>
                                        <select name="status" class="form-control" id="">
                                            <option value="{{$collage->status}}">{{$collage->status}}</option>
                                        <option value="1">1</option>
                                        <option value="0">0</option>
                                        </select>
                                            @error('status')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="collage_image">Collage collage</label>
                                        <input type="file" class="form-control" value="collage_images/{{$collage->collage_image}}" accept="image/*" name="collage_image" >
                                        <img src="/collage_images/{{$collage->collage_image}}" alt="" style="display: block" width="250px" class="mt-2 img-responsive">
                                        @error('collage_image')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                 
                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection