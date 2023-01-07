<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin')
        ]);
        $user1 = User::create([
            'name' => 'Sekolah',
            'email' => 'sekolah@email.com',
            'password' => bcrypt('sekolah')
        ]);
        $user->assignRole('admin');
        $user1->assignRole('sekolah');
    }
}
