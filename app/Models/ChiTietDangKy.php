<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDangKy extends Model
{
    use HasFactory;

    protected $table = 'chitietdangky'; // Đặt tên bảng nếu khác với quy tắc mặc định

    protected $primaryKey = 'MaDK'; // Đặt khóa chính nếu không phải là `id`

    public $timestamps = false; // Nếu bảng không có cột `created_at` và `updated_at`

    protected $fillable = ['MaDK', 'MaHP']; // Cho phép thêm dữ liệu vào các cột này

    // Quan hệ với bảng DangKy
    public function dangKy()
    {
        return $this->belongsTo(DangKy::class, 'MaDK', 'MaDK');
    }

    // Quan hệ với bảng HocPhan
    public function hocPhan()
    {
        return $this->belongsTo(HocPhan::class, 'MaHP', 'MaHP');
    }
}
