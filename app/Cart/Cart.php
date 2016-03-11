<?php
/**
 * Created by PhpStorm.
 * User: Marine
 * Date: 18/02/2016
 * Time: 14:24
 */

namespace App\Cart;


class Cart {

    private $cart;
    protected $storage;

    public function __construct(IStorage $storage){
        $this->storage = $storage;
    }

    public function buy($product, $quantity){
        $total = $product->price * ((int)$quantity);
        $this->storage->setValue($product->id, $total, $product->price, $quantity);
    }

    public function reset(){
        $this->storage->reset();
    }

    public function restore($id){
        $this->storage->restore($id);
    }

    public function get(){
        return $this->storage->get();
    }

    public function total(){
        return $this->storage->total();
    }
}