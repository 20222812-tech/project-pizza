@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">👥 QUẢN LÝ KHÁCH HÀNG</h2>
            <p class="text-muted mb-0">Danh sách khách hàng và tìm kiếm nhanh trong hệ thống.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/khachhang" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm khách hàng..." value="{{ $search ?? '' }}">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/khachhang/create" class="btn btn-success">➕ Thêm</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover shadow">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Tên khách</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Tổng chi tiêu</th>
            <th>Số đơn hàng</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        @forelse($khachhang as $kh)
        <tr>
            <td>{{ $kh->id }}</td>
            <td><strong>{{ $kh->ten }}</strong></td>
            <td>{{ $kh->sdt }}</td>
            <td>{{ $kh->email ?? '-' }}</td>
            <td>{{ $kh->dia_chi ?? '-' }}</td>
            <td class="text-success"><strong>{{ number_format($kh->tong_chi_tieu) }} đ</strong></td>
            <td class="text-center">{{ $kh->so_don_hang }}</td>
            <td>
                <a href="/khachhang/edit/{{ $kh->id }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="/khachhang/delete/{{ $kh->id }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center text-muted">Chưa có khách hàng nào.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
