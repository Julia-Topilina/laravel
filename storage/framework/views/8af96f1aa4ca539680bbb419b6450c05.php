<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'ООО Кристал'); ?></title>

    <!-- Подключение CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<!-- Header Section -->
<div class="header-section" style="height: auto; min-height: 150px;">
    <!-- Navigation -->
    <nav class="navigation" style="margin-top: 20px;">
        <div class="logo-container">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Кристал" class="logo" onerror="this.style.display='none'">
        </div>

        <ul class="nav-links">
            <li><a href="/">Главная</a></li>
            <li><a href="/login">Вход</a></li>
            <li><a href="/register">Регистрация</a></li>
            <li><a href="/callback">Обратный звонок</a></li>
            <li><a href="/order">Заказ</a></li>
            <?php if(auth()->guard()->check()): ?>
                <li><a href="/dashboard">Кабинет</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Auth Section -->
    <div class="auth-section" style="top: 100px;">
        <?php if(auth()->guard()->guest()): ?>
            <a href="/login" class="auth-btn">Вход</a>
            <a href="/register" class="auth-btn">Регистрация</a>
        <?php else: ?>
            <span style="color: #fff; margin-right: 10px;"><?php echo e(Auth::user()->name); ?></span>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="auth-btn">Выход</a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        <?php endif; ?>
    </div>
</div>

<!-- Main Content -->
<main style="min-height: 500px; background-color: #f5f5f5; padding: 40px 0;">
    <?php echo $__env->yieldContent('content'); ?>
</main>

<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-column">
                <h4>О компании</h4>
                <ul>
                    <li><a href="/about">О нас</a></li>
                    <li><a href="/news">Новости</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Продукция</h4>
                <ul>
                    <li><a href="/catalog">Каталог</a></li>
                    <li><a href="/order">Заказ</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Покупателям</h4>
                <ul>
                    <li><a href="/callback">Обратный звонок</a></li>
                    <li><a href="/faq">Вопрос-ответ</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Контакты</h4>
                <div class="contact-info">
                    <span>+7 (391) 322-22-33</span>
                </div>
                <div class="contact-info">
                    <span>info@cristal24.ru</span>
                </div>
            </div>
        </div>

        <div class="footer-divider"></div>
        <div class="footer-copyright">
            © 2025 ООО «Кристал». Все права защищены.
        </div>
    </div>
</footer>

<!-- Подключение JavaScript -->
<script src="<?php echo e(asset('js/form-handler.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>