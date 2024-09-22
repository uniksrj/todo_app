<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use App\Notifications\Notification_msg;

class Todo_list extends Controller
{

    public function index(Request $request)
    {
        // Start the query builder
        $query = Todolist::query();

        // Filtering by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        // Filtering by priority if provided
        if ($request->has('priority')) {
            $query->where('priority', $request->input('priority'));
        }

        // Sorting by due date (ascending or descending)
        if ($request->has('sort_by_due_date')) {
            $query->orderBy('due_date', $request->input('sort_by_due_date'));
        }

        // Paginate the results (10 per page)
        $tasks = $query->paginate(10);

        // Return the view with paginated tasks
        return view('index', compact('tasks'));
    }


    public function create()
    {
        return view('create');
    }


    public function show(Todolist $task)
    {
        return view('edit', compact('task'));
    }

    // Add a new task
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'required|string|max:100',
            'priority'    => 'required|in:low,medium,high',
            'due_date'    => 'required|date|after_or_equal:today',
            'recurrence'  => 'nullable|string',
        ]);
        $task = Todolist::create($validatedData);
        return redirect()->route('index')->with('success', 'Task created successfully.');
        return response()->json($task, 201);
    }

    // Update an existing task
    public function update(Request $request, Todolist $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'required|date|after_or_equal:today',
            'is_completed' => 'boolean',
            'recurrence' => 'nullable|string',
        ]);
        $task->update($validatedData);
        return redirect()->route('index')->with('success', 'Task created successfully.');
        // return response()->json(['message' => 'Task updated successfully', 'task' => $task]);
    }

    // Delete a task
    public function destroy(Todolist $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }

    // Mark task as completed
    public function complete(Todolist $task)
{
    $task->update(['is_completed' => true]);
    // $user = $task->user; 
    // $user->notify(new Notification_msg($task));
    // redirect('index');
    return redirect()->route('index')->with('success', 'Complete status successfully.');
}

    // Get tasks by category
    public function tasksByCategory($category)
    {
        $tasks = Todolist::where('category', $category)->get();
        return response()->json($tasks);
    }
}
