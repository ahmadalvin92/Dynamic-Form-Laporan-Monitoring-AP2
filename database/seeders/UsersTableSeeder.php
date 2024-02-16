<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'alvin',
                'password' => '$2y$12$VBbo3rSQo3iS.Jp31GoU1.x1cDHE0lBSWuKGrBuUURw8zNMDlkW86',
                'name' => 'alvin',
                'email' => 'ahmadalvin92@gmail.com',
                'nip' => '24060121140106',
                'unit' => 'super-admin',
                'bio' => 'Saya suka mobil',
                'role' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'devin',
                'password' => '$2y$12$VBbo3rSQo3iS.Jp31GoU1.x1cDHE0lBSWuKGrBuUURw8zNMDlkW86',
                'name' => 'devin',
                'email' => 'devin@gmail.com',
                'nip' => '24060121140158',
                'unit' => 'admin-it-non-public',
                'bio' => 'Saya suka motor',
                'role' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'fikri',
                'password' => '$2y$12$VBbo3rSQo3iS.Jp31GoU1.x1cDHE0lBSWuKGrBuUURw8zNMDlkW86',
                'name' => 'fikri',
                'email' => 'fikri@gmail.com',
                'nip' => '1923918239',
                'unit' => 'user-it-non-public',
                'bio' => 'Saya suka komputer',
                'role' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'bryan',
                'password' => '$2y$12$VBbo3rSQo3iS.Jp31GoU1.x1cDHE0lBSWuKGrBuUURw8zNMDlkW86',
                'name' => 'bryan bonifasius',
                'email' => 'bryan@gmail.com',
                'nip' => '0987654321',
                'unit' => 'admin-data-network',
                'bio' => 'Saya suka makan',
                'role' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'boy',
                'password' => '$2y$12$VBbo3rSQo3iS.Jp31GoU1.x1cDHE0lBSWuKGrBuUURw8zNMDlkW86',
                'name' => 'boy',
                'email' => 'boy@gmail.com',
                'nip' => '1122334455',
                'unit' => 'user-data-network',
                'bio' => 'Saya suka nonton film',
                'role' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'nathan',
                'password' => '$2y$12$VBbo3rSQo3iS.Jp31GoU1.x1cDHE0lBSWuKGrBuUURw8zNMDlkW86',
                'name' => 'nathan',
                'email' => 'nathan@gmail.com',
                'nip' => '1122334455',
                'unit' => 'admin-it-aocc',
                'bio' => 'Saya suka nonton gyn',
                'role' => '6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'ihsan',
                'password' => '$2y$12$VBbo3rSQo3iS.Jp31GoU1.x1cDHE0lBSWuKGrBuUURw8zNMDlkW86',
                'name' => 'nathan',
                'email' => 'nathan@gmail.com',
                'nip' => '1122334455',
                'unit' => 'user-it-aocc',
                'bio' => 'Saya suka nonton gyn',
                'role' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

