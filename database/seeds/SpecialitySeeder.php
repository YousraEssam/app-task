<?php

use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->insert([
            ['name' => 's1'],
            ['name' => 's2'],
            ['name' => 's3'],
            ['name' => 's4'],
            ['name' => 's5'],
        ]);
    }
}
