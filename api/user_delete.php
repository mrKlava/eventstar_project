<?php
session_start();

include '../db/db.php';

/*  TODO

*/

// check if if user is admin
if (!in_array(1, $_SESSION['roles'])) header('location:index.php');

// handle delete of user

$delete_user = $db->prepare("DELETE FROM users WHERE user_id = :user_id");
$delete_user->bindParam(':user_id', $_GET['user_id']);

$delete_user->execute();

$delete = $delete_user->fetch(PDO::FETCH_ASSOC);

// header('location:../events-manager.php?id=' . $_SESSION['user_id']);
header("location:" . $_SERVER['HTTP_REFERER']);