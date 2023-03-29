<?php
session_start();

include '../db/db.php';

if (!in_array(1, $_SESSION['roles'])) header('location:index.php');

// check if city name is set and not empty
if (isset($_POST['city_name']) && $_POST["city_name"] != '') {
  
  // prepare input
  $city_name = htmlspecialchars($_POST['city_name']);
  $city_new = htmlspecialchars($_POST['city_new']);
  

  $check_exist = $db->prepare("SELECT * FROM cities WHERE city_name = ? OR city_name = ? LIMIT 1");
  $check_exist->execute([$city_name, $city_new]);

  $exists->fetch(PDO::FETCH_ASSOC);


  // prepare query
  if ($_POST["city_name"] == "NULL") {
    $query = "INSERT INTO cities (city_name) VALUES (?)";
    $p = [$city_name];
  } else {
    $q = "UPDATE TABLE cities SET city_name = ? WHERE city_name = ?";
    $p = [$city_name, $city_name];
  }

  $handle_city = $db->prepare($q);
  $handle_city->execute($p);

  $status = $handle_city->fetch(PDO::FETCH_ASSOC);

  var_dump($handle_city);
  var_dump($status);

  // if(!$status) {
  //   $_SESSION['error'] = $err;
  //   header("location:" . $_SERVER['HTTP_REFERER']);
  // }
}
