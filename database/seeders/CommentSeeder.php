<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Enrollment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $enrollments = Enrollment::all();

        foreach ($enrollments as $enrollment) {
            Comment::create([
                'user_id' => $enrollment->user_id,
                'course_id' => $enrollment->course_id,
                'message' => fake()->sentence(),
            ]);
        }
    }
}
