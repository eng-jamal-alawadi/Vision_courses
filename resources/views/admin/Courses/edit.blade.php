@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Update Course</h2>
            @include('admin.layouts.errors')
                <form  action="{{route('courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder=" Course Name" value="{{old('name',$course->name)}}" name="name">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder=" Course Price" value="{{old('price',$course->price)}}" name="price">
                    </div>

                    <div class="mb-3">
                        <textarea name="content" placeholder="Content"  class="form-control" rows="7">value="{{old('content',$course->content)}}"</textarea>
                    </div>

                    <div class="mb-3">
                        <label >Image</label>
                        <input type="file" class="form-control"  name="image">
                        <img width="200" class="mt-1" src="{{asset('uploads/'.$course->image)}}" alt="">
                    </div>

                    <div class="mb-3">
                        <select name="category_id" class="form-control" >
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$course->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-warning px-5">Update</button>
                </form>
        </div>
    </div>
</div>

@endsection
