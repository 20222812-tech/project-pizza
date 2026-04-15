<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/home')->with('success', 'Đăng nhập thành công!');
        }
        
        return back()->with('error', 'Email hoặc mật khẩu sai!');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}