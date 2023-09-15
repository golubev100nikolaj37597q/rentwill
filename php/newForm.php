<?php

require('config.php');

$mysql = mysqli_connect(servername, user, password, db);



if(isset($_POST['name']) && isset($_POST['number']) && isset($_POST['subject'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $form = $_POST['form'];
    $mysql->query("INSERT INTO `forms`(name, number, subject, whereForm) VALUES('$name','$number','$subject','$form')");

    $botToken = '5401464457:AAHJmU9s2NzE0lerJc32e99Icrmd64loF4s';
    $chatId = '612475751';
    $message = "Новые данные:\nИмя: $name\nНомер: $number\nТема: $subject\nФорма: $form";

    $telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=".urlencode($message);

    // Используем cURL для отправки запроса к Telegram API
    $curl = curl_init($telegramApiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    echo "Данные успешно получены и обработаны.";

} else {
    echo "Ошибка: Не удалось получить данные.";
}
?>
