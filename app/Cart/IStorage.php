<?php

namespace App\Cart;

interface IStorage{

    function getValue($id);
    function setValue($id, $total, $price, $quantity);

    function reset();
    function delete($id);
    function total();
    function restore($id);
    function get();
}