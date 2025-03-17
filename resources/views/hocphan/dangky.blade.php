@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Đăng Ký Học Phần</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Mã HP</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hocPhanDaDangKy as $hocPhan)
                    <tr>
                        <td>{{ $hocPhan->MaHP }}</td>
                        <td>{{ $hocPhan->TenHP }}</td>
                        <td>{{ $hocPhan->SoTinChi }}</td>
                        <td>
                            <a href="{{ route('hocphan.dangky.xoa', $hocPhan->MaHP) }}" class="btn btn-danger btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Chưa có học phần nào được đăng ký.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('hocphan.dangky.xoa_tat_ca') }}" class="btn btn-warning">Xóa toàn bộ đăng ký</a>
    </div>
@endsection
