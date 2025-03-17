@extends('layout')

@section('content')
<h2>Đăng nhập</h2>
@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    Mã SV: <input type="text" name="MaSV" required>
    <button type="submit">Đăng Nhập</button>
</form>
@endsection
