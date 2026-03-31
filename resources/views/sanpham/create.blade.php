<form action="/sanpham/store" method="POST" enctype="multipart/form-data" class="container mt-5">
    @csrf

    <input name="ten" class="form-control mb-2" placeholder="Tên pizza">
    <input name="gia" class="form-control mb-2" placeholder="Giá">

    <select name="size" class="form-control mb-2">
        <option value="Nhỏ">Nhỏ</option>
        <option value="Vừa" selected>Vừa</option>
        <option value="Lớn">Lớn</option>
        <option value="Đặc biệt">Đặc biệt</option>
    </select>

    <input name="so_luong" class="form-control mb-2" placeholder="Số lượng">

    <input type="file" name="hinh" class="form-control mb-2">

    <textarea name="mo_ta" class="form-control mb-2" placeholder="Mô tả"></textarea>

    <button class="btn btn-success">Thêm</button>
</form>
