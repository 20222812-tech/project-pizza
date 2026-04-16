@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center text-warning mb-4">✏️ Sửa khách hàng</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/khachhang/update/{{ $kh->id }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Tên khách hàng</label>
                        <input name="ten" value="{{ old('ten', $kh->ten) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input name="sdt" value="{{ old('sdt', $kh->sdt) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $kh->email) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <textarea name="dia_chi" class="form-control" rows="3">{{ old('dia_chi', $kh->dia_chi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <small class="text-muted">Tổng chi tiêu: <strong>{{ number_format($kh->tong_chi_tieu) }} đ</strong></small>
                            </div>
                            <div class="col">
                                <small class="text-muted">Số đơn: <strong>{{ $kh->so_don_hang }}</strong></small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/khachhang" class="btn btn-secondary">⬅ Quay lại</a>
                        <button class="btn btn-warning">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
