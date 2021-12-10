<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user akses
        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'no_hp' =>  '0891234112',
            'alamat' => 'Kab.Banyuwangi',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
        ]);
        $user->assignRole('user');
        // admin akses
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'no_hp' =>  '0891234112',
            'alamat' => 'Kab.Banyuwangi',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
        ]);
        $admin->assignRole('admin');
    }
}
