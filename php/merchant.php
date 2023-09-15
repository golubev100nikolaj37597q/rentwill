<?php

require('admin.php');
function create_translation($amount)
{
    if (!function_exists('curl_version')) {
        echo ('cURL extension is not enabled.');
    }

    $post = [
        'command' => 'v',
        'amount' => '1',
        'currency' => "498",
        'description' => 'RentWiil',
        'language' => 'en',
        'client_ip_addr' => '127.0.0.1',
        'msg_type' => 'SMS',
    ];

    $url = 'https://maib.ecommerce.md:21440/ecomm/MerchantHandler';


    $ssl_cert_path = $_SERVER['DOCUMENT_ROOT'] . "/php/MAIB-CERT.pem";


    $ssl_cert_password = ssl_cert_password;


    $ch = curl_init($url);


    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_setopt($ch, CURLOPT_SSLCERT, $ssl_cert_path);
    curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $ssl_cert_password);


    $response = curl_exec($ch);


    if (curl_errno($ch)) {
        $errors = curl_error($ch);
        echo "cURL Error: $errors";
    }


    curl_close($ch);



    $trans_id = str_replace("TRANSACTION_ID: ", "", $response);
    $link = "https://maib.ecommerce.md:21443/ecomm/ClientHandler?trans_id=$trans_id";
    return ["trans_id" => $trans_id, "link" => $link];
}
function check_payment()
{
    $mysql = mysqli_connect(servername, user, password, db);
    $twentyFourHoursAgo = time() - (24 * 60 * 60);
    $items = $mysql->query("SELECT * FROM `orders` WHERE `date` > '$twentyFourHoursAgo' AND `status` = 'CREATED'")->fetch_all();
    foreach ($items as $item) {

        $trasn_id = $item[13];
        $post = [
            'command' => 'c',
            'trans_id' => $trasn_id,
            'client_ip_addr' => '127.0.0.1'
        ];

        $url = 'https://maib.ecommerce.md:21440/ecomm/MerchantHandler';


        $ssl_cert_path = $_SERVER['DOCUMENT_ROOT'] . "/php/MAIB-CERT.pem";


        $ssl_cert_password = ssl_cert_password;


        $ch = curl_init($url);


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_SSLCERT, $ssl_cert_path);
        curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $ssl_cert_password);

        $response = curl_exec($ch);
        $elements = preg_split('/\s+/', $response);
        $elements = implode(',', $elements);
        $elements = explode(",", $elements);
        $result = $elements[1];
        $connection = mysqli_connect(servername, user, password, db);
        $connection->query("UPDATE `orders` SET `status`= '$result' WHERE `transction_id` = '$trasn_id'");
        if ($result == "OK") {

            $sql = $connection->query("SELECT * FROM orders WHERE transction_id = $trasn_id")->fetch_array();
            $settings = get_settings();
            $botToken = $settings['telegram_api'];
            $chatId = $settings['telegram_chat'];
            $message = "<b>Поступило Оплата!</b>\n\nНомер телефона - {$sql['phone']}\n\n";

            $telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&parse_mode=HTML&text=" . urlencode($message);

            $curl = curl_init($telegramApiUrl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
        }
        $connection->close();
        if (curl_errno($ch)) {
            $errors = curl_error($ch);
            echo "cURL Error: $errors";
        }


        curl_close($ch);
        break;
    }
}

