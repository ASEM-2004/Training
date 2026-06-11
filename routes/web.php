<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Q1

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{postId}', [PostController::class, 'show']);

Route::get('/comments/{userId}',[CommentController::class, 'userComments']);

Route::get('/users',[UserController::class, 'userswithComments']);

Route::get('/posts/comments', [PostController::class, 'postsWithoutComments']);

//Q2

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/projects/{projectId}', [ProjectController::class, 'show']);

Route::get('/tasks/{userId}',[TaskController::class ,'userwithprojects']);

Route::get('/project',[ProjectController::class , 'projectswithtasks']);

Route::get('/users/no-projects',[UserController::class ,'userhasmanyprojects']);

Route::get('/project/done',[ProjectController::class ,'projecthasmanytasks']);


