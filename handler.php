<?php
// Включаем отображение ошибок только для разработки
// В продакшене установите в 0
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Проверяем, что запрос POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

// Проверяем наличие необходимых полей
if (empty($_POST['username']) || empty($_POST['userphone'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

// Очищаем и валидируем данные
$user_name = htmlspecialchars(trim($_POST["username"]), ENT_QUOTES, 'UTF-8');
$user_phone = htmlspecialchars(trim($_POST['userphone']), ENT_QUOTES, 'UTF-8');

// Базовая валидация имени
if (strlen($user_name) < 2 || strlen($user_name) > 100) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid name length']);
    exit;
}

// Базовая валидация телефона
$phone_digits = preg_replace('/\D/', '', $user_phone);
if (strlen($phone_digits) < 10 || strlen($phone_digits) > 15) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid phone number']);
    exit;
}

// ВАЖНО: Храните эти данные в отдельном конфигурационном файле
// который не попадает в git (добавьте в .gitignore)
// Например, создайте config.php:
// <?php
// define('TELEGRAM_BOT_TOKEN', 'ваш_токен');
// define('TELEGRAM_CHAT_ID', 'ваш_chat_id');
// ?>
// И подключите: require_once 'config.php';

$token = "8599748811:AAFzpAy4fo-AFJlwH-DysTHT_N2JZjL1raw";
$chat_id = "7095691707";

// Формируем сообщение
$message = "🔔 <b>Новая заявка с сайта</b>\n\n";
$message .= "👤 <b>Имя:</b> " . $user_name . "\n";
$message .= "📱 <b>Телефон:</b> " . $user_phone . "\n";
$message .= "🕐 <b>Дата:</b> " . date('d.m.Y H:i:s') . "\n";

// Кодируем сообщение для URL
$text = urlencode($message);

// Формируем URL для отправки в Telegram
$url = "https://api.telegram.org/bot{$token}/sendMessage";
$url .= "?chat_id={$chat_id}";
$url .= "&text={$text}";
$url .= "&parse_mode=html";

// Отправляем запрос с использованием cURL (более надежный метод)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// Проверяем результат отправки
if ($response && $httpCode === 200) {
    $responseData = json_decode($response, true);
    
    if (isset($responseData['ok']) && $responseData['ok'] === true) {
        // Успешная отправка
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'message' => 'Заявка успешно отправлена'
        ]);
    } else {
        // Ошибка API Telegram
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => 'Ошибка отправки в Telegram'
        ]);
        // Логируем ошибку (в продакшене используйте файл логов)
        error_log("Telegram API Error: " . print_r($responseData, true));
    }
} else {
    // Ошибка соединения
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Ошибка соединения с сервером'
    ]);
    // Логируем ошибку
    error_log("cURL Error: " . $curlError . " | HTTP Code: " . $httpCode);
}
