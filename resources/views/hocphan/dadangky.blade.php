@extends('layouts.app')

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
            <a href="{{ route('hocphan.dangky.xoa', $hp->MaHP) }}">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>

<a href="{{ route('hocphan.dangky.xoa_tat_ca') }}">Xóa Tất Cả</a>
@endsection
