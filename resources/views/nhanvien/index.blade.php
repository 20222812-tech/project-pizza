<!DOCTYPE html>
<html>
<head>
    <title>Nhân viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="text-center text-primary mb-4">🍕 QUẢN LÝ NHÂN VIÊN</h2>
<form method="GET" action="/nhanvien" class="mb-3 d-flex">
    <input 
        type="text" 
        name="search" 
        class="form-control me-2" 
        placeholder="🔍 Tìm theo tên, email, SĐT"
        value="{{ request('search') }}"
    >
    <button class="btn btn-primary">Tìm</button>
    <div class="d-flex justify-content-between mb-3">
        <h5>Danh sách</h5>
        <a href="/nhanvien/create" class="btn btn-success">➕ Thêm</a>
    </div>

    <table class="table table-bordered table-hover shadow">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Chức vụ</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($nhanviens as $nv)
            <tr>
                <td>{{ $nv->id }}</td>
                <td>{{ $nv->ten }}</td>
                <td>{{ $nv->email }}</td>
                <td>{{ $nv->sdt }}</td>
                <td>{{ $nv->chuc_vu }}</td>
                <td class="text-center">
                    <a href="/nhanvien/edit/{{ $nv->id }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="/nhanvien/delete/{{ $nv->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

</body>
</html>
