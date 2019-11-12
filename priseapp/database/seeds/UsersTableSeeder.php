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
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'mana' => 10,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'mana' => 20,
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
