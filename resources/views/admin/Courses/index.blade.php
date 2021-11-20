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

            <h2 class="mb-4">All Courses</h2>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>

                @forelse ( $courses as $course )
                <tr>
                    <td>{{$course->id}}</td>
                    <td><img width="100" src="{{asset('uploads/'.$course->image)}}" alt=""></td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->price}} $</td>
                    <td>{{$course->category->name}}</td>
                    <td>{{$course->created_at->format('d_m_Y')}}</td>
                    <td><a href="{{route('courses.edit',$course->id)}}"
                        class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                    <form action="{{route('courses.destroy',$course->id)}}"
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
                    <th>No Courses Found</th>
                </tr>
                @endforelse


            </table>
            {{$courses->links()}}

        </div>
    </div>
</div>

@endsection
