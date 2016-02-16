<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\User;

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
}
