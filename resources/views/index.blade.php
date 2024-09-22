<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All To-Do Tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <!-- <a href="{{ route('login') }}" class="btn btn-primary mt-5" style=" float: right; margin-right : 500px;">Login</a>
    <a href="{{ route('signup') }}" class="btn btn-primary mt-5" style=" float: right; margin-right : 5px;">Sign Up</a> -->
    <div class="container mt-5">
        <h1 class="mb-4">Your To-Do List</h1>   
        <a href="{{ route('create') }}" class="btn btn-primary mb-3">Create New Task</a>

        @if($tasks->isEmpty())
            <div class="alert alert-warning" role="alert">
                No tasks found! Start by creating a new one.
            </div>
        @else
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Priority</th>
                        <th>Due Date</th>
                        <th>Recurrence</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->category }}</td>
                            <td>
                                @if($task->priority == 'high')
                                    <span class="badge badge-danger">High</span>
                                @elseif($task->priority == 'medium')
                                    <span class="badge badge-warning">Medium</span>
                                @else
                                    <span class="badge badge-secondary">Low</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M, Y') }}</td>
                            <td>{{ $task->recurrence }}</td>
                            <td>
                                @if ($task->is_completed)
                                <span class="badge badge-success">Completed</span>
                            @else
                                <span class="badge badge-danger">Pending</span>
                                <form action="{{ route('complete', $task->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary btn-sm" type="submit">Mark as Completed</button>
                                </form>
                            @endif
                            </td>            
                            <td>
                                <a href="{{ route('edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                               
                                <form action="{{ route('destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure?')) { window.location.reload(); } else { return false; }">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        @endif
        {{ $tasks->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

