<?php

use Illuminate\Database\Seeder;

class DepartamentsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('departaments')->insert([
                [
                    'title' => 'admin',
                    'description' => 'admin',
                    'logo' => '1.jpeg'
                ],
                [
                    'title' => 'managers',
                    'description' => 'managers of production sofware',
                    'logo' => '2.jpeg'
                ],
                ['title' => 'mobile developers',
                    'description' => 'ios mobile developers',
                    'logo' => '3.jpeg'
                ],
                ['title' => 'web developers',
                    'description' => 'web java  mobile developers',
                    'logo' => '4.jpeg'
                ],
                ['title' => 'destokp developers',
                    'description' => 'dest java  mobile developers',
                    'logo' => '5.jpeg'
                ],
                ['title' => 'testers ',
                    'description' => 'testers',
                    'logo' => '6.jpeg'
                ],
                ['title' => 'devops ',
                    'description' => 'devops project',
                    'logo' => '7.jpeg'
                ],
                [
                    'title' => 'directros',
                    'description' => 'directors',
                    'logo' => '8.jpeg'
                ],
                [
                    'title' => 'marketing',
                    'description' => 'marketing',
                    'logo' => '9.jpeg'
                ],
                ['title' => 'technique departament',
                    'description' => 'technique departament ',
                    'logo' => '10.jpeg'
                ],
                ['title' => 'juniors developers',
                    'description' => 'juniors developers',
                    'logo' => '11.jpeg'
                ],
                ['title' => 'chef',
                    'description' => 'cooking chef',
                    'logo' => '12.jpeg'
                ],
                ['title' => 'design mobile departaments ',
                    'description' => 'desiners',
                    'logo' => '13.jpeg'
                ],
                ['title' => 'designers web departaments ',
                    'description' => 'web designs',
                    'logo' => '14.jpeg'
                ],
                ['title' => 'Human resources deparataments',
                    'description' => 'Human resources',
                    'logo' => '15.jpeg'
                ]
        ]);
    }

}
