

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">📦 QUẢN LÝ NGUYÊN LIỆU</h2>
            <p class="text-muted mb-0">Theo dõi tồn kho nguyên liệu và cảnh báo hết hàng.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/kho" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm nguyên liệu..." value="<?php echo e($search ?? ''); ?>">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/kho/create" class="btn btn-success">➕ Thêm</a>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<div class="row mb-3">
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h5>⚠️ Cảnh báo</h5>
                <h3><?php echo e($materials->filter(fn($m) => $m->isCanhBao())->count()); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <h5>📊 Tổng nguyên liệu</h5>
                <h3><?php echo e($materials->count()); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body text-center">
                <h5>✅ Đủ hàng</h5>
                <h3><?php echo e($materials->filter(fn($m) => !$m->isCanhBao())->count()); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body text-center">
                <h5>🚫 Hết hàng</h5>
                <h3><?php echo e($materials->filter(fn($m) => $m->so_luong == 0)->count()); ?></h3>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-hover shadow">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Đơn vị</th>
            <th>Tồn kho</th>
            <th>Mức tối thiểu</th>
            <th>Giá nhập</th>
            <th>Trạng thái</th>
            <th>Ngày nhập</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($material->id); ?></td>
            <td><strong><?php echo e($material->ten); ?></strong></td>
            <td class="text-center"><?php echo e($material->don_vi); ?></td>
            <td class="text-center"><strong><?php echo e($material->so_luong); ?></strong></td>
            <td class="text-center"><?php echo e($material->so_luong_toi_thieu); ?></td>
            <td class="text-right"><?php echo e(number_format($material->gia_nhap)); ?> đ</td>
            <td class="text-center">
                <?php if($material->so_luong == 0): ?>
                    <span class="badge bg-danger">Hết hàng</span>
                <?php elseif($material->isCanhBao()): ?>
                    <span class="badge bg-warning text-dark">⚠️ Cảnh báo</span>
                <?php else: ?>
                    <span class="badge bg-success">Đủ hàng</span>
                <?php endif; ?>
            </td>
            <td><?php echo e($material->ngay_nhap->format('d/m/Y')); ?></td>
            <td>
                <a href="/kho/edit/<?php echo e($material->id); ?>" class="btn btn-warning btn-sm">Sửa</a>
                <form action="/kho/delete/<?php echo e($material->id); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="9" class="text-center text-muted">Chưa có nguyên liệu nào.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/kho/index.blade.php ENDPATH**/ ?>