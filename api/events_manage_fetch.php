<?php

$id = $_GET["id"];

// check if session user id matches with requested user id and has role of organiztor
if ($_SESSION['user_id'] != $id) {
  $_SESSION['error'] = 'Wrong user ID';
  header('location:not-found.php');
}

/* Handle for orgonizator */

if (in_array(4, $_SESSION["roles"]))

// will need to make s.procedure to get events which are organized by current user
$request = $db->prepare("SELECT * FROM events_info_view");
$request->execute();


/* Handle for administrator */

if (in_array(1, $_SESSION["roles"]))

$events = $request->fetchAll(PDO::FETCH_ASSOC);

