<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::create(['name' => 'admin', 'email' => 'admin@espp.com', 'password' => bcrypt('admin12345')]);
        $admin->assignRole('admin');

        $petugas = User::create(['name' => 'petugas', 'email' => 'petugas@espp.com', 'password' => bcrypt
        ('admin12345')]);
        $petugas->assignRole('petugas');

    }
}
