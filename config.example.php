<?php
/**
 * Пример конфигурационного файла
 * 
 * ИНСТРУКЦИЯ:
 * 1. Скопируйте этот файл и переименуйте его в config.php
 * 2. Заполните все значения своими данными
 * 3. config.php не будет попадать в git (он в .gitignore)
 */

// Telegram Bot настройки
// Получите токен у @BotFather в Telegram
define('TELEGRAM_BOT_TOKEN', 'YOUR_BOT_TOKEN_HERE');

// ID чата, куда будут приходить уведомления
// Получите ID через @userinfobot в Telegram
define('TELEGRAM_CHAT_ID', 'YOUR_CHAT_ID_HERE');

// Дополнительные настройки
define('SITE_NAME', 'Aliance Production');
define('ADMIN_EMAIL', 'your-email@example.com');

// Настройки безопасности
define('FORM_RATE_LIMIT', 60); // секунд между отправками с одного IP
define('MAX_NAME_LENGTH', 100);
define('MIN_NAME_LENGTH', 2);
define('MIN_PHONE_LENGTH', 10);
define('MAX_PHONE_LENGTH', 15);
