<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'role_id'  => Role::where('slug','super_admin')->first()->id,
            'name'     => 'Super Admin',
            'email'    => 'admin@app.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'status'   => true,
            'remember_token' => Str::random(10),
        ]);

        User::updateOrCreate([
            'role_id'  => Role::where('slug','user')->first()->id,
            'name'     => 'User',
            'email'    => 'user@app.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'status'   => true,
            'remember_token' => Str::random(10),
        ]);
    }
}
