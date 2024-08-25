<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubProjectSeeder extends Seeder
{
    public function run()
    {
        DB::table('sub_projects')->insert([
            ['name' => 'User Management', 'project_id' => 1],
            ['name' => 'Payment Gateway Integration', 'project_id' => 2],
            ['name' => 'UI/UX Overhaul', 'project_id' => 3],
            ['name' => 'API Development', 'project_id' => 4],
            ['name' => 'Database Migration', 'project_id' => 5],
        ]);
    }
}
