<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangKy extends Model
{
    use HasFactory;

    protected $table = 'dangky'; // Tên bảng trong DB
    protected $primaryKey = 'MaDK'; // Khóa chính
    public $incrementing = true;   // Khóa chính tự động tăng
    protected $keyType = 'int';    // Kiểu số nguyên
    public $timestamps = false;

    protected $fillable = ['MaSV', 'MaHP', 'NgayDK'];

    // Quan hệ với bảng sinh viên
    public function sinhVien()
    {
        return $this->belongsTo(SinhVien::class, 'MaSV', 'MaSV');
    }

    // Quan hệ với bảng học phần
    public function hocPhan()
    {
        return $this->belongsTo(HocPhan::class, 'MaHP', 'MaHP');
    }
}
