<?php
require($_SERVER['DOCUMENT_ROOT'].'/php/config.php');
function isPositiveInteger($value) : bool {
  return is_numeric($value) && intval($value) > 0;
}
function isNotEmpty($value) : bool {
  return isset($value) && trim($value) !== '';
}
$isValid = true;
$productName = null;
$bookingid = null;
$iframeGoogleMaps = null;
$description = null;
$short_desc = null;
$address = null;
$maxHuman = null;
$kvm = null;
$jsonUploadedFiles = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productName = $_POST['productName'] ?? '';
  $bookingid = $_POST['bookingid'] ?? '';
  $iframeGoogleMaps = $_POST['iframe-google-maps'] ?? '';
  $description = $_POST['description'] ?? '';
  $short_desc = $_POST['short_desc'] ?? '';
  $address = $_POST['adress'] ?? '';
  $maxHuman = $_POST['max-human'] ?? '';
  $kvm = $_POST['kvm'] ?? '';
  $data_json = $_POST['data_json'] ?? '';
  $closed_dates_str = $_POST['date_closed'] ?? '';
  $closed_dates = explode(',', $closed_dates_str);
  $kvm = $_POST['kvm'] ?? '';
  $discount = $_POST['discount'] ?? '';
  $ps_1 = $_POST['ps-1'] ?? '';
    $ps_3 = $_POST['ps-3'] ?? '';
    $ps_7 = $_POST['ps-7'] ?? '';
    $transfer = $_POST['transfer_value'] ?? '';
  // Удаление лишних пробелов вокруг дат
  $closed_dates = array_map('trim', $closed_dates);
  
  // Удаление пустых элементов
  $closed_dates = array_filter($closed_dates);
  
  // Преобразование дат в нужный формат
  $formattedDates = array_map(function($item) {
      return date('Y-m-d', strtotime($item));
  }, $closed_dates);
  
  // Преобразование в JSON
  $jsonClosedDates = json_encode($formattedDates);
  if (!isNotEmpty($productName)) {
    $isValid = false;
  }
  if (!isNotEmpty($bookingid)) {
    $isValid = false;
  }
  if (!isNotEmpty($short_desc)) {
      $isValid = false;
  }
  if (!isNotEmpty($iframeGoogleMaps)) {
    $isValid = false;
  }
  if (!isNotEmpty($description)) {
    $isValid = false;
  }
  if (!isNotEmpty($address)) {
    $isValid = false;
  }
  if (!isPositiveInteger($maxHuman)) {
    $isValid = false;
  }
  if (!isPositiveInteger($kvm)) {
    $isValid = false;
  }
  
  $uploadedFiles = $_FILES['productImage'] ?? null;
  $jsonUploadedFiles = [];

  if ($uploadedFiles && is_array($uploadedFiles['name'])) {
    $fileCount = count($uploadedFiles['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        if ($uploadedFiles['error'][$i] === UPLOAD_ERR_OK) {
        
        $fileTmpPath = $uploadedFiles['tmp_name'][$i];
        $fileName = $uploadedFiles['name'][$i];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        
        $newFileName = uniqid() . '.' . $fileExtension;

        
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT']. '/assets/product-img/';

        
        if (!file_exists($uploadDirectory)) {
          mkdir($uploadDirectory, 0777, true);
        }

        
        $uploadPath = $uploadDirectory . $newFileName;
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
          
          $uploadedFileInfo = array(
            'file_path' => str_replace($_SERVER['DOCUMENT_ROOT'],"",$uploadPath)
          );
          $jsonUploadedFiles[] = $uploadedFileInfo;
        } else {
          $isValid = false; // Произошла ошибка при перемещении файла
        }
      } else {
        $isValid = false; // Произошла ошибка при загрузке файла
      }
      
    }
  }

  
  $jsonUploadedFiles = json_encode($jsonUploadedFiles);
}

if ($isValid) {
  
  $mysql = mysqli_connect(servername, user, password, db);


  $arr = [
      "bookingid" => $bookingid,
      "description" => $description,
      "kvm" => $kvm,
      "short_desc" => $short_desc
];
$arr = json_encode($arr);
$stmt = $mysql->prepare("INSERT INTO `flats`(`title`, `adress`, `max_adults`, `GoogleMap`, `img`, `info`, `price_dates`, `close_dates`, `discount`,`ps-1`,`ps-3`,`ps-7`,`transfer`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)");
$stmt->bind_param("ssdssssssssss", $productName, $address, $maxHuman, $iframeGoogleMaps, $jsonUploadedFiles, $arr, $data_json, $jsonClosedDates, $discount, $ps_1, $ps_3, $ps_7, $transfer);

if ($stmt->execute()) {
    echo "Successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
}