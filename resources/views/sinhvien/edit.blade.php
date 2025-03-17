@extends('layout')

@section('content')
<h2>Chỉnh sửa sinh viên</h2>

<form method="POST" action="{{ route('sinhvien.update', $sinhVien->MaSV) }}" enctype="multipart/form-data">
    @csrf 
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Họ Tên</label>
        <input type="text" name="HoTen" class="form-control" value="{{ $sinhVien->HoTen }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Giới Tính</label>
        <select name="GioiTinh" class="form-select">
            <option value="Nam" {{ $sinhVien->GioiTinh == 'Nam' ? 'selected' : '' }}>Nam</option>
            <option value="Nữ" {{ $sinhVien->GioiTinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Ngày Sinh</label>
        <input type="date" name="NgaySinh" class="form-control" value="{{ $sinhVien->NgaySinh }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Hình</label>
        <input type="file" name="Hinh" class="form-control">
        @if($sinhVien->Hinh)
            <img src="{{ asset('storage/' . $sinhVien->Hinh) }}" width="100" class="mt-2">
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Ngành Học</label>
        <select name="MaNganh" class="form-select">
            @foreach($dsNganh as $nganh)
                <option value="{{ $nganh->MaNganh }}" {{ $sinhVien->MaNganh == $nganh->MaNganh ? 'selected' : '' }}>
                    {{ $nganh->TenNganh }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
