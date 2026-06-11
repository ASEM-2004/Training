<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userswithComments(){
        $users = User::has('comments','>',2)->get();
        return $users ;
    }

    public function userhasmanyprojects(){
        $users = User::doesntHave('projects')->get();
        return $users ;
    }     
}


