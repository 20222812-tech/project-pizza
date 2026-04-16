@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">📦 Danh sách đơn hàng</h2>
            <p class="text-muted mb-0">Tìm kiếm và quản lý đơn hàng nhanh chóng trong hệ thống.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form action="/donhang" method="GET" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm đơn hàng..." value="{{ $search ?? '' }}">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/donhang/create" class="btn btn-success">Tạo đơn hàng</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered table-hover shadow text-center">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Khách</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        @forelse($donhangs as $dh)
        <tr>
            <td>{{ $dh->id }}</td>
            <td>{{ $dh->ten_khach }}</td>
            <td>{{ $dh->sdt }}</td>
            <td>{{ $dh->dia_chi }}</td>
            <td>{{ $dh->sanpham?->ten ?? $dh->san_pham_id }}</td>
            <td>{{ $dh->so_luong }}</td>
            <td>{{ number_format($dh->tong_tien) }} đ</td>
            <td>
                <form action="/donhang/update-status/{{ $dh->id }}" method="POST">
                    @csrf
                    <select name="trang_thai" onchange="this.form.submit()" class="form-control">
                        <option value="Chờ xử lý" {{ $dh->trang_thai == 'Chờ xử lý' ? 'selected' : '' }}>
                            Chờ xử lý
                        </option>
                        <option value="Đang giao" {{ $dh->trang_thai == 'Đang giao' ? 'selected' : '' }}>
                            Đang giao
                        </option>
                        <option value="Hoàn thành" {{ $dh->trang_thai == 'Hoàn thành' ? 'selected' : '' }}>
                            Hoàn thành
                        </option>
                    </select>
                </form>
            </td>
            <td>
                <form action="/donhang/delete/{{ $dh->id }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9">Chưa có đơn hàng nào.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
