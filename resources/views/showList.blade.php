<!-- resources/views/tasks/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>{{ $task->title }}</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Task Details</h5>

                <!-- Task Description -->
                <p class="card-text"><strong>Description:</strong> {{ $task->description ?? 'No description provided' }}</p>

                <!-- Task Category -->
                <p class="card-text"><strong>Category:</strong> {{ $task->category }}</p>

                <!-- Task Priority -->
                <p class="card-text"><strong>Priority:</strong>
                    @if($task->priority == 'high')
                        <span class="badge badge-danger">High</span>
                    @elseif($task->priority == 'medium')
                        <span class="badge badge-warning">Medium</span>
                    @else
                        <span class="badge badge-secondary">Low</span>
                    @endif
                </p>

                <!-- Task Due Date -->
                <p class="card-text"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d M, Y') }}</p>

                <!-- Task Recurrence -->
                <p class="card-text"><strong>Recurrence:</strong> {{ $task->recurrence ?? 'No recurrence set' }}</p>

                <!-- Task Completion Status -->
                <p class="card-text"><strong>Status:</strong> 
                    @if($task->is_completed)
                        <span class="badge badge-success">Completed</span>
                    @else
                        <span class="badge badge-danger">Pending</span>
                    @endif
                </p>

                
                <form action="{{ route('destroy', $task->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete Task</button>
                </form>
                <a href="{{ route('index') }}" class="btn btn-secondary mt-3">Back to Task List</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
