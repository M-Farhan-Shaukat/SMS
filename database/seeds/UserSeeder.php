<?php

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
        \App\Models\User::create([
            'id'=>\Illuminate\Support\Str::uuid(),
            'name' => 'Principle',
            'email' => 'principle@sms.com',
            'username' => 'principle',
            'role'=>1,
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
    }
}
