<?php
session_start();

include '../db/db.php';
include '../functions/roles.php';

/*  TODO

*/

// check if if user is admin
if (is_admin()) header('location:index.php?page=not-found');

// handle delete of user

$delete_city = $db->prepare("DELETE FROM cities WHERE city_id = :city_id");
$delete_city->bindParam(':city_id', $_GET['city_id']);

$delete_city->execute();

$delete = $delete_city->fetch(PDO::FETCH_ASSOC);

// header('location:../events-manager.php?id=' . $_SESSION['user_id']);
header("location:" . $_SERVER['HTTP_REFERER']);