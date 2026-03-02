<?php $__env->startSection('content'); ?>

    <h1>Вход</h1>

    <form action="<?php echo e(route('login')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="email" name="email" placeholder="email" value="<?php echo e(old('email')); ?>" required>
        <input type="password" name="password" placeholder="password" required>
        <button type="submit">Войти</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>