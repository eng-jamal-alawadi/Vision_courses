@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Add New Category</h2>
            @include('admin.layouts.errors')
                <form  action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder="Name" name="name">
                    </div>
                    <button class="btn btn-info px-5">Add</button>
                </form>
        </div>
    </div>
</div>

@endsection
