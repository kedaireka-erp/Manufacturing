<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return redirect("http://erp.alluresystem.site");
    }

    public function login(Request $request)
    {
        Auth::loginUsingId(base64_decode($request->user_id));

        return redirect("/login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function welcome()
    {
        return view("login.welcome");
    }
}
