<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SinhVien;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'MaSV' => 'required|exists:sinhvien,MaSV',
        ]);
    
        $sinhVien = SinhVien::where('MaSV', $request->MaSV)->first();
    
        if ($sinhVien) {

            return redirect()->route('hocphan.index')
                             ->cookie('sinhvien', $sinhVien->MaSV, 60);
        }
    
        return back()->withErrors(['MaSV' => 'Mã sinh viên không hợp lệ.']);
    }    

    public function logout()
    {
        return redirect()->route('login')->withoutCookie('sinhvien');
    }
}
