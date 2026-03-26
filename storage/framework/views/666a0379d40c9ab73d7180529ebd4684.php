<!DOCTYPE html>
<html>
<head>
    <title>Nhân viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <h2 class="text-center text-primary mb-4">🍕 QUẢN LÝ NHÂN VIÊN</h2>

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
            <?php $__currentLoopData = $nhanviens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($nv->id); ?></td>
                <td><?php echo e($nv->ten); ?></td>
                <td><?php echo e($nv->email); ?></td>
                <td><?php echo e($nv->sdt); ?></td>
                <td><?php echo e($nv->chuc_vu); ?></td>
                <td class="text-center">
                    <a href="/nhanvien/edit/<?php echo e($nv->id); ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="/nhanvien/delete/<?php echo e($nv->id); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>

</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/nhanvien/index.blade.php ENDPATH**/ ?>