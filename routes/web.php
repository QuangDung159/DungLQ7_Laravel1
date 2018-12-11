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

use App\User;
use Illuminate\Support\Facades\Route;
use App\SanPham;
use App\LoaiSanPham;
use Illuminate\Support\Facades\Schema;

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

// Làm việc với request - response
Route::get("goi", "MyController@getData");

// Gửi dữ liệu với request
Route::get("getform", function () {
    // Gọi view có tên là portForm trong thư mục view
    return view("postForm");
});

// Xử lý dữ liệu được gửi từ view "postFrom.blade.php"
// Gửi dữ liệu qua function postForm thuộc MyController
Route::post("postform", ["as" => "postform", "uses" => "MyController@postForm"]);

// Cookie

Route::get("setcookie", "Mycontroller@setCookie");

Route::get("getcookie", "MyController@getCookie");

// Upload file

Route::get("uploadfile", function () {
    return view("postFile");
});

Route::post("postfile", ["as" => "postfile", "uses" => "MyController@postFile"]);

// JSON
Route::get("getjson", "MyController@getJSON");

// View
Route::get("myview", "MyController@showView");

Route::get("time/{t}", "MyController@time");

// Share biến dùng chung cho các view
View::share("khoahoc", "laravel");

// Blade Template
Route::get("blade", function () {
    return view("pages.laravel");
});

Route::get("blade", function () {
    return view("pages.php");
});

Route::get("bladetemplate/{str}", "MyController@blade");


// database
Route::get("database", function () {
    Schema::create("theloai", function ($table) {
        $table->increments("id");
        $table->string("ten", 100)->nullable();
        $table->string("nsx", 100)->default("yamaha");
    });
    echo "Đã thực hiện lệnh tạo bảng";
});

Route::get("lienketbang", function () {
    Schema::create("sanpham", function ($table) {
        $table->increments("id");
        $table->string("tensanpham", 100);
        $table->float("gia");
        $table->integer("soluong")->defaulr(0);
        $table->integer("id_loaisanpham")->unsigned();
        // Tạo khóa phụ
        $table->foreign("id_loaisanpham")->references("id")->on("loaisanpham");
    });
});

Route::get("suabang", function () {
    Schema::table("theloai", function ($table) {
        $table->dropColumn("nsx");
    });
});

Route::get("themcot", function () {
    Schema::table("theloai", function ($table) {
        $table->string("email", 100);
    });
});

Route::get("doitenbang", function () {
    Schema::rename("theloai", "category");
});

// Query builder
Route::get("qb/get", function () {
    $data = DB::table("users")->get();
    foreach ($data as $item) {
        // $key : tên cột
        // $value : giá trị
        foreach ($item as $key => $value) {
            echo $key . " : " . $value . "</br>";
        }
        echo "<hr>";
    }
});

// Select where
Route::get("qb/where", function () {
    // Lấy users có id = 4
    $data = DB::table("users")->where("id", "=", 4)->get();
    foreach ($data as $item) {
        // $key : tên cột
        // $value : giá trị
        foreach ($item as $key => $value) {
            echo $key . " : " . $value . "</br>";
        }
        echo "<hr>";
    }
});

// Select id, name, email
Route::get("qb/select", function () {
    $data = DB::table("users")->select(["id", "name", "email"])
        ->where("id", 4)->get();// Where id = 4
    foreach ($data as $item) {
        // $key : tên cột
        // $value : giá trị
        foreach ($item as $key => $value) {
            echo $key . " : " . $value . "</br>";
        }
        echo "<hr>";
    }
});

// select name as hoten
Route::get("qb/select/raw", function () {
    $data = DB::table("users")->select(DB::raw("name as hoten, email"))
        ->where("id", 4)->get();// Where id = 4
    foreach ($data as $item) {
        // $key : tên cột
        // $value : giá trị
        foreach ($item as $key => $value) {
            echo $key . " : " . $value . "</br>";
        }
        echo "<hr>";
    }
});

// order by
// limit
Route::get("qb/select/orderby", function () {
    $data = DB::table("users")->select(DB::raw("id, name as hoten, email"))
        ->orderBy("id", "DESC")->skip(1)->take(5)
        ->where("id", ">", 1)->get();// Where id > 1
    foreach ($data as $item) {
        // $key : tên cột
        // $value : giá trị
        foreach ($item as $key => $value) {
            echo $key . " : " . $value . "</br>";
        }
        echo "<hr>";
    }
});

Route::get("qb/update", function () {
    DB::table("users")->where("id", 4)
        ->update(["name" => "website"]);
    echo "Đã update date";
});

Route::get("qb/delete", function () {
    DB::table("users")->where("id", 4)->delete();
    echo "Đã xóa";
});

Route::get("model/save", function () {
    $user = new User();
    $user->name = "Mai";
    $user->email = "asfasdnoiqn@gmail.com";
    $user->password = "Mat khau";
    $user->save();
    echo "Saved";
});

Route::get("model/query", function () {
    // use App\User
    $user = User::find(7);
    echo $user->name;
});

Route::get("model/sanpham/save/{save}/{sl}", function ($ten, $soluong) {
    $sanpham = new SanPham();
    $sanpham->ten = "$ten";
    $sanpham->soluong = $soluong;
    $sanpham->save();
    echo "Saved";
});

Route::get("model/sanpham/all", function () {
    $sanpham = SanPham::all()->toJson();
    echo $sanpham;
});

Route::get("model/sanpham/ten", function () {
    $sanpham = SanPham::where("ten", "meo")->get()->toArray();
    echo $sanpham[0]["ten"];
});

Route::get("model/sanpham/delete", function () {
    SanPham::destroy(7);
});

Route::get("taocot", function () {
    Schema::table("sanpham", function ($table) {
        $table->integer("id_loaisanpham")->unsigned()->default(0);
    });
});

Route::get("lienket", function () {
    // sanpham_loaisanpham_n_1 : tên khóa ngoại
    $data = SanPham::find(5)->sanpham_loaisanpham_n_1->toArray();
    var_dump($data);
});

Route::get("lienketloaisanpham", function () {
    $data = LoaiSanPham::find(1)->loaisanpham_sanpham_1_n->toArray();
    var_dump($data);
});

Route::get("diem", function () {
    echo "Bạn có điểm";
})->name("diem")->middleware("MyMiddle");

Route::get("loi", function () {
    echo "Bạn chưa có điểm";
})->name("loi");

Route::get("nhapdiem", function () {
    return view("nhapdiem");
})->name("nhapdiem");

Route::get("dangnhap", function () {
    return view("dangnhap");
});

Route::post("login", "AuthController@login")->name("login");