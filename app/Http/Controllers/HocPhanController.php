<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\DangKy;
use App\Models\HocPhan;
use App\Models\ChiTietDangKy;
use Illuminate\Support\Facades\DB;

class HocPhanController extends Controller
{
    public function index(Request $request)
    {
        $maSV = $request->cookie('sinhvien');
    
        if (!$maSV) {
            return redirect()->route('login');
        }
    
        $sinhVien = SinhVien::where('MaSV', $maSV)->first();
    
        if (!$sinhVien) {
            return redirect()->route('login');
        }

        $hocPhan = HocPhan::all();

        return view('hocphan.index', compact('sinhVien', 'hocPhan'));
    }

    public function dangKyHocPhan(Request $request)
    {
        $maSV = $request->cookie('sinhvien');
    
        // Kiểm tra xem sinh viên đã có đăng ký hay chưa
        $dangKy = DangKy::where('MaSV', $maSV)->first();
    
        if (!$dangKy) {
            $dangKy = DangKy::create([
                'MaSV' => $maSV,
                'NgayDK' => now(),
            ]);
        }
    
        // Kiểm tra xem học phần đã được đăng ký chưa để tránh trùng lặp
        $exists = ChiTietDangKy::where('MaDK', $dangKy->MaDK)
            ->where('MaHP', $request->MaHP)
            ->exists();
    
        if (!$exists) {
            ChiTietDangKy::create([
                'MaDK' => $dangKy->MaDK,
                'MaHP' => $request->MaHP,
            ]);
    
            return redirect()->route('hocphan.index')->with('success', 'Đăng ký thành công');
        }
    
        return redirect()->route('hocphan.index')->with('error', 'Học phần đã được đăng ký trước đó.');
    }
    
    public function hocPhanDaDangKy(Request $request)
    {
        $maSV = $request->cookie('sinhvien');

        $dangKy = DangKy::where('MaSV', $maSV)->first();
        if (!$dangKy) {
            return view('hocphan.dadangky', ['hocPhanDangKy' => []]);
        }

        $hocPhanDangKy = DB::table('chitietdangky')
            ->join('hocphan', 'chitietdangky.MaHP', '=', 'hocphan.MaHP')
            ->where('chitietdangky.MaDK', $dangKy->MaDK)
            ->select('hocphan.*')
            ->get();

        return view('hocphan.dadangky', compact('hocPhanDangKy'));
    }

    public function xoaHocPhanDangKy($maHP, Request $request)
    {
        $maSV = $request->cookie('sinhvien');

        ChiTietDangKy::join('dangky', 'chitietdangky.MaDK', '=', 'dangky.MaDK')
            ->where('dangky.MaSV', $maSV)
            ->where('chitietdangky.MaHP', $maHP)
            ->delete();

        return redirect()->route('hocphan.dadangky')->with('success', 'Xóa học phần thành công');
    }

    public function xoaToanBoDangKy(Request $request)
    {
        $maSV = $request->cookie('sinhvien');

        ChiTietDangKy::join('dangky', 'chitietdangky.MaDK', '=', 'dangky.MaDK')
            ->where('dangky.MaSV', $maSV)
            ->delete();

        return redirect()->route('hocphan.dadangky')->with('success', 'Xóa tất cả học phần thành công');
    }
}
