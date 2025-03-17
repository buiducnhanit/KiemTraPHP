@extends('layout')

@section('content')
<h2>Học Phần Đã Đăng Ký</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1">
    <tr>
        <th>Mã HP</th>
        <th>Tên Học Phần</th>
        <th>Số Tín Chỉ</th>
        <th>Hành Động</th>
    </tr>
    @foreach($hocPhanDangKy as $hp)
    <tr>
        <td>{{ $hp->MaHP }}</td>
        <td>{{ $hp->TenHP }}</td>
        <td>{{ $hp->SoTinChi }}</td>
        <td>
            <form action="{{ route('hocphan.dangky.xoa', $hp->MaHP) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa học phần này không?')">
                    Xóa
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<form action="{{ route('hocphan.dangky.xoa_tat_ca') }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả học phần đã đăng ký không?')">
        Xóa Tất Cả
    </button>
</form>

@endsection
