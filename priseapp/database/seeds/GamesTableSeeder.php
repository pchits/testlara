<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('games')->insert([
            'user_id' => 1,
            'prise_id' => NULL,
            'prise_type' => 'mana',
            'prise_value' => 10,
            'status' => 'NEW'
        ]);
    }
}
