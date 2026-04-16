

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
        <div>
            <h2 class="page-title">🍕 QUẢN LÝ PIZZA</h2>
            <p class="text-muted mb-0">Danh sách pizza và tìm kiếm nhanh theo tên sản phẩm.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
            <form method="GET" action="/sanpham" class="search-form d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="🔍 Tìm kiếm pizza..." value="<?php echo e($search ?? ''); ?>">
                <button class="btn btn-primary">Tìm</button>
            </form>
            <a href="/sanpham/create" class="btn btn-success">➕ Thêm</a>
        </div>
    </div>
</div>
<table class="table table-bordered table-hover shadow">
    <thead class="table-dark text-center">
<tr>
    <th>ID</th>
    <th>Tên</th>
    <th>Giá</th>
    <th>Size</th>
    <th>Số lượng</th>
    <th>Ảnh</th>
    <th>Hành động</th>
</tr>
</thead>
<?php $__currentLoopData = $sanphams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($sp->id); ?></td>
    <td><?php echo e($sp->ten); ?></td>
    <td><?php echo e($sp->gia); ?></td>
    <td><?php echo e($sp->size); ?></td>
    <td><?php echo e($sp->so_luong); ?></td>
    <td>
    <?php if($sp->hinh): ?>
        <img src="/uploads/<?php echo e($sp->hinh); ?>" width="60">
    <?php else: ?>
        Không có
    <?php endif; ?>
</td>

    <td>
        <a href="/sanpham/edit/<?php echo e($sp->id); ?>" class="btn btn-warning btn-sm">Sửa</a>

        <form action="/sanpham/delete/<?php echo e($sp->id); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <button class="btn btn-danger btn-sm">Xóa</button>
        </form>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/sanpham/index.blade.php ENDPATH**/ ?>