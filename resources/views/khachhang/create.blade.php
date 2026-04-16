@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center text-success mb-4">➕ Thêm khách hàng</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/khachhang/store" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Tên khách hàng</label>
                        <input name="ten" value="{{ old('ten') }}" class="form-control" placeholder="Nhập tên" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input name="sdt" value="{{ old('sdt') }}" class="form-control" placeholder="Nhập SĐT" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Nhập email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <textarea name="dia_chi" class="form-control" rows="3" placeholder="Nhập địa chỉ">{{ old('dia_chi') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/khachhang" class="btn btn-secondary">⬅ Quay lại</a>
                        <button class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
