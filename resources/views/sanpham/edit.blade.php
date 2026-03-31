<form action="/sanpham/update/{{ $sp->id }}" method="POST" enctype="multipart/form-data" class="container mt-5">
    @csrf

    <input name="ten" value="{{ $sp->ten }}" class="form-control mb-2">
    <input name="gia" value="{{ $sp->gia }}" class="form-control mb-2">

    <select name="size" class="form-control mb-2">
        <option value="Nhỏ" {{ $sp->size == 'Nhỏ' ? 'selected' : '' }}>Nhỏ</option>
        <option value="Vừa" {{ $sp->size == 'Vừa' ? 'selected' : '' }}>Vừa</option>
        <option value="Lớn" {{ $sp->size == 'Lớn' ? 'selected' : '' }}>Lớn</option>
        <option value="Đặc biệt" {{ $sp->size == 'Đặc biệt' ? 'selected' : '' }}>Đặc biệt</option>
    </select>

    <input name="so_luong" value="{{ $sp->so_luong }}" class="form-control mb-2">

    <input type="file" name="hinh" class="form-control mb-2">

    @if($sp->hinh)
        <img src="/images/{{ $sp->hinh }}" width="100">
    @endif

    <textarea name="mo_ta" class="form-control mb-2">{{ $sp->mo_ta }}</textarea>

    <button class="btn btn-warning">Cập nhật</button>
</form>
