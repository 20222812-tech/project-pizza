

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">📦 Danh sách đơn hàng</h2>
            <p class="text-muted mb-0">Tìm kiếm và quản lý đơn hàng nhanh chóng trong hệ thống.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form action="/donhang" method="GET" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm đơn hàng..." value="<?php echo e($search ?? ''); ?>">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/donhang/create" class="btn btn-success">Tạo đơn hàng</a>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<table class="table table-bordered table-hover shadow text-center">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Khách</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $donhangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($dh->id); ?></td>
            <td><?php echo e($dh->ten_khach); ?></td>
            <td><?php echo e($dh->sdt); ?></td>
            <td><?php echo e($dh->dia_chi); ?></td>
            <td><?php echo e($dh->sanpham?->ten ?? $dh->san_pham_id); ?></td>
            <td><?php echo e($dh->so_luong); ?></td>
            <td><?php echo e(number_format($dh->tong_tien)); ?> đ</td>
            <td>
                <form action="/donhang/update-status/<?php echo e($dh->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <select name="trang_thai" onchange="this.form.submit()" class="form-control">
                        <option value="Chờ xử lý" <?php echo e($dh->trang_thai == 'Chờ xử lý' ? 'selected' : ''); ?>>
                            Chờ xử lý
                        </option>
                        <option value="Đang giao" <?php echo e($dh->trang_thai == 'Đang giao' ? 'selected' : ''); ?>>
                            Đang giao
                        </option>
                        <option value="Hoàn thành" <?php echo e($dh->trang_thai == 'Hoàn thành' ? 'selected' : ''); ?>>
                            Hoàn thành
                        </option>
                    </select>
                </form>
            </td>
            <td>
                <form action="/donhang/delete/<?php echo e($dh->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="9">Chưa có đơn hàng nào.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/donhang/index.blade.php ENDPATH**/ ?>