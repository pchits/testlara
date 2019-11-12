<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            'money_max' => 100,
            'money_min' => 10,
            'money_limit' => 20000,
            'mana_min' => 20,
            'mana_max' => 100,
            'conversion_coef' => 0.5
        ]);
    }
}
