<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Формы'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
<!-- Header Section -->
<header class="header-section">
    <nav class="navigation">
        <div class="logo-container">
            <div class="logo"></div>
        </div>
        <ul class="nav-links">
            <li><a href="/">ГЛАВНАЯ</a></li>
            <li><a href="/forms">ФОРМЫ</a></li>
            <li><a href="/login">ВХОД</a></li>
            <li><a href="/register">РЕГИСТРАЦИЯ</a></li>
            <li><a href="/contacts">КОНТАКТЫ</a></li>
        </ul>
    </nav>

    <div class="auth-section">
        <button class="auth-btn" onclick="window.location.href='/login'">ВОЙТИ</button>
        <button class="auth-btn" onclick="window.location.href='/register'">РЕГИСТРАЦИЯ</button>
        <img src="<?php echo e(asset('images/search.png')); ?>" alt="Search" onerror="this.style.display='none'">
    </div>
</header>

<main class="main-content">
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<!-- Two Factor Modal -->
<div id="two-factor-modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal('two-factor-modal')">&times;</span>
        <h3>Двухфакторная аутентификация</h3>
        <p>Введите код из email/SMS для подтверждения входа</p>
        <input type="hidden" id="two-factor-user-id">
        <div class="form-group">
            <input type="text" id="two-factor-code" maxlength="6" placeholder="6-значный код">
        </div>
        <button onclick="verifyTwoFactorCode()" class="submit-btn">Подтвердить</button>
    </div>
</div>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-copyright">
            © 2026 ООО "Кристал"
        </div>
    </div>
</footer>

<script src="<?php echo e(asset('js/forms.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/main.blade.php ENDPATH**/ ?>