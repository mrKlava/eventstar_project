<?php

/* TODO 
- fix issue with PROCEDURE returning null on event list

*/

$id = $_GET["id"];

// check if session user id matches with requested user id
if ($_SESSION['user_id'] != $id) {
  $_SESSION['error'] = 'Wrong user ID';
  header('location:not-found.php');
}

// will need to make s.procedure to get events
$request = $db->prepare("SELECT * FROM VIEW_events_list");
$request->execute();

$events = $request->fetchAll(PDO::FETCH_ASSOC);


$get_event_list = $db->prepare("CALL PR_get_user_events(USER_ID)");
$get_event_list->bindParam(":USER_ID", $_SESSION['user_id'], PDO::PARAM_INT);

$get_event_list->execute();

$event_list = $get_event_list->fetchAll(PDO::FETCH_ASSOC);

// while($row = $get_event_list->fetchAll(PDO::FETCH_ASSOC)) {
//   var_dump($row);
// }

