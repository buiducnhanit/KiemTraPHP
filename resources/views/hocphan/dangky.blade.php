@extends('layout')

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
                        <form action="{{ route('hocphan.dangky.xoa', $hp->MaHP) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa học phần này không?')">
                    Xóa
                </button>
            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Chưa có học phần nào được đăng ký.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <form action="{{ route('hocphan.dangky.xoa_tat_ca') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả học phần đã đăng ký không?')">
                Xóa Tất Cả
            </button>
        </form>
    </div>
@endsection
