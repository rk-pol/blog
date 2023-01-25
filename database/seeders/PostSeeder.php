<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::factory()
            ->count(70)
            ->has(\App\Models\Comment::factory()
                ->count(5)
                ->state(function($attributes) {
                    return ['user_id' => \App\Models\User::all()->random()];
                })
            )->create();
    }
}
