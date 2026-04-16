@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2 class="page-title">👥 CẬP NHẬT QUYỀN NGƯỜI DÙNG</h2>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow">
    <div class="card-body">
        <div class="mb-4">
            <h5>Thông tin người dùng</h5>
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <form action="/users/update/{{ $user->id }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label"><strong>Phân quyền</strong></label>
                <div class="alert alert-info mb-3">
                    <strong>📌 Hướng dẫn các quyền:</strong>
                    <ul class="mb-0 mt-2">
                        <li><strong>🔐 Admin:</strong> Toàn quyền - Quản lý tất cả</li>
                        <li><strong>📋 Quản lý:</strong> Quản lý nhân viên, sản phẩm, đơn hàng, khách hàng</li>
                        <li><strong>👤 Nhân viên:</strong> Xem và xử lý đơn hàng</li>
                        <li><strong>📦 Kho:</strong> Quản lý nguyên liệu và tồn kho</li>
                    </ul>
                </div>

                <select name="role" class="form-select form-control" required>
                    <option value="">-- Chọn quyền --</option>
                    @foreach($roles as $key => $label)
                        <option value="{{ $key }}" @if($user->role === $key) selected @endif>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="alert alert-warning">
                <strong>⚠️ Lưu ý:</strong> Sau khi cập nhật quyền, người dùng cần đăng xuất và đăng nhập lại để thay đổi có hiệu lực.
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">✏️ Cập nhật</button>
                <a href="/users" class="btn btn-secondary">❌ Hủy</a>
            </div>
        </form>
    </div>
</div>

@endsection
