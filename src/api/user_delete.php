<?php
session_start();

include '../db/db.php';
require_once '../functions/user_handling.php';


/*  TODO

*/

// check if if user is admin
if (!is_admin()) header('location:index.php');

// handle delete of user

$delete_user = $db->prepare("DELETE FROM users WHERE user_id = :user_id");
$delete_user->bindParam(':user_id', $_GET['user_id']);

$delete_user->execute();

$delete = $delete_user->fetch(PDO::FETCH_ASSOC);

header('location:../../index.php?page=users-manager');
// header("location:" . $_SERVER['HTTP_REFERER']);