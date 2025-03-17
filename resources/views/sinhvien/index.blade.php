@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">TRANG SINH VIÊN</h2>

    <a href="{{ route('sinhvien.create') }}" class="btn btn-primary mb-3">Thêm Sinh Viên</a>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>MaSV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Hình</th>
                <th>Ngành học</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinhviens as $sv)
            <tr>
                <td>{{ $sv->MaSV }}</td>
                <td>{{ $sv->HoTen }}</td>
                <td>{{ $sv->GioiTinh }}</td>
                <td>{{ $sv->NgaySinh }}</td>
                <td>
                    <img style="height: 100px; width: 100px;" src="{{ asset('storage/' . $sv->Hinh) }}" alt="Ảnh sinh viên">
                </td>
                <td>{{ $sv->nganhHoc->TenNganh ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('sinhvien.show', $sv->MaSV) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('sinhvien.edit', $sv->MaSV) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('sinhvien.destroy', $sv->MaSV) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
