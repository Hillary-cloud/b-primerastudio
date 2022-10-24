<base href="/public">
@extends('layouts.base')
@section('content')
<<div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Edit Category</h3>
                    <span class="float-end"><a href="{{route('admin.categories')}}">All Categories</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <form action="{{route('admin.updateCategory',$category->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  name="name" value="{{$category->name}}">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control"  name="slug" value="{{$category->slug}}">
                            @error('slug')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection