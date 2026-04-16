

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">👥 QUẢN LÝ KHÁCH HÀNG</h2>
            <p class="text-muted mb-0">Danh sách khách hàng và tìm kiếm nhanh trong hệ thống.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/khachhang" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm khách hàng..." value="<?php echo e($search ?? ''); ?>">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/khachhang/create" class="btn btn-success">➕ Thêm</a>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<table class="table table-bordered table-hover shadow">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Tên khách</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Tổng chi tiêu</th>
            <th>Số đơn hàng</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $khachhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($kh->id); ?></td>
            <td><strong><?php echo e($kh->ten); ?></strong></td>
            <td><?php echo e($kh->sdt); ?></td>
            <td><?php echo e($kh->email ?? '-'); ?></td>
            <td><?php echo e($kh->dia_chi ?? '-'); ?></td>
            <td class="text-success"><strong><?php echo e(number_format($kh->tong_chi_tieu)); ?> đ</strong></td>
            <td class="text-center"><?php echo e($kh->so_don_hang); ?></td>
            <td>
                <a href="/khachhang/edit/<?php echo e($kh->id); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="/khachhang/delete/<?php echo e($kh->id); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="8" class="text-center text-muted">Chưa có khách hàng nào.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/khachhang/index.blade.php ENDPATH**/ ?>