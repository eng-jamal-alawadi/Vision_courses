@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">


            @section('script')
            <script>
                @if (session('success'))
                toastr.success("{{ session('success') }}")
                @endif
            </script>
        @stop

            <h2 class="mb-4">All Categories</h2>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>

                @forelse ( $categories as $category )
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at->format('d_m_Y')}}</td>
                    <td><a href="{{route('categories.edit',$category->id)}}"
                        class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                    <form action="{{route('categories.destroy',$category->id)}}"
                         method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Are you sure??')" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i></button>
                    </form>
                    </td>

                </tr>

                @empty
                <tr>
                    <th>No Categories Found</th>
                </tr>
                @endforelse


            </table>
            {{$categories->links()}}
        </div>
    </div>
</div>

@endsection
