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
}
