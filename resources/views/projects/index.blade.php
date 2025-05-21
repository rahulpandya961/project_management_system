@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Project View</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>price</th>
            <th>Due Date</th>
            <th>description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($project_data as $projects)
            <tr>
                <td>{{ $projects->id }}</td>
                <td>{{ $projects->name }}</td>
                <td>{{ $projects->price }}</td>
                <td>{{ \Carbon\Carbon::parse($projects->due_date)->format('d-m-Y') }}</td>
                <td>{{ $projects->description }}</td>
                <td>
                    <form action="{{ route('projects.destroy', $projects->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('projects.edit', $projects->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection