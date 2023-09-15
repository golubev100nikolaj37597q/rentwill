<?php

function create_aside()
{
  return '
  <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
  <!-- Collapse -->
  <div class="nav-item">
    <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuDashboards" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuDashboards" aria-expanded="true" aria-controls="navbarVerticalMenuDashboards">
      <i class="bi-house-door nav-icon"></i>
      <span class="nav-link-title">Основное</span>
    </a>
                  <div id="navbarVerticalMenuDashboards" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenu">
  <a class="nav-link " href="./index.php">Главная</a>
  <a class="nav-link " href="./account-settings.php">Настройки</a>
  <a class="nav-link" href="./ecommerce-products.php">Квартиры</a>
  <a class="nav-link" href="./ecommerce-orders.php">Бронирования</a>
</div>
</div>';
}

function render_order()
{
  $mysql = mysqli_connect(servername, user, password, db);
  $rows = $mysql->query("SELECT * FROM orders")->fetch_all();
  $result = "";
  foreach ($rows as $row) {
    $id = $row[0];
    $date = date("Y-m-d", $row[3]);
    $name = $row[5];
    $phone = $row[6];
    $selected_date = json_decode($row[14],true);
    $first_selected_date = $selected_date[0];
    $last_selected_date = $selected_date[count($selected_date) - 1];
    $status_payment = $row[13];
    if ($status_payment == "OK") {
      $status_payment = "<span class='badge bg-soft-success text-success'><span class='legend-indicator bg-success'></span>Оплачено</span>";
    }
    if ($status_payment == "CREATED") {
      $status_payment = "<span class='badge bg-soft-dark text-dark'><span class='legend-indicator bg-dark'></span>Ожидаем оплату</span>";
    }
    if ($status_payment == "FAILED") {
      $status_payment = "<span class='badge bg-soft-danger text-danger'><span class='legend-indicator bg-danger'></span>Ошибка</span>";
    }
    if ($status_payment == "TIMEOUT") {
      $status_payment = "<span class='badge bg-soft-warning text-warning'><span class='legend-indicator bg-warning'></span>Время истекло</span>";
    }
    $type_pay = $row[12];
    $amount = $row[2];
    $img_src = json_decode($row[8],true)['image_url'];
    $img = $row[4];
    $flatID = $row[1];
    $FlatINFO = $mysql->query("SELECT title FROM flats WHERE id = $flatID")->fetch_array();
    $FlatTitle = $FlatINFO['title'] == null ? "Отсутсвует" : $FlatINFO['title'];
    if ($type_pay == "full_cost") {
      $type_pay = "Оплата полной стоимости";
    }
    if ($type_pay == "pay_first_days") {
      $type_pay = "Оплата первых дней";
    }
    if ($type_pay == "pay_checkIN") {
      $type_pay = "Оплата при заселении";
    }
    $way = $row[4];
    if ($way == "standard") {
      $way = "<span class='badge bg-soft-primary text-primary'>
      <span class='legend-indicator bg-primary'></span>Обычное заселение
    </span>";
    } else {
      $way = "<span class='badge bg-soft-info text-info'>
      <span class='legend-indicator bg-info'></span>Бесконтактное заселение
    </span>";
    }
    if ($img != "standard") {
      $img = " 
      <a class='btn btn-white btn-sm' href='$img_src'>
      <i class='bi-eye'></i> Посмотреть

      
    </a>";
    } else {
      $img = "Отстуствуют";
    }
    $template = "
    <tr>
    <td class='table-column-pe-0'>
      <div class='form-check'>
        <input type='checkbox' class='form-check-input' id='ordersCheck1'>
        <label class='form-check-label' for='ordersCheck1'></label>
      </div>
    </td>
    <td class='table-column-ps-0'>
      <a href='./ecommerce-order-details.html'>$id</a>
    </td>
    <td>$date</td>
    <td>  
      <a class='text-body' href='./ecommerce-customer-details.html'>$name</a>
    </td>
    <td>
        $status_payment
    </td>
    <td>
    $way
    </td>
    <td>
    $first_selected_date - $last_selected_date
    </td>
    <td>
      <div class='d-flex align-items-center'>

        <span class='text-dark'>$phone</span>
      </div>
    </td>
    <td>$amount</td>
    <td>$FlatTitle</td>
    <td>
      <div class='btn-group' role='group'>

      $img
  

      </div>
    </td>
    <td>
      <div class='btn-group' role='group'>
          <div class='btn btn-danger' id='delete_order_$id'>Удалить</div>
      </div>
      <script>
      const button_delete_$id = document.getElementById('delete_order_$id');
      button_delete_$id.onclick = function(){
        $.ajax({
          url: 'php/del_order.php',
          type: 'POST',
          data: {id: $id},
          success: function(data){
            console.log(data);
            window.location.reload()
          }
        });
      }
      </script>
    </td>
    
  </tr>";
    $result .= $template;
  }
  return $result;
}
