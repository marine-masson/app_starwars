<?php

namespace App\Http\Controllers;


use Mail;
use App\User;
use App\Product;
use App\History;
use App\Category;
use App\Cart\Cart;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    public function index(){
        $products = Product::with('tags','picture','category')->paginate(10);
        return view('front.index',compact('products'));
    }

    public function show($id, $slug=''){
        $product = Product::find($id);
            return view('front.show',compact('product'));
    }

    public function category($id, $slug=''){
        $category = Category::find($id);
            return view('front.category', compact('category'));
    }

    public function contact(){
        return view('front.contact');
    }

    public function sendContact(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'message' => 'required|max:255'
        ]);

        $data = $request->all();
        $msg = $data['message'];

        Mail::send('emails.contact', compact('msg'), function($m) use($data){
            $m->from($data['email'],'app web');
            $m->to(env('EMAIL_TECHN'), 'admin')->subject('Contact app web');
        });

        return redirect('contact')->with([
            'msg' => "Votre email est envoyé",
            'alert' => 'success'
        ]);
    }

    public function storeProduct(Request $request, Cart $cart){

        $this->validate($request, [
            'quantity' => 'required|numeric',
            'id' => 'required|integer'
        ]);


        $product = Product::find($request->input('id'));

        $cart->buy($product, $request->input('quantity'));

        return back();

    }

    public function reset(Cart $cart){
        $cart->reset();

        return;
    }

    public function restoreProduct($id, Cart $cart){
        $cart->restore($id);

        return redirect('cart')->with('message', 'product restore');
    }

    public function showCart(Cart $cart){


        $storage = $cart->get();

        $products = [];

        foreach($storage as $id => $s){
            $p = Product::find($id);

            $products[] = [
                'id' => $p->id,
                'name' => $p->title,
                'price' => $p->price,
                'total' => $s['total'],
                'quantity' => $s['quantity']
            ];
        }

        $total = $cart->total();

        return view('front.cart', compact('products', 'total'));
    }

    public function commandCart(Request $request){

        $this->validate($request, [
            'product_id.*' => 'integer|required',
            'quantity.*'   => 'integer|required'
        ]);

        foreach($request->input('product_id') as $productId){
            $quantity = $request->input('quantity'.$productId);
            $history = History::create([
                'product_id' => $productId,
                'quantity'   => $quantity

            ]);


            $stock = $history->product->quantity;
            if($stock>=$quantity) $history->product->quantity -= $quantity;
            else $history->product->quantity = 0;
            $history->product->save();

            return redirect('/')->with('message', 'success command');
        }

    }

}


