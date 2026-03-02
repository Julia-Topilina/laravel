// Глобальные функции для работы с формами

// Показать сообщение
function showMessage(elementId, message, type) {
    const element = document.getElementById(elementId);
    if (element) {
        element.textContent = message;
        element.className = `message ${type}`;
        element.style.display = 'block';

        setTimeout(() => {
            element.style.display = 'none';
        }, 5000);
    }
}

// Клиентская валидация форм
function validateForm(formId, data) {
    const errors = {};

    switch(formId) {
        case 'register-form':
            // Валидация имени
            if (!data.name || data.name.trim().length < 2) {
                errors.name = 'Имя должно содержать минимум 2 символа';
            } else if (!/^[a-zA-Zа-яА-Я\s]+$/.test(data.name)) {
                errors.name = 'Имя может содержать только буквы и пробелы';
            }

            // Валидация email
            if (!data.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
                errors.email = 'Введите корректный email';
            }

            // Валидация телефона
            if (!data.phone || !/^[\+\d\s\(\)\-]{10,}$/.test(data.phone)) {
                errors.phone = 'Введите корректный номер телефона';
            }

            // Валидация пароля
            if (!data.password || data.password.length < 8) {
                errors.password = 'Пароль должен содержать минимум 8 символов';
            } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(data.password)) {
                errors.password = 'Пароль должен содержать заглавные, строчные буквы и цифры';
            }

            // Проверка совпадения паролей
            if (data.password !== data.password_confirmation) {
                errors.password_confirmation = 'Пароли не совпадают';
            }
            break;

        case 'login-form':
            if (!data.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
                errors.email = 'Введите корректный email';
            }
            if (!data.password || data.password.length < 1) {
                errors.password = 'Введите пароль';
            }
            break;

        case 'password-reset-form':
            if (!data.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
                errors.email = 'Введите корректный email';
            }
            break;

        case 'callback-form':
            if (!data.name || data.name.trim().length < 2) {
                errors.name = 'Имя должно содержать минимум 2 символа';
            }
            if (!data.phone || !/^[\+\d\s\(\)\-]{10,}$/.test(data.phone)) {
                errors.phone = 'Введите корректный номер телефона';
            }
            if (!data.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.email)) {
                errors.email = 'Введите корректный email';
            }
            break;

        case 'order-form':
            if (!data.customer_name || data.customer_name.trim().length < 2) {
                errors.customer_name = 'Имя должно содержать минимум 2 символа';
            }
            if (!data.customer_email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.customer_email)) {
                errors.customer_email = 'Введите корректный email';
            }
            if (!data.customer_phone || !/^[\+\d\s\(\)\-]{10,}$/.test(data.customer_phone)) {
                errors.customer_phone = 'Введите корректный номер телефона';
            }
            if (!data.address || data.address.trim().length < 5) {
                errors.address = 'Введите адрес доставки';
            }
            if (!data.quantity || data.quantity < 1) {
                errors.quantity = 'Укажите количество';
            }
            if (!data.payment_method) {
                errors.payment_method = 'Выберите способ оплаты';
            }
            break;
    }

    return errors;
}

// Отправка формы через fetch
async function submitForm(event, formId) {
    event.preventDefault();

    const form = document.getElementById(formId);
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    // Клиентская валидация
    const errors = validateForm(formId + '-form', data);
    if (Object.keys(errors).length > 0) {
        const errorMessages = Object.values(errors).join(', ');
        showMessage(formId + '-message', 'Ошибки валидации: ' + errorMessages, 'error');
        return;
    }

    // Определяем URL и метод
    let url = '';
    let method = 'POST';

    switch(formId) {
        case 'login':
            url = '/api/login';
            break;
        case 'register':
            url = '/api/register';
            break;
        case 'password-reset':
            url = '/api/password/email';
            break;
        case 'callback':
            url = '/api/callback';
            break;
        case 'order':
            url = '/api/order';
            break;
    }

    // Получаем CSRF токен из meta тега
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    try {
        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (response.ok && result.success) {
            showMessage(formId + '-message', result.message || 'Операция выполнена успешно!', 'success');
            form.reset();

            // Если требуется двухфакторная аутентификация
            if (result.requires_two_factor) {
                showTwoFactorModal(result.user_id);
            }
        } else {
            if (result.errors) {
                const errorMessages = Object.values(result.errors).flat().join(', ');
                showMessage(formId + '-message', errorMessages, 'error');
            } else {
                showMessage(formId + '-message', result.message || 'Произошла ошибка при отправке', 'error');
            }
        }
    } catch (error) {
        console.error('Error:', error);
        showMessage(formId + '-message', 'Ошибка соединения с сервером', 'error');
    }
}

// Показать модальное окно для 2FA
function showTwoFactorModal(userId) {
    const modal = document.getElementById('two-factor-modal');
    const userIdInput = document.getElementById('two-factor-user-id');

    if (modal && userIdInput) {
        userIdInput.value = userId;
        modal.style.display = 'block';
    }
}

// Закрыть модальное окно
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}

// Подтверждение 2FA кода
async function verifyTwoFactorCode() {
    const code = document.getElementById('two-factor-code').value;
    const userId = document.getElementById('two-factor-user-id').value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    if (!code || code.length !== 6) {
        alert('Введите 6-значный код');
        return;
    }

    try {
        const response = await fetch('/api/verify-2fa', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                user_id: userId,
                code: code
            })
        });

        const result = await response.json();

        if (result.success) {
            closeModal('two-factor-modal');
            showMessage('login-message', 'Вход выполнен успешно', 'success');
        } else {
            alert(result.message || 'Неверный код');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ошибка при проверке кода');
    }
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    // Добавляем обработчики для форм
    const forms = ['login', 'register', 'password-reset', 'callback', 'order'];

    forms.forEach(formId => {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', (e) => submitForm(e, formId));
        }
    });

    // Закрытие модального окна при клике на крестик
    const closeButtons = document.querySelectorAll('.close-modal');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.modal');
            if (modal) {
                modal.style.display = 'none';
            }
        });
    });

    // Закрытие модального окна при клике вне его
    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });

    // Маска для телефона
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.length <= 1) {
                    value = '+7' + value;
                } else if (value.length <= 4) {
                    value = '+7 (' + value.substring(1, 4);
                } else if (value.length <= 7) {
                    value = '+7 (' + value.substring(1, 4) + ') ' + value.substring(4, 7);
                } else if (value.length <= 9) {
                    value = '+7 (' + value.substring(1, 4) + ') ' + value.substring(4, 7) + '-' + value.substring(7, 9);
                } else {
                    value = '+7 (' + value.substring(1, 4) + ') ' + value.substring(4, 7) + '-' + value.substring(7, 9) + '-' + value.substring(9, 11);
                }
                e.target.value = value;
            }
        });
    });
});
