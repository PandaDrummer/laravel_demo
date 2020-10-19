<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['addnewuser','addnewuserstore']);
    }

    public function index(){
        return view('login.index');
    }
    public function create(Request $request){
        $credentials =$request->only('username','password');
        Auth::attempt($credentials,true);
        return redirect()->route('product');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function addNewUser(){
        return view('login.adduser');
    }
    public function addNewUserStore(Request $request){
        Auth::logout();
       $user= User::create([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
        ]);
        Auth::login($user);
    }
}
