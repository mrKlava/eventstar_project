<?php
session_start();

include '../db/db.php';

if (!in_array(1, $_SESSION['roles'])) header('location:index.php');

// check if city name is set and not empty
if (isset($_POST['city_id']) && $_POST["city_id"] != '' && $_POST["city_name"] != '') {

  // prepare input
  $city_id = htmlspecialchars($_POST['city_id']);
  $city_name = htmlspecialchars($_POST['city_name']);


  // check if city name is already existing
  $check_exist = $db->prepare("SELECT * FROM cities WHERE city_name = ? LIMIT 1");
  $check_exist->execute([$city_name]);

  $exists = $check_exist->fetch(PDO::FETCH_ASSOC);

  var_dump($exists);
  var_dump(empty($exists));

  // prepare query
  if ($_POST["city_id"] == NULL && empty($exists)) {
    $insert_city = $db->prepare("INSERT INTO cities (city_name) VALUES(?)");
    $insert_city->execute([$city_name]);

    $insert_city->fetch(PDO::FETCH_ASSOC);

  } else if (empty($exists)) {
    $update_city = $db->prepare("UPDATE cities SET city_name = ? WHERE city_id = ?");
    $update_city->execute([$city_name, $city_id]);

    $update_city->fetch(PDO::FETCH_ASSOC);

  } else {
    $_SESSION['error'] = 'This city is already in the list';
  }

} else {
  $_SESSION['error'] = 'New city name is missing';

}
header("location:" . $_SERVER['HTTP_REFERER']);
