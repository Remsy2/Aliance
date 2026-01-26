<?php
$user_name = htmlspecialchars($_POST["username"]);
$user_phone = htmlspecialchars($_POST['userphone']);
$token = "8599748811:AAFzpAy4fo-AFJlwH-DysTHT_N2JZjL1raw";
$chat_id = "7095691707";

$formData = array(

"Клиент: " => $user_name,
"Телефон: " => $user_phone
);

$text = "";
foreach ($formData as $key => $value) {
  $text .= $key . "<b>" . $value . "</b>\n";
}

$text = urlencode($text);



$sendToTelegram = fopen(
  "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$text}&parse_mode=html",
  "r"
);


if ($sendToTelegram) {
    echo "Success";
} else {
echo "Error";
}

echo "Привет, " . $user_name . "<br>";
echo "Ваш телефон: " . $user_phone . "<br>";
