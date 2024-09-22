<!DOCTYPE html>
<html>

<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
</head>
<style>
    .container {
        max-width: 600px;
        display: block;
        margin: auto;
        padding: 10px;
    }

    .form-group label {
        font-weight: bold;
        margin: 10px;
        display: flex;
    }

    .form-control {
        border-radius: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        padding: 5px;
        margin: 10px;
        display: flex;
        width: 54%;
    }

    .btn-primary {
        background-color: #007bff;
        margin: 10px;
        border: none;
        width: 54%;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;

    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .invalid-feedback {
        color: red;
        margin: 10px;
    }
</style>

<body>

    <div class="container mt-5">
        <h1>Create New Task</h1>
        <form action="{{ route('update', $task->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $task->title }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control">{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" class="form-control" value="{{ $task->category }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority" class="form-control">
                    <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date" class="form-control" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="recurrence">Recurrence</label>
                <input type="text" id="recurrence" name="recurrence" class="form-control" value="{{ $task->recurrence }}">
            </div>
            
            <button type="submit"  class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>