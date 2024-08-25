<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            ['name' => 'CRM System', 'department_id' => 1],
            ['name' => 'E-commerce Platform', 'department_id' => 1],
            ['name' => 'Website Redesign', 'department_id' => 2],
            ['name' => 'Client Portal', 'department_id' => 3],
            ['name' => 'Internal Tool', 'department_id' => 4],
        ]);
    }
}
