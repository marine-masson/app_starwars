<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'title' => 'Lasers',
                'slug' => str_slug('Lasers'),
                'description' => 'La Categorie lasers',
            ],
            [
                'title' => 'Casques',
                'slug' => str_slug('Casques'),
                'description' => 'La Categorie Casques',
            ],
        ]);
    }
}
