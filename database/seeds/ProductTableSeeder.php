<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class,15)->create()->each(function($product){
            $rangeRand = range(1, rand(2,5));
            $product->tags()->attach($rangeRand);
        });
    }
}
