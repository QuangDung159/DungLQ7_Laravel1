<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    protected $table = "loaisanpham";
    public $timestamps = false;

    public function loaisanpham_sanpham_1_n()
    {
        return $this->hasMany("App\SanPham", "id_loaisanpham", "id");
    }
}
