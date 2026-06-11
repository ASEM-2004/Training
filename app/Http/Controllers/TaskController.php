<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function userwithprojects(int $userId){
        $tasks = Task::where('user_id', $userId)-> with('project')->get();
        return $tasks ;
    }
}
