<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// http://localhost:8090/DungLQ7_Laravel1/public/khoahoc
Route::get("khoahoc", function () {
    return "Xin chao";
});

// http://localhost:8090/DungLQ7_Laravel1/public/khoapham/laravel
Route::get("khoapham/laravel", function () {
    echo "<h1>Xin chao laravel</h1>";
});

// Truyền tham số cho route
// http://localhost:8090/DungLQ7_Laravel1/public/hoten/dung
Route::get("hoten/{ten}", function ($ten) {
    echo $ten;
});

Route::get("ten/{ten?}", function ($ten = "default") {
    echo $ten;
});

// http://localhost:8090/DungLQ7_Laravel1/public/laravel/20
Route::get("laravel/{ngay}", function ($ngay) {
    echo $ngay;
})->where(["ngay" => "[0-9]+"]);

// Định danh cho route
Route::get("route1", ["as" => "myRoute", function () {
    echo "Xin chào mấy bố";
}]);

// Định danh route : cách 2
Route::get("route2", function () {
    echo "route 2";
})->name("myRoute2");

// Gọi tên route đã được đặt tên
// http://localhost:8090/DungLQ7_Laravel1/public/goiten
Route::get("goiten", function () {
    return redirect()->route("myRoute");
});

// http://localhost:8090/DungLQ7_Laravel1/public/goiten2
Route::get("goiten2", function () {
    return redirect()->route("myRoute2");
});

// Nhóm route
Route::group(["prefix" => "myGroup"], function () {

    // http://localhost:8090/DungLQ7_Laravel1/public/myGroup/user1
    Route::get("user1", function () {
        echo "user 1";
    });

    // http://localhost:8090/DungLQ7_Laravel1/public/myGroup/user2
    Route::get("user2", function () {
        echo "user 2";
    });

    // http://localhost:8090/DungLQ7_Laravel1/public/myGroup/user3
    Route::get("user3", function () {
        echo "user 3";
    });
});

// Gọi controller
// Route::get("{url}", "{tên controller}@{tên phương thức}")
// http://localhost:8090/DungLQ7_Laravel1/public/goi_controller
Route::get("goi_controller", "MyController@xinChao");

// Truyền tham số từ url vào controller
Route::get("thamso/{ten}", "MyController@khoaHoc");