<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'Fachri',
            'username'=>'fachri',
            'email'=>'fachri.amin@gmail.com',
            'password'=>bcrypt('admin12345'),
        ]);
    }
}
