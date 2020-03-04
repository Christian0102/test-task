<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@test.loc',
            'password' => bcrypt('password')
        ]);
        $this->factoryInsert();
    }

    private function factoryInsert() {
        factory(App\User::class,15)->create();
    }

}
