<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('products.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="название" value="<?php echo e(old('name')); ?>">
        <input type="number" name="price" placeholder="Цена" value="<?php echo e(old('price')); ?>">
        <textarea name="description" placeholder="Описание"><?php echo e(old('description')); ?></textarea>
        <input type="submit" value="Сохранить">
        <a href="<?php echo e(route('products.index')); ?>">Отмена</a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/products/create.blade.php ENDPATH**/ ?>