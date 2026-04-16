@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="mb-4">➕ Tạo đơn hàng</h3>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/donhang/store" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">👥 Khách hàng (tùy chọn)</label>
                        <select name="khach_hang_id" id="khachhang" class="form-control">
                            <option value="">-- Khách hàng mới --</option>
                            @foreach($khachhang as $kh)
                                <option value="{{ $kh->id }}">{{ $kh->ten }} ({{ $kh->sdt }})</option>
                            @endforeach
                        </select>
                    </div>

                    <input name="ten_khach" id="ten_khach" placeholder="Tên khách" class="form-control mb-3" value="{{ old('ten_khach') }}" required>
                    <input name="sdt" id="sdt" placeholder="SĐT" class="form-control mb-3" value="{{ old('sdt') }}" required>
                    <input name="dia_chi" id="dia_chi" placeholder="Địa chỉ" class="form-control mb-3" value="{{ old('dia_chi') }}" required>

                    <select name="san_pham_id" id="sanpham" class="form-control mb-3" required>
                        <option value="">-- Chọn pizza --</option>
                        @foreach($sanphams as $sp)
                            <option value="{{ $sp->id }}" data-gia="{{ $sp->gia }}"
                                {{ old('san_pham_id') == $sp->id ? 'selected' : '' }}>
                                {{ $sp->ten }} - {{ number_format($sp->gia) }}đ
                            </option>
                        @endforeach
                    </select>

                    <input type="number" id="soluong" name="so_luong" value="{{ old('so_luong', 1) }}" min="1" class="form-control mb-3">
                    <input type="text" id="tongtien" class="form-control mb-3" placeholder="Tổng tiền" readonly>

                    <button class="btn btn-success">Lưu</button>
                    <a href="/donhang" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const khachhang = document.getElementById('khachhang');
    const ten_khach = document.getElementById('ten_khach');
    const sdt = document.getElementById('sdt');
    const sanpham = document.getElementById('sanpham');
    const soluong = document.getElementById('soluong');
    const tongtien = document.getElementById('tongtien');

    // Khi chọn khách có sẵn, điền thông tin tự động
    khachhang.addEventListener('change', function() {
        if (this.value) {
            const selectedOption = this.options[this.selectedIndex];
            const text = selectedOption.text;
            const match = text.match(/\((.*?)\)/);
            const sdt_kh = match ? match[1] : '';
            const ten = text.substring(0, text.indexOf('(') - 1);
            
            ten_khach.value = ten;
            sdt.value = sdt_kh;
        } else {
            ten_khach.value = '';
            sdt.value = '';
        }
    });

    function tinhTien() {
        const selected = sanpham.options[sanpham.selectedIndex];
        const gia = Number(selected.getAttribute('data-gia') || 0);
        const sl = Number(soluong.value || 0);

        tongtien.value = sl > 0 ? (gia * sl).toLocaleString() + ' đ' : '';
    }

    if (sanpham && soluong) {
        sanpham.addEventListener('change', tinhTien);
        soluong.addEventListener('input', tinhTien);
        tinhTien();
    }
</script>
@endsection
