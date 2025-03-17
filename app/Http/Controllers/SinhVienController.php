<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\NganhHoc;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinhviens = SinhVien::with('nganhHoc')->get();
        return view('sinhvien.index', compact('sinhviens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nganhhocs = NganhHoc::all(); // Lấy danh sách ngành học
        return view('sinhvien.create', compact('nganhhocs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'MaSV' => 'required|unique:sinhvien',
            'HoTen' => 'required',
            'GioiTinh' => 'required',
            'NgaySinh' => 'nullable|date',
            'Hinh' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'MaNganh' => 'required|exists:nganhhoc,MaNganh'
        ]);
    
        // Xử lý upload ảnh
        $hinhPath = null;
        if ($request->hasFile('Hinh')) {
            $hinhPath = $request->file('Hinh')->store('sinhvien_images', 'public');
        }
    
        // Lưu sinh viên vào database
        SinhVien::create([
            'MaSV' => $request->MaSV,
            'HoTen' => $request->HoTen,
            'GioiTinh' => $request->GioiTinh,
            'NgaySinh' => $request->NgaySinh,
            'Hinh' => $hinhPath,
            'MaNganh' => $request->MaNganh,
        ]);
    
        return redirect()->route('sinhvien.index')->with('success', 'Thêm sinh viên thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sinhVien = SinhVien::with('nganhHoc')->findOrFail($id);
        return view('sinhvien.detail', compact('sinhVien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sinhVien = SinhVien::findOrFail($id);
        $dsNganh = NganhHoc::all();
        return view('sinhvien.edit', compact('sinhVien', 'dsNganh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sinhVien = SinhVien::findOrFail($id);

        $data = $request->except(['Hinh']);
        
        // Nếu có upload ảnh mới
        if ($request->hasFile('Hinh')) {
            $hinhPath = $request->file('Hinh')->store('sinhvien_images', 'public');
            $data['Hinh'] = $hinhPath;
        }
    
        $sinhVien->update($data);
    
        return redirect()->route('sinhvien.index')->with('success', 'Cập nhật sinh viên thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SinhVien::destroy($id);
        return redirect()->route('sinhvien.index');
    }
}
