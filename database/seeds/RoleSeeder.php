<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['principle','teacher','student'];
        foreach ($data as $role){
            \App\Models\UserRole::create(['role' => $role]);
        }
    }
}
