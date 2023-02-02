<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::factory([
            'name' => "Robert Duchmol",
            'email' => "robert.duchmol@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('GrosSecret'),
            'admin' => true,
            'remember_token' => Str::random(10),
        ])->create();
        User::factory(3)->create();
    }
}
