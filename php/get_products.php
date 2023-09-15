<?php
require('config.php');

function get_product()
{
  $mysql = mysqli_connect(servername, user, password, db);
  $sql = $mysql->query("SELECT * FROM `flats`")->fetch_all();
  $result = null;

  foreach ($sql as $item) {

    $itemid = $item[0];
    $title = $item[1];
    $adress = $item[2];
    $images = get_reviews(json_decode($item[5], true));
    $info_dates = $item[9];

    $template = "
  <div class='pr-item animate__animated animate__fadeInDown  '>
      <form action='room.php?id=".$itemid."' method='post'>
      <div class='pr-header'>
        <div class='pr-form'>
          <h6>Check-in/Check-out</h6>
          <div class='d-flex align-items-center justify-content-between'>
            <input type='text' class='pr-input' data-closed-dates='$info_dates' name='date' id='MyDatepicker_$itemid'>
          </div>
        </div>
        <div class='pr-form'>
          <h6>Adults</h6>
          <div class='d-flex align-items-center justify-content-between'>
            <span id='adultsCounter".$itemid."'>0</span>
            <button type='button' onclick=\"changeValue('adultsCounter".$itemid."', 1)\">+</button>
            <button type='button' onclick=\"changeValue('adultsCounter".$itemid."', -1)\">-</button>
          </div>
        </div>
        <div class='pr-form'>
          <h6>Childs</h6>
          <div class='d-flex align-items-center justify-content-between'>
            <span id='childCounter".$itemid."'>0</span>
            <button type='button' onclick=\"changeValue('childCounter".$itemid."', 1)\">+</button>
            <button type='button' onclick=\"changeValue('childCounter".$itemid."', -1)\">-</button>
          </div>
        </div>
      </div>
      </form>
      <div class='pr-under'>
        <div class='title'>
          <h5>$title</h5>
          <p>Адрес: $adress</p>
        </div>
        <span class='white-button' id='room-button-".$itemid."'>Подробнее</span>
        <script>
        function clearLocalStorage() {
          // Здесь вы можете указать ключи, которые хотите удалить из localStorage
          localStorage.removeItem('data1');
          localStorage.removeItem('data2');
          localStorage.removeItem('adults');
          localStorage.removeItem('child');
          // Добавьте больше ключей, если необходимо
      }
      document.getElementById('room-button-".$itemid."').addEventListener('click', function (e) {
        e.preventDefault();
          clearLocalStorage(); // Удаление данных из localStorage
          window.location.href = 'room.php?id=".$itemid."';
      });
        </script>
      </div>
      <div class='in-slider owl-carousel owl-theme mx-h'>
      $images
      </div>
    </div>
";

    $result .= $template;
  }
  return $result;
}

function get_reviews($data)
{

  $result = null;

  foreach ($data as $item) {
    $item = $item['file_path'];
    $template = "        
    <div class='pr-image-item item'>
    <div class='overlay-image'></div>
    <img src='$item' class='pr-image' />
    </div>";
    $result .= $template;
  }
  return $result;
}
