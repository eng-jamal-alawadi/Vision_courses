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

            <h2 class="mb-4">All Registerations</h2>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Status</th>
                    <th>Register At</th>
                    <th>Actions</th>
                </tr>

                @forelse ( $data as $record )
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->user->name}}</td>
                    <td>{{$record->course->name}}</td>
                    <td>{!!$record->status ? '<span class="badge badge-success">Completed</span>' : '<span class="badge badge-warning">Not Completed</span>' !!}</td>
                    <td>{{$record->created_at->format('d_m_Y')}}</td>
                    <td>
                    <form action="{{route('registrations.destroy',$record->id)}}"
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
                    <th>No Registerations Found</th>
                </tr>
                @endforelse


            </table>
            {{$data->links()}}

        </div>
    </div>
</div>

@endsection
