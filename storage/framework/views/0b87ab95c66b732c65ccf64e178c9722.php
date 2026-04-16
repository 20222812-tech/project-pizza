

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">👥 QUẢN LÝ NGƯỜI DÙNG</h2>
            <p class="text-muted mb-0">Phân quyền và quản lý tài khoản người dùng.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/users" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm người dùng..." value="<?php echo e($search ?? ''); ?>">
                <button class="btn btn-primary">Tìm</button>
            </form>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<div class="row mb-3">
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body text-center">
                <h5>🔐 Admin</h5>
                <h3><?php echo e(\App\Models\User::where('role', 'admin')->count()); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <h5>📋 Quản lý</h5>
                <h3><?php echo e(\App\Models\User::where('role', 'manager')->count()); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body text-center">
                <h5>👤 Nhân viên</h5>
                <h3><?php echo e(\App\Models\User::where('role', 'staff')->count()); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h5>📦 Kho</h5>
                <h3><?php echo e(\App\Models\User::where('role', 'warehouse')->count()); ?></h3>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-hover shadow">
    <thead class="table-dark text-center">
        <tr>
            <th style="width: 5%">ID</th>
            <th style="width: 30%">Tên</th>
            <th style="width: 30%">Email</th>
            <th style="width: 20%">Quyền</th>
            <th style="width: 15%">Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td class="text-center"><?php echo e($user->id); ?></td>
            <td><strong><?php echo e($user->name); ?></strong></td>
            <td><?php echo e($user->email); ?></td>
            <td class="text-center">
                <?php if($user->role === 'admin'): ?>
                    <span class="badge bg-danger">🔐 Admin</span>
                <?php elseif($user->role === 'manager'): ?>
                    <span class="badge bg-info">📋 Quản lý</span>
                <?php elseif($user->role === 'warehouse'): ?>
                    <span class="badge bg-warning text-dark">📦 Kho</span>
                <?php else: ?>
                    <span class="badge bg-primary">👤 Nhân viên</span>
                <?php endif; ?>
            </td>
            <td class="text-center">
                <?php if(auth()->user()->id !== $user->id): ?>
                    <a href="/users/edit/<?php echo e($user->id); ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="/users/delete/<?php echo e($user->id); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa người dùng này?')">Xóa</button>
                    </form>
                <?php else: ?>
                    <span class="text-muted">(Chính bạn)</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5" class="text-center text-muted">Chưa có người dùng nào.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/users/index.blade.php ENDPATH**/ ?>