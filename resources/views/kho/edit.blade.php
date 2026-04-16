@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2 class="page-title">📦 CẬP NHẬT NGUYÊN LIỆU</h2>
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
        <form action="/kho/update/{{ $material->id }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tên nguyên liệu</label>
                <input type="text" name="ten" class="form-control @error('ten') is-invalid @enderror" placeholder="VD: Bột mì, Phô mai, Cà chua" required value="{{ old('ten', $material->ten) }}">
                @error('ten')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Đơn vị tính</label>
                <input type="text" name="don_vi" class="form-control @error('don_vi') is-invalid @enderror" placeholder="VD: kg, lít, cái" required value="{{ old('don_vi', $material->don_vi) }}">
                @error('don_vi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Số lượng hiện tại</label>
                        <input type="number" name="so_luong" class="form-control @error('so_luong') is-invalid @enderror" step="0.01" required value="{{ old('so_luong', $material->so_luong) }}">
                        @error('so_luong')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Số lượng tối thiểu</label>
                        <input type="number" name="so_luong_toi_thieu" class="form-control @error('so_luong_toi_thieu') is-invalid @enderror" step="0.01" required value="{{ old('so_luong_toi_thieu', $material->so_luong_toi_thieu) }}">
                        @error('so_luong_toi_thieu')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Giá nhập (đ)</label>
                <input type="number" name="gia_nhap" class="form-control @error('gia_nhap') is-invalid @enderror" step="0.01" required value="{{ old('gia_nhap', $material->gia_nhap) }}">
                @error('gia_nhap')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ngày nhập</label>
                <input type="date" name="ngay_nhap" class="form-control @error('ngay_nhap') is-invalid @enderror" required value="{{ old('ngay_nhap', $material->ngay_nhap->format('Y-m-d')) }}">
                @error('ngay_nhap')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ghi chú</label>
                <textarea name="ghi_chu" class="form-control @error('ghi_chu') is-invalid @enderror" rows="3" placeholder="Thêm ghi chú hay thông tin thêm nếu cần...">{{ old('ghi_chu', $material->ghi_chu) }}</textarea>
                @error('ghi_chu')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="alert alert-info">
                @if($material->isCanhBao())
                    <strong>⚠️ Cảnh báo:</strong> Số lượng hiện tại {{ $material->so_luong }} {{ $material->don_vi }} <= {{ $material->so_luong_toi_thieu }} (tối thiểu)
                @else
                    <strong>✅ Tình trạng:</strong> Đủ hàng
                @endif
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">✏️ Cập nhật</button>
                <a href="/kho" class="btn btn-secondary">❌ Hủy</a>
            </div>
        </form>
    </div>
</div>

@endsection
