@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Update Category</h2>
            @include('admin.layouts.errors')

                <form  action="{{route('categories.update',$category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input class="form-control" placeholder="Name" name="name" value="{{$category->name}}">
                    </div>
                    <button class="btn btn-info px-5">Update</button>
                </form>
        </div>
    </div>
</div>

@endsection
