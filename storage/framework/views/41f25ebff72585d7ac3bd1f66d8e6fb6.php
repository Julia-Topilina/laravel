<?php $__env->startSection('title', 'UI Kit - Элементы форм'); ?>

<?php $__env->startSection('content'); ?>
    <div class="ui-kit">
        <h2>UI Kit - Элементы форм</h2>
        <p style="text-align: center; margin-bottom: 30px; color: #666;">
            Тема дипломной работы: Разработка защищенной системы аутентификации и управления доступом в веб-приложениях
        </p>

        <div class="ui-kit-grid">
            <div class="form-group">
                <label>Text Input (текстовое поле)</label>
                <input type="text" placeholder="Пример текстового поля">
                <small class="requirements">Допустимые символы: буквы, цифры, пробел</small>
            </div>

            <div class="form-group">
                <label>Textarea (многострочное поле)</label>
                <textarea placeholder="Пример textarea"></textarea>
            </div>

            <div class="form-group">
                <label>Select (выпадающий список)</label>
                <select>
                    <option>Опция 1</option>
                    <option>Опция 2</option>
                    <option>Опция 3</option>
                </select>
            </div>

            <div class="form-group">
                <label>File Input (загрузка файла)</label>
                <input type="file">
            </div>

            <div class="form-group">
                <label>Checkbox (флажки)</label>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox"> Опция 1
                    </label>
                    <label>
                        <input type="checkbox"> Опция 2
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Radio (переключатели)</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="radio"> Вариант 1
                    </label>
                    <label>
                        <input type="radio" name="radio"> Вариант 2
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Submit Button (кнопка отправки)</label>
                <button class="submit-btn">Отправить</button>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 30px;">
        <div class="form-card">
            <h3>Требования к формам</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 10px;">✓ Обязательные поля помечены *</li>
                <li style="margin-bottom: 10px;">✓ Email: стандартный формат email</li>
                <li style="margin-bottom: 10px;">✓ Пароль: минимум 8 символов, заглавные, строчные, цифры</li>
                <li style="margin-bottom: 10px;">✓ Телефон: формат +7 (XXX) XXX-XX-XX</li>
                <li style="margin-bottom: 10px;">✓ Имя: только буквы и пробелы</li>
            </ul>
        </div>

        <div class="form-card">
            <h3>Навигация по формам</h3>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <a href="/login" class="auth-btn" style="text-decoration: none; text-align: center;">Форма авторизации</a>
                <a href="/register" class="auth-btn" style="text-decoration: none; text-align: center;">Форма регистрации</a>
                <a href="/password-reset" class="auth-btn" style="text-decoration: none; text-align: center;">Восстановление пароля</a>
                <a href="/callback" class="auth-btn" style="text-decoration: none; text-align: center;">Обратный звонок</a>
                <a href="/order" class="auth-btn" style="text-decoration: none; text-align: center;">Онлайн-заказ</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>