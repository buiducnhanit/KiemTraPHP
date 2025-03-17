@extends('layout')

@section('content')
<h2>Danh Sách Học Phần</h2>

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
    @foreach($hocPhan as $hp)
    <tr>
        <td>{{ $hp->MaHP }}</td>
        <td>{{ $hp->TenHP }}</td>
        <td>{{ $hp->SoTinChi }}</td>
        <td>
            <form method="POST" action="{{ route('hocphan.dangky') }}">
                @csrf
                <input type="hidden" name="MaHP" value="{{ $hp->MaHP }}">
                <button type="submit">Đăng Ký</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a href="{{ route('logout') }}">Đăng Xuất</a>
@endsection
