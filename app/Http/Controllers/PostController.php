<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::with('user')->withCount('comments')->get();
        return $post;
    }

    public function show(int $postId){
        $post = Post::with('comments.user')->findOrFail($postId);
        return $post;
    }
    
    public function postsWithoutComments(){
        $posts = Post::doesntHave('comments')->get();
        return $posts;
    }
}
