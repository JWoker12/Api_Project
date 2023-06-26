<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(TaskRequest $request){
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'state' => $request->state,
            'project_id' => $request->project_id,
            'user_id' => auth('sanctum')->user()->id,
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Task creted successfully'
        ], 200);
    }
    public function destroy(Task $task){
        $task->delete();
        return response()->json([
            'status' => true,
            'message' => 'Task deleted successfully'
        ], 200);
    }
}
