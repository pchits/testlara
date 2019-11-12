<?php

use Illuminate\Database\Seeder;

class PrisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('prises')->insert([
            'name' => 'Car',
            'quantity' => 10
        ]);
    }
}
