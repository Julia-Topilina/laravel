<?php $__env->startSection('content'); ?>

    <h1>Регистрация</h1>

    <form action="<?php echo e(route('register')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="имя" value="<?php echo e(old('name')); ?>" required>
        <input type="email" name="email" placeholder="email" value="<?php echo e(old('email')); ?>" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="password" name="password_conf" placeholder="подвердите пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/register.blade.php ENDPATH**/ ?>