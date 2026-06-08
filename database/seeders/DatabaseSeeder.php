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

        $users = User::factory()->count(5)->create();
                foreach ($users as $user) {
        $posts = Post::factory()->count(3)->for($user)->create();
                foreach ($posts as $post) {
        Comment::factory()->count(4)->create([
                'post_id' => $post->id,
                'user_id' => $users->random()->id,
        ]);
        }}

        User::factory()->count(4)->has(
        Project::factory()->count(3)->has(
        Task::factory()->count(5)->state(function (array $attributes, Project $project) {
        return ['user_id' => $project->user_id];})
        )
        )->create();
    }
}


// $users = User::factory()->count(5)->create();
        // $users->each(function ($user) use ($users) {
        // $posts = Post::factory()->count(3)->for($user)->create();
        // $posts->each(function ($post) use ($users) {
        //     Comment::factory()->count(4)->create([
        //             'post_id' => $post->id,
        //             'user_id' => $users->random()->id,
        //             ]);
        //     });
        // });
        

// User::factory()->count(5)->has(
        // Post::factory()->count(3)->has(
        // Comment::factory()->count(4)->state(function (array $attributes, Post $post) {
        //     return [
        //     'user_id' =>User::inRandomOrder()->first()->id,
        //     ];
        //     })
        // )
        // )->create();


// User::factory()->count(5)->has(
        // Post::factory()->count(3)->has(
        // Comment::factory()->count(4)
        // )
        // )->create();


// $users = User::factory()->count(5)->create();
        // User::factory()->count(5)->has(
        // Post::factory()->count(3)->has(
        // Comment::factory()->count(4)->state(function (array $attributes) use ($users) {
        //     return [
        //         'user_id' => $users->random()->id,
        //         ];
        //         })
        // )
        // )->create();

      