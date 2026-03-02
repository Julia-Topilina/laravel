<?php $__env->startSection('title', 'Главная - Кристал'); ?>

<?php $__env->startSection('content'); ?>
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <div style="text-align: center; margin-bottom: 50px;">
            <h1 style="font-size: 36px; color: #333; margin-bottom: 20px;">ООО «Кристал»</h1>
            <p style="font-size: 18px; color: #666;">Производство и продажа бытовой и автомобильной химии</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; padding: 20px;">
            <!-- Форма авторизации -->
            <div style="background: #fff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
                <h2 style="margin-bottom: 20px; color: #3781c4;">Авторизация</h2>
                <p style="margin-bottom: 25px; color: #666;">Вход в личный кабинет</p>
                <a href="/login" class="submit-btn" style="display: inline-block; width: auto; padding: 10px 40px; text-decoration: none;">Войти</a>
            </div>

            <!-- Форма регистрации -->
            <div style="background: #fff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
                <h2 style="margin-bottom: 20px; color: #3781c4;">Регистрация</h2>
                <p style="margin-bottom: 25px; color: #666;">Создание нового аккаунта</p>
                <a href="/register" class="submit-btn" style="display: inline-block; width: auto; padding: 10px 40px; text-decoration: none;">Зарегистрироваться</a>
            </div>

            <!-- Форма обратного звонка -->
            <div style="background: #fff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
                <h2 style="margin-bottom: 20px; color: #3781c4;">Обратный звонок</h2>
                <p style="margin-bottom: 25px; color: #666;">Закажите звонок</p>
                <a href="/callback" class="submit-btn" style="display: inline-block; width: auto; padding: 10px 40px; text-decoration: none;">Заказать</a>
            </div>

            <!-- Форма онлайн-заказа -->
            <div style="background: #fff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
                <h2 style="margin-bottom: 20px; color: #3781c4;">Онлайн-заказ</h2>
                <p style="margin-bottom: 25px; color: #666;">Оформление заказа</p>
                <a href="/order" class="submit-btn" style="display: inline-block; width: auto; padding: 10px 40px; text-decoration: none;">Заказать</a>
            </div>

            <!-- Восстановление пароля -->
            <div style="background: #fff; border-radius: 10px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
                <h2 style="margin-bottom: 20px; color: #3781c4;">Восстановление пароля</h2>
                <p style="margin-bottom: 25px; color: #666;">Забыли пароль?</p>
                <a href="/password-reset" class="submit-btn" style="display: inline-block; width: auto; padding: 10px 40px; text-decoration: none;">Восстановить</a>
            </div>
        </div>

        <!-- Информация о статусе -->
        <div style="text-align: center; margin-top: 50px; padding: 20px; background: #f5f5f5; border-radius: 10px;">
            <?php if(auth()->guard()->check()): ?>
                <p style="font-size: 18px; color: #333;">
                    Вы авторизованы как: <strong><?php echo e(Auth::user()->name); ?></strong>
                    <?php if(Auth::user()->two_factor_enabled): ?>
                        <span style="display: inline-block; margin-left: 10px; padding: 5px 10px; background: #28a745; color: #fff; border-radius: 5px; font-size: 14px;">2FA включена</span>
                    <?php endif; ?>
                </p>
                <div style="margin-top: 20px;">
                    <a href="/dashboard" class="auth-btn" style="display: inline-block; margin-right: 10px;">Личный кабинет</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="auth-btn" style="background-color: #dc3545;">Выйти</a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            <?php else: ?>
                <p style="font-size: 18px; color: #666;">Вы не авторизованы. Выберите действие выше.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/index.blade.php ENDPATH**/ ?>