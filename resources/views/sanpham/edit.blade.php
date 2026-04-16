@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center text-warning mb-4">✏️ SỬA SẢN PHẨM</h2>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/sanpham/update/{{ $sp->id }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Tên pizza</label>
                        <input name="ten" value="{{ old('ten', $sp->ten) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input name="gia" type="number" value="{{ old('gia', $sp->gia) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kích thước</label>
                        <select name="size" class="form-select">
                            <option value="Nhỏ" {{ old('size', $sp->size) == 'Nhỏ' ? 'selected' : '' }}>Nhỏ</option>
                            <option value="Vừa" {{ old('size', $sp->size) == 'Vừa' ? 'selected' : '' }}>Vừa</option>
                            <option value="Lớn" {{ old('size', $sp->size) == 'Lớn' ? 'selected' : '' }}>Lớn</option>
                            <option value="Đặc biệt" {{ old('size', $sp->size) == 'Đặc biệt' ? 'selected' : '' }}>Đặc biệt</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số lượng</label>
                        <input name="so_luong" type="number" value="{{ old('so_luong', $sp->so_luong) }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ảnh hiện tại</label><br>
                        @if($sp->hinh)
                            <img src="/uploads/{{ $sp->hinh }}" width="120" class="mb-2">
                        @else
                            <p class="text-muted">Chưa có ảnh</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Chọn ảnh mới</label>
                        <input type="file" name="hinh" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="mo_ta" class="form-control" rows="3">{{ old('mo_ta', $sp->mo_ta) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/sanpham" class="btn btn-secondary">⬅ Quay lại</a>
                        <button class="btn btn-warning">💾 Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
