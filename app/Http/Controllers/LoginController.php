<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequets;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
        return view('login');
    }
    public function postLogin(LoginRequets $r){
        // return view('login');
        // dd($r->all());
        $email = $r->mail;
        $password = $r->pass;
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            return view('user');
        }
    }
}
