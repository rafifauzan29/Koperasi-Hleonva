<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Dede Abdur Rafi Fauzan',
            'email' => 'rafi29@gmail.com',
            'password' => bcrypt('rafi2929'),
             'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        User::create([
            'name' => 'Rapsey',
            'email' => 'rapsey29@gmail.com',
            'password' => bcrypt('rapsey29'),
             'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now()
    ]);
    }
}
