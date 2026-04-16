<form action="/donhang/update/{{ $dh->id }}" method="POST">
@csrf

<input name="ten_khach" value="{{ $dh->ten_khach }}" class="form-control mb-2">
<input name="sdt" value="{{ $dh->sdt }}" class="form-control mb-2">
<input name="dia_chi" value="{{ $dh->dia_chi }}" class="form-control mb-2">
<input name="ten_san_pham" value="{{ $dh->ten_san_pham }}" class="form-control mb-2">
<input name="so_luong" value="{{ $dh->so_luong }}" class="form-control mb-2">
<input name="tong_tien" value="{{ $dh->tong_tien }}" class="form-control mb-2">

<select name="trang_thai" class="form-control mb-2">
    <option {{ $dh->trang_thai=='Chờ xử lý'?'selected':'' }}>Chờ xử lý</option>
    <option {{ $dh->trang_thai=='Đang giao'?'selected':'' }}>Đang giao</option>
    <option {{ $dh->trang_thai=='Hoàn thành'?'selected':'' }}>Hoàn thành</option>
</select>

<button class="btn btn-warning">Cập nhật</button>
</form>
