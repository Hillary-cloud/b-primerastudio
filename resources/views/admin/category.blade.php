<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="container">
            <div class="card ">
                <div class="card-header">
                    <span class="float-end"><a href="{{route('admin.add-category')}}"><button class="btn btn-success">+</button></a></span>
                <h3 class="float-start">Categories</h3>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                            
                        <table class="table table-striped table-hover"> 
                            @if (count($categories) > 0)
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.editCategory',$category->id)}}"><i class="fa fa-edit fa-2x"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.deleteCategory', $category->id)}}" onclick="return confirm('You are about to delete this category')" style="margin-left: 10px;"><i class="fa fa-trash fa-2x"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                            <p class="text-center text-danger">No category found</p>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection