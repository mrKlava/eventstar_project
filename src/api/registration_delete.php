<?php
session_start();

include '../db/db.php';
require_once '../functions/user_handling.php';

/*  TODO

*/

// check if if user is admin
if (!is_admin() && !is_organizator()) header('location:index.php');

// handle delete of user

$delete_registration = $db->prepare("DELETE FROM registrations WHERE user_id = :user_id AND event_id = :event_id");
$delete_registration->bindParam(':user_id', $_GET['user_id']);
$delete_registration->bindParam(':event_id', $_GET['event_id']);

$delete_registration->execute();

$delete = $delete_registration->fetch(PDO::FETCH_ASSOC);

// header('location:../events-manager.php?id=' . $_SESSION['user_id']);
header("location:" . $_SERVER['HTTP_REFERER']);