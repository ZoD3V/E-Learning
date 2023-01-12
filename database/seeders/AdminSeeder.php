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
        $userSekolah = Sekolah::create([
            'name' => 'Kodein',
            'email' => 'kodein@email.com',
            'npsn' => '201235386328',
            'kepala_sekolah' => 'Abu Faiz',
            'password' => bcrypt('kodein')
        ]);
        // $user = User::create([
        //     'name' => 'Administrator',
        //     'email' => 'admin@email.com',
        //     'password' => bcrypt('admin')
        // ]);
        // $user2 = User::create([
        //     'name' => 'siswa',
        //     'sekolah_id' => 1,
        //     'email' => 'siswa@email.com',
        //     'password' => bcrypt('siswa')
        // ]);
        // $user->assignRole('admin');
        $userSekolah->assignRole('sekolah');
        // $user2->assignRole('siswa');
    }
}
