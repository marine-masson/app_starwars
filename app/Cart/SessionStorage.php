<?php

namespace App\Cart;

class SessionStorage implements IStorage{

    protected $storage=[];

    public function __construct(){
        if(session()->has('cart')){
            $this->storage =session()->get('cart');
        }

    }

    public function getValue($id){

    }

    public function reset(){
        if(!empty($this->storage)){
            session()->forget('cart');
        }
    }

    public function setValue($id, $total, $price, $quantity){

            if(!empty($this->storage[$id]))
                $this->storage[$id]['total'] += $total;
            else
                $this->storage[$id]['total'] = $total;

            $this->storage[$id]['quantity'] = (int) $quantity;

            session()->put('cart', $this->storage);

            return;

    }

    public function restore($id){
        if(!empty($this->storage[$id])){
            unset($this->storage[$id]);
            session()->put('cart', $this->storage);
        }
    }

    public function total(){

        $total = 0;

        if(!empty($this->storage)){
            foreach($this->storage as $storage) $total += $storage['total'];
        }

        return $total;
    }

    public function delete($id){

    }

    public function get(){
        return $this->storage;
    }
}