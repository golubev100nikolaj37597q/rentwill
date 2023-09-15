<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$mail->SMTPDebug = 0;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'danya2706052005@gmail.com';                     //SMTP username
$mail->Password   = 'tntcrcfpnaoqyugp';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

$currentDateTime = new DateTime();

$count = 0;
$mysql = mysqli_connect(servername, user, password, db);
$sql = "SELECT selected_date, email, id FROM orders WHERE status = 'success' AND notification_sent = 0";
$result = $mysql->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $selectedDates = json_decode($row["selected_date"]);
        $selectedDate = $selectedDates[0];
        $orderId = $row['id'];
        if (!empty($selectedDates)) {
            $orderDateTime = new DateTime($selectedDate);

            // Разница во времени между текущим временем и временем заказа
            $timeDifference = $currentDateTime->diff($orderDateTime);

            // Если разница во времени меньше или равна 24 часам
            if ($timeDifference->h <= 24 && $timeDifference->days == 0) {
                $mail->setFrom('danya2706052005@gmail.com', 'Rentwill');
                $mail->addAddress($row['email']);     //Add a recipient

                // Содержание письма
                $mail->isHTML(true); // Устанавливаем формат письма в HTML
                $mail->CharSet = 'UTF-8'; // Устанавливаем кодировку UTF-8
                $mail->Subject = 'Напоминание от агентства RentWill: До заселения осталось менее суток';
                $mail->Body = "<html><body>
                    <h1 style='color: #f5dfb5;'>Важное напоминание от агентства RentWill</h1>
                    <p style='color: #f5dfb5;'>Добрый день!</p>
                    <p style='color: #f5dfb5;'>Мы хотим вас уведомить, что ваша дата заселения на $selectedDate уже очень близко.</p>
                    <p style='color: #f5dfb5;'>Пожалуйста, будьте готовы к переезду.</p>
                    <p style='color: #f5dfb5;'>С уважением, агентство RentWill</p>
                    </body></html>";
                $count++;
                $updateSql = "UPDATE orders SET notification_sent = 1 WHERE id = $orderId";
                $mysql->query($updateSql);
            }
        }
    }
}
if ($count > 0) {
    $mail->send();
}
