<?php
session_start();

include '../db/db.php';

/*  TODO
-- validate inputs from form

*/

// check if if user is admin or organizator
if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

// handle delete by organizator
if ((isset($_GET['event_id']) && isset($_GET['org_id'])) || in_array(1, $_SESSION['roles'])) {
  if ($_GET['org_id'] === $_SESSION['org_id'] || in_array(1, $_SESSION['roles'])) {
    $delete_as_org = $db->prepare("DELETE FROM events WHERE event_id = :event_id");
    $delete_as_org->bindParam(':event_id', $_GET['event_id']);
    // $delete_as_org->bindParam(':org_id', $_SESSION['org_id']);

    $delete_as_org->execute();

    $delete = $delete_as_org->fetch(PDO::FETCH_ASSOC);
  } else {
    $_SESSION['error'] = 'You are not organizator of this event';
  }
} else {
  $_SESSION['error'] = 'fatal error';
}


// header('location:../events-manager.php?id=' . $_SESSION['user_id']);
header("location:" . $_SERVER['HTTP_REFERER']);
