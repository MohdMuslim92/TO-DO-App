<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index()
    {
        // Retrieve all tasks for the authenticated user
        $tasks = Task::where('user_id', auth()->id())->get();
        return response()->json(['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        try {
            $newTask = new Task();
            $newTask->title = $request->input('title');
            $newTask->description = $request->input('description');
            $newTask->due_date = $request->input('dueDate');
            // 'user_id' is the authenticated user's ID
            $newTask->user_id = auth()->id();
            $newTask->save();

            return response()->json(['task' => $newTask]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Task creation failed'], 500);
        }
    }
}
