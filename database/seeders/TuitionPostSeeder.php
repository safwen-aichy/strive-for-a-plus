<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TuitionPost;
use App\Models\User;
use App\Models\Category;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TuitionPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {

        $faker = Faker::create();

        // Get all tutor users (assuming only tutors can create posts)
        $tutors = User::where('role', 'tutor')->pluck('id')->toArray();
        if (empty($tutors)) {
            return;
        }
        $categories = Category::pluck('id')->toArray();
        $subjects = Subject::pluck('id')->toArray(); // Fetching subject IDs
        
        // Insert 30 random tuition postings
        for ($i = 0; $i < 30; $i++) {
            TuitionPost::create([
                'subject_id' => $faker->randomElement($subjects), // Assign random subject from DB
                'fee' => $faker->randomFloat(2, 10, 100), // Generates a random fee between 10 and 100
                'max_students' => $faker->numberBetween(1, 10), // Random student count
                'category_id' => $faker->randomElement($categories), // Random category
                'user_id' => $faker->randomElement($tutors), // Random tutor
                'photo_path' => null, // No image for now
                'created_at' => $faker->dateTimeBetween('-6 months', 'now'), // Random past date
                'updated_at' => now(),
            ]);
        }
    }
}
