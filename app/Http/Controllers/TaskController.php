<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return response()->json($request->user()->tasks);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        
        $task = $request->user()->tasks()->create([
            'title' => $request->title,
            'completed' => false
        ]);

        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        if ($request->user()->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy(Request $request, Task $task)
    {
        if ($request->user()->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}
