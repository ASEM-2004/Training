<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function userComments(int $userId){
        $comments = Comment::where('user_id',$userId)->with('post')->get();
        return $comments;
    }
}
