<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    // Link model đến database
    protected $table = "sanpham";
    public $timestamps = false;

    public function sanpham_loaisanpham_1_1()
    {
        return $this->belongsTo("App\LoaiSanPham", "id_loaisanpham", "id");
    }
}
