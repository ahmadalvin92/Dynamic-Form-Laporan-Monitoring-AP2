<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'super admin'],
            ['id' => 2, 'name' => 'admin it non public'],
            ['id' => 3, 'name' => 'user it non public'],
            ['id' => 4, 'name' => 'admin data network'],
            ['id' => 5, 'name' => 'user data network'],
            ['id' => 6, 'name' => 'admin it aocc'],
            ['id' => 7, 'name' => 'user it aocc'],
        ]);
    }
}

