@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Task View</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
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
            <th>Project Name</th>
            <th>Due Date</th>
            <th>description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($task_data as $tasks)
            <tr>
                <td>{{ $tasks->id }}</td>
                <td>{{ $tasks->name }}</td>
                <td>{{ $tasks->project->name ?? 'No Project' }}</td>
                <td>{{ \Carbon\Carbon::parse($tasks->due_date)->format('d-m-Y') }}</td>
                <td>{{ $tasks->description }}</td>
                <td>
                    <form action="{{ route('tasks.destroy', $tasks->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('tasks.edit', $tasks->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection