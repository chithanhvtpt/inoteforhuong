<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showFormLogin()
    {
        return view("frontend.auth.login");
    }

    public function login(Request $request)
    {
        $request->validate([
           "email" => "required",
           "password" => "required"
        ]);
        $data = $request->only("email", "password");
        if (Auth::attempt($data)) {
            toastr()->success("Hello " . Auth::user()->name);
            return redirect()->route("notes.index");
        }else {
            toastr()->error("Login Fail!!");
            return view("frontend.auth.login");
        }
    }

    public function logout()
    {
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();
        toastr()->success("Logout");
        return redirect()->route("auth.login");
    }

    public function showFormRegister()
    {
        return view("frontend.auth.register");
    }

    public function register(Request $request)
    {
        $request->validate([
           "name" => "required",
           "email" => "required",
           "password" => "required|min:6"
        ]);
        $data = $request->only("name", "email", "password");
        $data["password"] = Hash::make($request->password);
        User::query()->create($data);
        toastr()->success("Success!");
        return redirect()->route("login.form");
    }

}
