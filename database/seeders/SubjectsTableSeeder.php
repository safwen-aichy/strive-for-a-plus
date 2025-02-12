<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder {
    public function run() {
        $subjects = [
            ['name' => 'Mathematics'],
            ['name' => 'Physics'],
            ['name' => 'Chemistry'],
            ['name' => 'Biology'],
            ['name' => 'English'],
            ['name' => 'Computer Science'],
            ['name' => 'History'],
            ['name' => 'Geography'],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
