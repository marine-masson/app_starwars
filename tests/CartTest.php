<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Product;

// TestCase configure phpunit pour Laravel

class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    private $cart;

    public function setUp(){
        parent::setUp();

        $this->cart = $this->app['App\Cart\Cart'];
    }

    public function testInstanceOfServiceCart(){
        $this->assertInstanceOf('App\Cart\Cart', $this->cart);
    }

//    public function testStorageEmpty(){
//        $this->assertEquals([], $this->cart->getCart());
//    }

    public function testCalculTotal(){
        Product::create(['name' => 'product one', 'price' => 200, 'quantity' => 5]);
    }

}
