<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'Software Development'],
            ['name' => 'Quality Assurance'],
            ['name' => 'Project Management'],
            ['name' => 'Business Analysis'],
            ['name' => 'IT Support'],
        ]);
    }
}
