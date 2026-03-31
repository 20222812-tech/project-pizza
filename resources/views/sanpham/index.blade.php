<!DOCTYPE html>
<html>
<head>
    <title>Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="text-center text-danger mb-4">🍕 QUẢN LÝ PIZZA</h2>

    <!-- SEARCH -->
    <form method="GET" action="/sanpham" class="mb-3 d-flex">
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" 
               class="form-control me-2" placeholder="🔍 Tìm pizza...">
        <button class="btn btn-primary">Tìm</button>
    </form>

    <div class="d-flex justify-content-between mb-3">
        <h5>Danh sách sản phẩm</h5>
        <a href="/sanpham/create" class="btn btn-success">➕ Thêm pizza</a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Size</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($sanphams as $sp)
                    <tr>
                        <td>{{ $sp->id }}</td>

                        <!-- ẢNH -->
                        <td>
                            @if($sp->hinh)
                                <img src="/images/{{ $sp->hinh }}" width="70" class="rounded">
                            @else
                                <span class="text-muted">Không có</span>
                            @endif
                        </td>

                        <td class="fw-bold">{{ $sp->ten }}</td>

                        <td class="text-danger fw-bold">
                            {{ number_format($sp->gia) }} đ
                        </td>

                        <!-- SỐ LƯỢNG -->
                        <td>
                            @if($sp->so_luong > 0)
                                <span class="badge bg-success">{{ $sp->so_luong }}</span>
                            @else
                                <span class="badge bg-danger">Hết hàng</span>
                            @endif
                        </td>

                        <!-- SIZE -->
                        <td>
                            @if($sp->size == 'Nhỏ')
                                <span class="badge bg-secondary">Nhỏ</span>
                            @elseif($sp->size == 'Vừa')
                                <span class="badge bg-primary">Vừa</span>
                            @elseif($sp->size == 'Lớn')
                                <span class="badge bg-warning text-dark">Lớn</span>
                            @else
                                <span class="badge bg-danger">Đặc biệt</span>
                            @endif
                        </td>

                        <td>{{ $sp->mo_ta }}</td>

                        <td>
                            <a href="/sanpham/edit/{{ $sp->id }}" class="btn btn-warning btn-sm">Sửa</a>

                            <form action="/sanpham/delete/{{ $sp->id }}" method="POST" style="display:inline;">
                                @csrf
                                <button onclick="return confirm('Bạn có chắc muốn xóa?')" 
                                        class="btn btn-danger btn-sm">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Không có sản phẩm</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>
