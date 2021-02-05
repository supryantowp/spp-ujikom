<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin12345')]
        ];

        DB::table('users')->insert($data);
    }
}
