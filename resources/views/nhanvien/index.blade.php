@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">👨‍🍳 QUẢN LÝ NHÂN VIÊN</h2>
            <p class="text-muted mb-0">Quản lý nhân viên và tìm kiếm nhanh trong hệ thống.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/nhanvien" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm nhân viên..." value="{{ $search ?? request('search') }}">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/nhanvien/create" class="btn btn-success">➕ Thêm</a>
        </div>
    </div>
</div>

<table class="table table-bordered table-hover shadow">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Chức vụ</th>
            <th>Hành động</th>
        </tr>
    </thead>

    @foreach($nhanviens as $nv)
    <tr>
        <td>{{ $nv->id }}</td>
        <td>{{ $nv->ten }}</td>
        <td>{{ $nv->email }}</td>
        <td>{{ $nv->sdt }}</td>
        <td>{{ $nv->chuc_vu }}</td>
        <td>
            <a href="/nhanvien/edit/{{ $nv->id }}" class="btn btn-warning btn-sm">Sửa</a>

            <form action="/nhanvien/delete/{{ $nv->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
