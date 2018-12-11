<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $req)
    {
        $username = $req["username"];
        $password = $req["password"];
        // "name", "password" : tên cột trong database => default là bảng "users"
        if (Auth::attempt(["name" => $username, "password" => $password])) {
            // Lấy ra thông tin của user
            $user = Auth::user();
            return view("thanhcong", ["user" => $user]);
        } else {
            return view("dangnhap", ["error" => "Đăng nhập thất bại"]);
        }
    }
}
