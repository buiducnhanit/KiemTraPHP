<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'SinhVien'; // Trùng với tên bảng trong CSDL
    protected $primaryKey = 'MaSV'; // Khóa chính
    public $incrementing = false; // Vì MaSV không phải auto-increment
    protected $keyType = 'string'; // Kiểu khóa chính là char(10)
    public $timestamps = false;
    protected $fillable = [
        'MaSV', 'HoTen', 'GioiTinh', 'NgaySinh', 'Hinh', 'MaNganh'
    ];

    public function nganhHoc()
    {
        return $this->belongsTo(NganhHoc::class, 'MaNganh', 'MaNganh');
    }
}
