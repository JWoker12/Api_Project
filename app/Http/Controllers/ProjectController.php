<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth('sanctum')->user()->role === 'admin') {
            return ProjectResource::collection(Project::all());
        }
        return ProjectResource::collection(User::find(Auth::user()->id)->projectAssigned);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'dead_line' => $request->dead_line,
            'user_id' => auth('sanctum')->user()->id
        ]);
        return response()->json([
            'status' => true,
            'class' => 'success',
            'message' => 'Project creted successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = new ProjectResource($project);
        return response()->json([
            'status' => true,
            'class' => 'success',
            'data' => $project
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Project updted successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Project::whereId($project->id)->with('tasks')->delete();
        return response()->json([
            'status' => true,
            'message' => 'Project deleted successfully'
        ], 200);
    }

    public function assigned_users(){
        $users = UserResource::collection(User::all());
        return response()->json([
            'status' => true,
            'data' => $users
        ], 200);
    }
}
