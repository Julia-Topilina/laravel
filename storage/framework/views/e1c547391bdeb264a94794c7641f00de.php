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
<form action="/appStore" method="post">
    <?php echo csrf_field(); ?>
    <label for="">имя</label>
    <input type="text" name="name">

    <label for="">телефон</label>
    <input type="text" name="phone">

    <label for="">город</label>
    <select name="city" id="">
       <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label for="">адрес</label>
    <input type="text" name="dress">

    данные о ковре
    <label for="">Площадь</label>
    <input type="text" name="square">
    <select name="pile_type" id="">
        <?php $__currentLoopData = $typeies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>



    <select name="color" id="">
        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <select name="return_method" id="">
        <?php $__currentLoopData = $returns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $return): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($return->id); ?>"><?php echo e($return->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <input type="submit">
</form>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/applicationCreate.blade.php ENDPATH**/ ?>