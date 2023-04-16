<?php
session_start();
include '../db/db.php';
require_once '../functions/user_handling.php';

// check if if user is admin or organizator
if (!is_admin()) header('location:index.php');


// check if all required fields are field
if (
  isset($_GET["location_id"])
  && isset($_POST["location_name"])
  && isset($_POST["address"])
  && isset($_POST["city_id"])
  && isset($_POST["description"])
  && isset($_POST["capacity"])
  && isset($_POST["location_lat"])
  && isset($_POST["location_long"])
) {
  // required are not empty
  if (
    $_GET["location_id"]         != ''
    && $_POST["location_name"]   != ''
    && $_POST["address"]         != ''
    && $_POST["city_id"]         != ''
    && $_POST["description"]     != ''
    && $_POST["capacity"]        != ''
    && $_POST["location_lat"]    != ''
    && $_POST["location_long"]    != ''
  ) {


    /* sanitize && validate data */

    $location_id = htmlspecialchars($_GET['location_id']);
    $location_name = htmlspecialchars($_POST['location_name']);
    $address = htmlspecialchars($_POST['address']);
    $capacity = htmlspecialchars($_POST['capacity']);
    $city_id = htmlspecialchars($_POST['city_id']);
    $description = htmlspecialchars($_POST['description']);

    $lat = floatval($_POST["location_lat"]);
    $long = floatval($_POST["location_long"]);

    if (($lat < -90 || $lat > 90) || ($long < -180 || $long > 180)) {
      $_SESSION['error'] = 'Invalid position';
      header("location:../index.php?page=location-editor&location_id=$location_id");

      return;
    }


    // check if location is not new
    // handle updating of location
    if ($location_id != "new") {
      $update = $db->prepare("UPDATE locations
      SET location_name = :location_name
        ,address = :address
        ,description = :description
        ,capacity = :capacity
        ,location_lat = :lat
        ,location_long = :long
      WHERE location_id = :location_id");

      $update->bindParam(':location_id',   $location_id);
      $update->bindParam(':location_name', $location_name);
      $update->bindParam(':address',       $address);
      $update->bindParam(':description',   $description);
      $update->bindParam(':capacity',      $capacity);
      $update->bindParam(':lat',           $lat);
      $update->bindParam(':long',          $long);

      $update->execute();

      $resp = $update->fetch(PDO::FETCH_ASSOC);


      // update city
      $update_city = $db->prepare("UPDATE city_location SET city_id = :city_id WHERE location_id = :location_id");

      $update_city->bindParam(':city_id',     $city_id);
      $update_city->bindParam(':location_id', $location_id);

      $update_city->execute();

      $update_city->fetch(PDO::FETCH_ASSOC);

      // handle creation of new event
    } else if ($location_id == "new") {
      $create = $db->prepare(
        "INSERT INTO locations (
        location_name
        ,address
        ,description
        ,capacity
        ,location_lat
        ,location_long
      ) VALUES(
        :location_name
        ,:address
        ,:description
        ,:capacity
        ,:location_lat
        ,:location_long)"
      );

      $create->bindParam(':location_name',  $location_name);
      $create->bindParam(':address',        $address);
      $create->bindParam(':description',    $description);
      $create->bindParam(':capacity',       $capacity);
      $update->bindParam(':location_lat',   $lat);
      $update->bindParam(':location_long',  $long);

      $create->execute();

      var_dump($create);

      $resp = $create->fetch(PDO::FETCH_ASSOC);

      var_dump($resp);

      $get_id = $db->prepare("SELECT location_id FROM locations WHERE location_name = ? AND address = ? LIMIT 1");
      $get_id->execute([$location_name, $address]);

      $id = $get_id->fetch(PDO::FETCH_ASSOC);

      $location_id = $id['location_id'];


      $insert_city = $db->prepare("INSERT city_location (city_id, location_id) VALUES(:city_id, :location_id)");

      $insert_city->bindParam(':city_id',     $city_id);
      $insert_city->bindParam(':location_id', $location_id);

      $insert_city->execute();

      $insert_city->fetch(PDO::FETCH_ASSOC);
    }
  } else {
    $_SESSION['error'] = 'Please fill all required fields';
  }
} else {
  $_SESSION['error'] = 'Fatal error';
}

header("location:../index.php?page=location-editor&location_id=$location_id");

