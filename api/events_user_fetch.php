<?php

$id = $_GET["id"];

// check if session user id matches with requested user id
if ($_SESSION['user_id'] != $id) {
  $_SESSION['error'] = 'Wrong user ID';
  header('location:not-found.php');
}

// will need to make s.procedure to get events
$request = $db->prepare("SELECT * FROM events_info_view");
$request->execute();

$events = $request->fetchAll(PDO::FETCH_ASSOC);

