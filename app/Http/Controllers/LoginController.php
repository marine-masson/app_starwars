<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;


class LoginController extends Controller
{

    public function login(Request $request){

        if(Auth::check()) return redirect()->intended('product');
        if($request->isMethod('post')){

           $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required',
                'remember'=>'in:true'
            ]);

            $remember = $request->input('remember')? true : false;

            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials, $remember)){
                return redirect('product')->with(['msg' => "Vous etes connectez"]);
            }else{
                return back()->withInput($request->only('email','remember'))->with(['msg' => "Mauvais login / password"]);
            }
        }else{
            return view('auth.login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }



}
