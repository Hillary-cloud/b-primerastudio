<base href="/public">
@extends('layouts.base')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="container">          
            <div class="card">
                <div class="card-header">
                    <h3 class="float-start">Add Photo</h3>
                    <span class="float-end"><a href="{{route('admin.photos')}}">All Photos</a></span>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                    {{ session('message') }}
                    </div>
                    @endif
                    <form action="{{route('admin.store-photo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="form-group">
                            <label class="" for="">Category</label>
                            <select name="category_id" value="{{old('category_id')}}" class="form-control" id="">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                @endforeach
                            </select>
                                @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="main_image">Cover Photo</label>
                            <input type="file" class="form-control" name="main_image" >
                            @error('main_image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Photo</label>
                            <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                          
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function scrollToTop() {
            window.scrollTo(0, 0);
        }
    </script>

    <script>
        AOS.init();
    </script>
@endpush
@endsection