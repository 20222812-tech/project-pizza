@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">🍕 QUẢN LÝ PIZZA</h2>
            <p class="text-muted mb-0">Danh sách pizza và tìm kiếm nhanh theo tên sản phẩm.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/sanpham" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm pizza..." value="{{ $search ?? '' }}">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/sanpham/create" class="btn btn-success">➕ Thêm</a>
        </div>
    </div>
</div>
<table class="table table-bordered table-hover shadow">
    <thead class="table-dark text-center">
<tr>
    <th>ID</th>
    <th>Tên</th>
    <th>Giá</th>
    <th>Size</th>
    <th>Số lượng</th>
    <th>Ảnh</th>
    <th>Hành động</th>
</tr>
</thead>
@foreach($sanphams as $sp)
<tr>
    <td>{{ $sp->id }}</td>
    <td>{{ $sp->ten }}</td>
    <td>{{ $sp->gia }}</td>
    <td>{{ $sp->size }}</td>
    <td>{{ $sp->so_luong }}</td>
    <td>
    @if($sp->hinh)
        <img src="/uploads/{{ $sp->hinh }}" width="60">
    @else
        Không có
    @endif
</td>

    <td>
        <a href="/sanpham/edit/{{ $sp->id }}" class="btn btn-warning btn-sm">Sửa</a>

        <form action="/sanpham/delete/{{ $sp->id }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </td>
</tr>
@endforeach

</table>

@endsection
