<?php
session_start();

include '../db/db.php';

/*  TODO

*/

// check if if user is admin
if (!in_array(1, $_SESSION['roles'])) header('location:index.php');

// handle delete of user

$delete_location = $db->prepare("DELETE FROM locations WHERE location_id = :location_id");
$delete_location->bindParam(':location_id', $_GET['location_id']);

$delete_location->execute();

$delete = $delete_location->fetch(PDO::FETCH_ASSOC);

var_dump($delete);



// header('location:../events-manager.php?id=' . $_SESSION['user_id']);
header("location:" . $_SERVER['HTTP_REFERER']);