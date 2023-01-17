<?php

namespace Database\Seeders;

use App\Models\Sekolah;
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
        // $user2 = User::create([
        //     'name' => 'siswa',
        //     'sekolah_id' => 1,
        //     'email' => 'siswa@email.com',
        //     'password' => bcrypt('siswa')
        // ]);
        $user->assignRole('admin');
        // $user2->assignRole('siswa');
    }
}
