

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">👨‍🍳 QUẢN LÝ NHÂN VIÊN</h2>
            <p class="text-muted mb-0">Quản lý nhân viên và tìm kiếm nhanh trong hệ thống.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/nhanvien" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm nhân viên..." value="<?php echo e($search ?? request('search')); ?>">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/nhanvien/create" class="btn btn-success">➕ Thêm</a>
        </div>
    </div>
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

    <?php $__currentLoopData = $nhanviens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($nv->id); ?></td>
        <td><?php echo e($nv->ten); ?></td>
        <td><?php echo e($nv->email); ?></td>
        <td><?php echo e($nv->sdt); ?></td>
        <td><?php echo e($nv->chuc_vu); ?></td>
        <td>
            <a href="/nhanvien/edit/<?php echo e($nv->id); ?>" class="btn btn-warning btn-sm">Sửa</a>

            <form action="/nhanvien/delete/<?php echo e($nv->id); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger btn-sm">Xóa</button>
            </form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/nhanvien/index.blade.php ENDPATH**/ ?>