<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    // Define route để sử dụng controller
    // http://localhost:8090/DungLQ7_Laravel1/public/goi_controller
    public function xinChao()
    {
        echo "Chào các bạn";
    }

    public function khoaHoc($ten)
    {
        echo $ten;
        die;
        // Gọi route qua tên route được define
        return redirect()->route("myRoute");
    }

    public function getData(Request $req)
    {
        // path() : trả về đường dẫn dã gọi tới đây
        echo $req->path() . "</br>";
        echo $req->url() . "</br>";
        echo $req->isMethod("get");
    }

    public function postForm(Request $req)
    {
        // hoten : tên của input thuộc view "postForm.blade.php"
        echo $req->hoten . "</br>";
        echo $req->input("hoten");
    }

    public function setCookie()
    {
        $res = new Response();
        $res->withCookie(
        // "{tên cookie}", "{Giá trị}", {thời gian (phút)}
            "hoten", "Laravel Khoa Phạm", 1
        );
        return $res;
    }

    public function getCookie(Request $req)
    {
        return $req->cookie("hoten");
    }

    // Post file
    public function postFile(Request $req)
    {
        // key : tên input
        if ($req->hasFile("myfile")) {
            echo "Đã có file";
            // Lưu file
            $file = $req->file("myfile");
            $fileName = $file->getClientOriginalName();
            $fileExt = $file->getClientOriginalExtension();
            if ($fileExt == "txt") {
                $file->move("text", $fileName);
            } else {
                $file->move("images", "$fileName");
            }
        } else {
            echo "Chưa có file";
        }
    }

    public function getJSON()
    {
        $array = ["laravel" => "5", "php" => "7", "asp.net" => "8", "html" => "10"];
        return response()->json($array);
    }

    public function showView()
    {
        // directory.view
        return view("admin.khoapham");
    }

    // http://localhost:8090/DungLQ7_Laravel1/public/time/{$t}
    public function time($t)
    {
        // Truyền tham số t qua myView
        return view("myView", ["t" => $t]);
    }
}
