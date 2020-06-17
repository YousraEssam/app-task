<?php

use App\User;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 5)->create();

        DB::table('doctors')->insert([
            [   'user_id' => '1',
                'speciality_id' => '1',
            ],
            [   'user_id' => '2',
                'speciality_id' => '2',
            ],
            [   'user_id' => '3',
                'speciality_id' => '3',
            ],
            [   'user_id' => '4',
                'speciality_id' => '4',
            ],
            [   'user_id' => '5',
                'speciality_id' => '5',
            ],
        ]);
    }
}
