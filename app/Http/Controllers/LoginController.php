<?php

namespace App\Http\Controllers;

use App\Models\ManufactureActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // Auth::user()->assignRole("admin-manufacture");
        // dd(Auth::user()->hasRole("admin-manufacture"));
        return redirect("http://manufacturing.alluresystem.site");
    }

    public function login(Request $request)
    {
        Auth::loginUsingId(base64_decode($request->user_id));
        if (Auth::user()->hasRole(["admin-manufacture", "lead-manufacture", "Admin"]) === false) abort("403");
        ManufactureActivity::logActivity("login", $_SERVER['REMOTE_ADDR']);

        return redirect("/login");
    }

    public function logout()
    {
        ManufactureActivity::logActivity("logout", $_SERVER['REMOTE_ADDR']);
        Auth::logout();

        return redirect("http://erp.alluresystem.site");
    }

    public function welcome()
    {
        return view("login.welcome");
    }
}
