<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(5)->has(
        Post::factory()->count(3)->has(
        Comment::factory()->count(4) 
        )
        )->create();

        
        User::factory()->count(4)->has(
        Project::factory()->count(3)->has(
        Task::factory()->count(5)    
        )    
        )->create();
    }
}
