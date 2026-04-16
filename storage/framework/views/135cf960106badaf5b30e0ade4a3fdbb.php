

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center text-warning mb-4">✏️ Sửa nhân viên</h2>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/nhanvien/update/<?php echo e($nv->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <input name="ten" value="<?php echo e(old('ten', $nv->ten)); ?>" class="form-control mb-2">
                    <input name="email" value="<?php echo e(old('email', $nv->email)); ?>" class="form-control mb-2">
                    <input name="sdt" value="<?php echo e(old('sdt', $nv->sdt)); ?>" class="form-control mb-2">
                    <input name="chuc_vu" value="<?php echo e(old('chuc_vu', $nv->chuc_vu)); ?>" class="form-control mb-2">

                    <div class="d-flex justify-content-between">
                        <a href="/nhanvien" class="btn btn-secondary">⬅ Quay lại</a>
                        <button class="btn btn-warning">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-nhom8\resources\views/nhanvien/edit.blade.php ENDPATH**/ ?>