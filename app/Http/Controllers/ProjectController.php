<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects =Project::with('user')->withCount('tasks')->get();
        return $projects ;
    }

    public function show(int $projectId){
        $projects =Project::with('tasks.user')->findOrFail($projectId);
        return $projects;
    }

    public function projectswithtasks(){
        $project =Project::whereHas('tasks',function($qr){
            $qr->where('status','done');
        })->get();
        return $project ;
    }

    public function projecthasmanytasks(){
        $project =Project::whereDoesntHave('tasks',function($qr){
            $qr->where('status', '!=', 'done');
        })->get();
        return $project ;
    }
}

