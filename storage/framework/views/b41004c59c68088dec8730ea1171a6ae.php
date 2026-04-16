<!DOCTYPE html>
<html>
<head>
    <title>Admin Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .page-header {
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }
        .page-title {
            font-size: 2rem;
            font-weight: 700;
        }
        .page-header .search-form .form-control {
            min-width: 250px;
        }
        .page-header .search-form .btn {
            white-space: nowrap;
        }
        .table thead th {
            background-color: #212529;
            color: #fff;
        }
    </style>
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="/admin">🍕 Pizza Admin</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav me-auto">

                <a href="/admin"
                   class="nav-link <?php echo e(request()->is('admin') ? 'btn-warning' : 'btn-outline-light'); ?> btn me-2">
                    🏠 Trang chủ
                </a>

                <?php if(auth()->check() && auth()->user()->hasRole(['admin', 'manager'])): ?>
                    <a href="/nhanvien"
                       class="nav-link <?php echo e(request()->is('nhanvien*') ? 'btn-warning' : 'btn-outline-light'); ?> btn me-2">
                        👨‍🍳 Nhân viên
                    </a>

                    <a href="/sanpham"
                       class="nav-link <?php echo e(request()->is('sanpham*') ? 'btn-warning' : 'btn-outline-light'); ?> btn me-2">
                        🍕 Sản phẩm
                    </a>

                    <a href="/khachhang"
                       class="nav-link <?php echo e(request()->is('khachhang*') ? 'btn-warning' : 'btn-outline-light'); ?> btn me-2">
                        👥 Khách hàng
                    </a>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole(['admin', 'manager', 'staff'])): ?>
                    <a href="/donhang"
                       class="nav-link <?php echo e(request()->is('donhang*') ? 'btn-warning' : 'btn-outline-light'); ?> btn me-2">
                        📦 Đơn hàng
                    </a>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->hasRole(['admin', 'warehouse'])): ?>
                    <a href="/kho"
                       class="nav-link <?php echo e(request()->is('kho*') ? 'btn-warning' : 'btn-outline-light'); ?> btn me-2">
                        📦 Nguyên liệu
                    </a>
                <?php endif; ?>

                <?php if(auth()->check() && auth()->user()->isAdmin()): ?>
                    <a href="/users"
                       class="nav-link <?php echo e(request()->is('users*') ? 'btn-warning' : 'btn-outline-light'); ?> btn me-2">
                        👥 Người dùng
                    </a>
                <?php endif; ?>

            </div>

            <?php if(auth()->check()): ?>
            <div class="d-flex gap-2 align-items-center">
                <span class="text-light me-2">
                    <strong><?php echo e(auth()->user()->name); ?></strong>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <span class="badge bg-danger ms-2">🔐 Admin</span>
                    <?php elseif(auth()->user()->isManager()): ?>
                        <span class="badge bg-info ms-2">📋 Quản lý</span>
                    <?php elseif(auth()->user()->isWarehouse()): ?>
                        <span class="badge bg-warning text-dark ms-2">📦 Kho</span>
                    <?php else: ?>
                        <span class="badge bg-primary ms-2">👤 Nhân viên</span>
                    <?php endif; ?>
                </span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/layouts/app.blade.php ENDPATH**/ ?>