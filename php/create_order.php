<?php
require('config.php');
require('merchant.php');
$way = $_POST["way"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$time = time();
$document_input = isset($_POST["document_input"]) ? $_POST["document_input"] : null;
$comment = $_POST["comment"];
$subject = $_POST["subject"];
$transfer = isset($_POST["transfer"]) ? $_POST["transfer"] : false;
$radio = $_POST["radio"];
$total_cost = $_POST["total_cost"];
$id_flat = $_POST["id_flat"];
$selected_date = $_POST["selectedDates"];
$selected_date_arr = json_decode($selected_date);
$pay_info = create_translation($total_cost);
$pay_link = $pay_info['link'];
$transaction_id = $pay_info['trans_id'];
$status = "CREATED";
// Проверяем, было ли загружено изображение
$jsonData = "{}";
if (isset($_FILES['document_input'])) {
  // Код для обработки и сохранения изображения, как было показано ранее
  $imageFile = $_FILES['document_input']['tmp_name'];
  $imageName = $_FILES['document_input']['name'];
  $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/assets/docs/';

  // Проверяем тип изображения, чтобы убедиться, что это действительно изображение
  $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
  if (in_array($_FILES['document_input']['type'], $allowedTypes)) {
    // Генерируем уникальное имя для изображения, чтобы избежать перезаписи файлов
    $imageName = uniqid() . '_' . $imageName;
    $uploadPath = $uploadDirectory . $imageName;

    if (move_uploaded_file($imageFile, $uploadPath)) {
      // Изображение успешно загружено
      // Создаем массив с информацией о фото
      $photoData = array(
        "image_url" => "/assets/docs/" . $imageName
      );

      // Преобразуем массив в JSON формат
      $jsonData = json_encode($photoData);
    }
  }
}

$connection = mysqli_connect(servername, user, password, db);

$query = "SELECT close_dates FROM flats WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id_flat);
$stmt->execute();
$stmt->bind_result($closedDates);
$stmt->fetch();
$stmt->close();

// Шаг 2: Декодируйте JSON-строку в массив PHP.
// Декодируем JSON-строку и преобразуем ее в массив
$closedDatesArray = json_decode($closedDates);

if (!empty($closedDatesArray) && !is_null($closedDatesArray)) {
    foreach($selected_date_arr as $arr_el){
      array_push($closedDatesArray, $arr_el);
    }
    $jsonString = json_encode($closedDatesArray);
} else {
    $jsonString = json_encode($selected_date_arr);
  
}
// Шаг 5: Обновите запись в таблице flats с новым значением closed_dates.
$updateQuery = "UPDATE flats SET close_dates = ? WHERE id = ?";
$updateStmt = $connection->prepare($updateQuery);
$updateStmt->bind_param("si", $jsonString, $id_flat);
$updateStmt->execute();
$updateStmt->close();

$stmt = $connection->prepare("INSERT INTO orders (id_flat, amount, date, way, name, phone, email, img, comment, playstation, transfer, type_pay, transction_id, selected_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iisssssssssssss", $id_flat, $total_cost, $time, $way, $name, $phone, $email, $jsonData, $comment, $subject, $transfer, $radio, $transaction_id, $selected_date, $status);

$stmt->execute();
$stmt->close();
$connection->close();

$settings = get_settings();
$botToken = $settings['telegram_api'];
$chatId = $settings['telegram_chat'];
if ($radio == "full_cost") {
  $radio = "Оплата полной стоимости";
}
if ($radio == "pay_first_days") {
  $radio = "Оплата первых дней";
}
if ($radio == "pay_checkIN") {
  $radio = "Оплата при заселении";
}
if ($way == "standard") {
  $way = "Обычное заселение";
} else {
  $way = "Бесконтакное заселение";
}
$transfer = $transfer == "false" ? "Не нужен" : "Нужен";
$date = date("Y-m-d", $time);
$message = "<b>Поступило новое бронирование!</b>\n\nТип заселения $way\nСумма заказа $total_cost\nФИО $name\nКомментарий\n$comment\nТариф PS: $subject\nТакси с аиропорта: $transfer\nТип оплаты $radio\nВыбранные даты $selected_date\nДата создания заявки: $date";

$telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&parse_mode=HTML&text=" . urlencode($message);

// Используем cURL для отправки запроса к Telegram API
$curl = curl_init($telegramApiUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

echo $pay_link;
