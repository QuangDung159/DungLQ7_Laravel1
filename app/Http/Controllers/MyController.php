<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}