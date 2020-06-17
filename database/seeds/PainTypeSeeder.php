<?php

use Illuminate\Database\Seeder;

class PainTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pain_types')->insert([
            ['name' => 'p1'],
            ['name' => 'p2'],
            ['name' => 'p3'],
            ['name' => 'p4'],
            ['name' => 'p5'],
        ]);
    }
}
