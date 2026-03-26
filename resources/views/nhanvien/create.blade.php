<!DOCTYPE html>
<html>
<head>
    <title>Thêm nhân viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center text-success mb-4">➕ Thêm nhân viên</h2>

    <form action="/nhanvien/store" method="POST" class="card p-4 shadow">
        @csrf

        <div class="mb-3">
            <label>Tên</label>
            <input type="text" name="ten" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>SĐT</label>
            <input type="text" name="sdt" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Chức vụ</label>
            <input type="text" name="chuc_vu" class="form-control" required>
        </div>

        <button class="btn btn-success">Thêm</button>
        <a href="/nhanvien" class="btn btn-secondary">Quay lại</a>
    </form>

</div>

</body>
</html>
