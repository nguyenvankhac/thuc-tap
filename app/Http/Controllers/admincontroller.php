<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class admincontroller extends Controller
{
    public function index()
    {
       return view('admin.index');
    }
    public function login()
    {
       return view('admin.login');
    }
    public function check_login(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $data = $req->only('email','password');
        $remember = $req->has('remember');
        $check_login = Auth::attempt($data, $remember);
       
        if( $check_login){
            return redirect()->route('index1')->with('yes','Chào mừng bạn quay trở lại');
        }
        else{
            return redirect()->back()->with('no','Mật khẩu hoặc tài khoản không chính xác');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login')->with('no','vui lòng đăng nhập');
    }
}