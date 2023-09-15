<?php
require($_SERVER['DOCUMENT_ROOT'] . '/php/config.php');

function get_info_product($id): array
{
  $mysql = mysqli_connect(servername, user, password, db);
  $sql = $mysql->query("SELECT * FROM `flats` WHERE `id` = '$id'")->fetch_array();

  $data = json_decode($sql['info'], true);

  return ['id' => $sql['id'], 'title' => $sql['title'], 'discount' => $sql['discount'], 'address' => $sql['adress'], 'max_adults' => $sql['max_adults'], 'img' => $sql['img'], 'booking_id' => $data['bookingid'], 'GoogleMap' => $sql['GoogleMap'], 'description' => $data['description'], 'kvm' => $data['kvm'], 'short_desc' => $data['short_desc'], "closed_dates" => $sql['close_dates'],'ps-1' => $sql['ps-1'],
  'ps-3' => $sql['ps-3'],
  'ps-7' => $sql['ps-7'],
  'transfer' => $sql['transfer'], "price_dates"=>$sql['price_dates']];
}
