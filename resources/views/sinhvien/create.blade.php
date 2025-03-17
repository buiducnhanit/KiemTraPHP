@extends('layout')

@section('content')
<div class="container">
    <h2 class="mt-4">Thêm Sinh Viên</h2>
    
    <form method="POST" action="{{ route('sinhvien.store') }}" enctype="multipart/form-data" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Mã SV</label>
            <input type="text" name="MaSV" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Họ Tên</label>
            <input type="text" name="HoTen" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giới Tính</label>
            <select name="GioiTinh" class="form-select">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày Sinh</label>
            <input type="date" name="NgaySinh" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Hình</label>
            <input type="file" name="Hinh" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Ngành Học</label>
            <select name="MaNganh" class="form-select">
                @foreach($nganhhocs as $nganh)
                    <option value="{{ $nganh->MaNganh }}">{{ $nganh->TenNganh }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection
