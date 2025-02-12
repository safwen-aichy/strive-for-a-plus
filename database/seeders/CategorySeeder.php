<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Primary', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lower Secondary', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Upper Secondary', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

