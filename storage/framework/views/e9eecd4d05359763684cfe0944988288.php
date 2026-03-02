<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if(auth()->guard()->guest()): ?>
    <a href="<?php echo e(route('login')); ?>">Вход</a>
    <a href="<?php echo e(route('register')); ?>">Регистрация</a>
<?php endif; ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/theme.blade.php ENDPATH**/ ?>