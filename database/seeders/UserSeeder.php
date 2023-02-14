<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'password' => bcrypt('admin'),
            'sekolah_id' => 1,
        ]);
        $user->assignRole('admin');
    }
}
