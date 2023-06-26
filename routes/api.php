<?php

use App\Http\Controllers\{AuthController, ProjectController, TaskController};
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(ProjectController::class)->group(function (){
        Route::get('/projects', 'index');
        Route::post('/project/create', 'store');
        Route::get('/project/assigned', 'assigned_users');
        Route::get('/project/{project}', 'show');
        Route::put('/project/{project}/edit', 'update');
        Route::delete('/project/{project}/delete', 'destroy');
    });
    Route::controller(TaskController::class)->group(function (){
        Route::post('/project/task/create', 'store');
        Route::put('/project/task/update/{task}', 'update');
        Route::delete('/project/task/delete/{task}', 'destroy');
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'create']);
Route::post('/login', [AuthController::class, 'login']);

