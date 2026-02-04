<?php
/**
 * Конфигурация Telegram Bot
 * 
 * ВАЖНО: 
 * 1. Добавьте этот файл в .gitignore!
 * 2. Никогда не коммитьте его в репозиторий
 * 3. Создайте config.example.php с пустыми значениями для других разработчиков
 */

// Telegram Bot настройки
define('TELEGRAM_BOT_TOKEN', '8599748811:AAFzpAy4fo-AFJlwH-DysTHT_N2JZjL1raw');
define('TELEGRAM_CHAT_ID', '7095691707');

// Дополнительные настройки (опционально)
define('SITE_NAME', 'Aliance Production');
define('ADMIN_EMAIL', 'a.dragunov@tdaliance.ru');

// Настройки безопасности
define('FORM_RATE_LIMIT', 60); // секунд между отправками с одного IP
define('MAX_NAME_LENGTH', 100);
define('MIN_NAME_LENGTH', 2);
define('MIN_PHONE_LENGTH', 10);
define('MAX_PHONE_LENGTH', 15);
