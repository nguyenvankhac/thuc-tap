<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;

class HomeCustomercontroller extends Controller
{
    public function login(){
    return view('login');
    }
   
    public function logout(){
        Auth::guard('cus')->logout();
        return redirect()->route('home.login');
    }
    public function register(){
    return view('register');
    }
    
    public function check_login(Request $req){
        $req->validate([
            'email' => 'required|email|exists:customer',
            'password' => 'required',
        ]);
    $data = $req->only('email','password');
    $check_login = Auth::guard('cus')->attempt($data);
 
    if($check_login){
        return redirect()->route('home');
    }
        return redirect()->back();
    }
    public function  check_register(Request $req){
        $data = $req->only('name', 'email', 'password', 'phone', 'address', 'gender', 'birthday', 'created_at', 'updated_at');
        $password_h = bcrypt($req->password);
        $data['password'] =  $password_h;
        if(customer::create($data)){
            return redirect()->route('home.login');
        }
        return redirect()->back();
    }
}