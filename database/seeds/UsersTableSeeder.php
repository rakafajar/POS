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
        DB::table('users')->insert(array(
            [
                'name' => 'Raka Fajar',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'level' => 1
            ],
            [
                'name' => 'Raka Fajar',
                'email' => 'raka@raka.com',
                'password' => bcrypt('raka'),
                'level' => 2
            ]
        ));
    }
}
