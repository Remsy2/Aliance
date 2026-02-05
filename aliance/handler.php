<?php
// Получаем и санитизируем данные формы
$user_name  = isset($_POST['username']) ? trim($_POST['username']) : '';
$user_phone = isset($_POST['userphone']) ? trim($_POST['userphone']) : '';

$user_name  = htmlspecialchars($user_name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$user_phone = htmlspecialchars($user_phone, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

$token   = "8599748811:AAFzpAy4fo-AFJlwH-DysTHT_N2JZjL1raw";
$chat_id = "7095691707";

// Формируем сообщение
$text  = "Клиент: <b>{$user_name}</b>\n";
$text .= "Телефон: <b>{$user_phone}</b>\n";

// Отправляем в Telegram через cURL (надёжнее, чем fopen/file_get_contents)
$apiUrl = "https://api.telegram.org/bot{$token}/sendMessage";

$postFields = [
  'chat_id'    => $chat_id,
  'text'       => $text,
  'parse_mode' => 'HTML',
];

$ok = false;

if (function_exists('curl_init')) {
  $ch = curl_init($apiUrl);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $response = curl_exec($ch);
  $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($response !== false && $httpCode >= 200 && $httpCode < 300) {
    $json = json_decode($response, true);
    $ok = is_array($json) && !empty($json['ok']);
  }
}

// Возвращаем клиенту ровно те же маркеры, что и раньше (Success / Error)
if ($ok) {
  echo "Success";
} else {
  echo "Error";
}

// Оставляем отладочный вывод, как в вашем исходном варианте
echo "Привет, " . $user_name . "<br>";
echo "Ваш телефон: " . $user_phone . "<br>";
