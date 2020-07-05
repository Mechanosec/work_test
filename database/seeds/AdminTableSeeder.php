<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
           'login' => 'admin',
           'password' => md5(123),
           'auth_token' => md5(123),
        ]);
    }
}
