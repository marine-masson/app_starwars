<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
            [
               'name' => 'Marine',
               'email' => 'marine.mas9@gmail.com',
               'password' => Hash::make('Marine')
            ],
            [
                'name' => 'Ngteric',
                'email' => 'ngteric@gmail.com',
                'password' => Hash::make('Ngteric')
            ],
        ]);
    }
}
