@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Chi Tiết Sinh Viên</h2>
    
    <div class="card" style="width: 24rem;">
        @if($sinhVien->Hinh)
            <img src="{{ asset('storage/' . $sinhVien->Hinh) }}" class="card-img-top" alt="Ảnh sinh viên">
        @else
            <img src="{{ asset('storage/default-avatar.png') }}" class="card-img-top" alt="Ảnh mặc định">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $sinhVien->HoTen }}</h5>
            <p class="card-text"><strong>Mã SV:</strong> {{ $sinhVien->MaSV }}</p>
            <p class="card-text"><strong>Giới Tính:</strong> {{ $sinhVien->GioiTinh }}</p>
            <p class="card-text"><strong>Ngày Sinh:</strong> {{ $sinhVien->NgaySinh }}</p>
            <p class="card-text"><strong>Ngành Học:</strong> {{ $sinhVien->nganhHoc->TenNganh }}</p>
        </div>

        <div class="card-footer">
            <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary">Quay Lại</a>
            <a href="{{ route('sinhvien.edit', $sinhVien->MaSV) }}" class="btn btn-primary">Chỉnh Sửa</a>
        </div>
    </div>
</div>
@endsection
