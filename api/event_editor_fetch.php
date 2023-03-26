<?php

/* TODO 
- create procedures:
  - register / unregister / drop user for event
  - delete event
*/

$id = $_GET["event_id"];

// check if event is NEW or EXISTS
if ($id != "new") {
  $get_event = $db->prepare("SELECT * FROM VIEW_events_list WHERE event_id = ?");
  $get_event->execute([$id]);
  
  $event = $get_event->fetch(PDO::FETCH_ASSOC);

  // handle date for form
  $date_obj = date_create($event["event_date"]);

  $event["date"] = $date_obj->format('Y-m-d');
  $event["hour"] = $date_obj->format('H');
  $event["min"] =  $date_obj->format('i');

  // check if exists or is created by this user
  if (!$event) {
    header('location:not-found.php');
    $_SESSION["error"] = "Event do not exist";
    return;
  } else if ($event["organizator_id"] != $_SESSION["org_id"]) {
    header('location:not-found.php');
    $_SESSION["error"] = "You are not organizator of this event";
    return;
  }

  // prepare data for new event
} else {
  var_dump($organizator);

  // check if organiztor
  if (!$organizator && !in_array(1, $_SESSION['roles'])) {
    header('location:not-found.php');
    $_SESSION["error"] = "You are not organizator";
    return;
  }

  $event = [
    "organizator_name" => $organizator["organizator_name"],
    "organizator_id" => $organizator["organizator_id"],
    "event_name" => "",
    "name" => "",
    "date" => "",
    "hour" => "",
    "min" => "",
    "register_deadline" => "",
    "age" => "",
    "registrations" => "",
    "image" => "",
    "description" => "",
    "details" => "",
    "city" => "",
    "location" => ""
  ];
}
