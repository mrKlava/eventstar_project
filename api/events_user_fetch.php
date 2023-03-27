<?php

/* TODO 

*/

$id = $_GET["id"];

// check if session user id matches with requested user id
if ($_SESSION['user_id'] != $id) {
  $_SESSION['error'] = 'Wrong user ID';
  header('location:not-found.php');
}

// get all event ids where user is registered
$request = $db->prepare(" SELECT *
FROM VIEW_events_list
WHERE event_id IN (
SELECT event_id 
  FROM registrations AS R
  WHERE R.user_id = :user_id
)");

$request->bindParam(':user_id', $_SESSION['user_id']);

$request->execute();

$events = $request->fetchAll(PDO::FETCH_ASSOC);