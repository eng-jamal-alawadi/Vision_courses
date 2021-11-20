@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Add New Course</h2>
            @include('admin.layouts.errors')
                <form  action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder=" Course Name" name="name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder=" Course Price" value="{{old('price')}}" name="price">
                    </div>
                    <div class="mb-3">
                        <textarea name="content" placeholder="Content"   class="form-control" rows="7">{{old('content')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label >Image</label>
                        <input type="file" value={{old('content')}}class="form-control"  name="image">
                    </div>
                    <div class="mb-3">

                        <select name="category_id" class="form-control" >
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-info px-5">Add</button>
                </form>
        </div>
    </div>
</div>

@endsection
