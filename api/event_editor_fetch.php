<?php

/* TODO 
-- handle for admin
*/

$event_id = $_GET["event_id"];

// check if event is NEW or EXISTS
if ($event_id != "new") {
  // if not new get event info
  $get_event = $db->prepare("SELECT * FROM VIEW_events_list WHERE event_id = ?");
  $get_event->execute([$event_id]);
  
  $event = $get_event->fetch(PDO::FETCH_ASSOC);

  // handle date for form
  $date_obj = date_create($event["event_date"]);

  $event["date"] = $date_obj->format('Y-m-d');
  $event["hour"] = $date_obj->format('H');
  $event["min"] =  $date_obj->format('i');

  // check if evemt exists or and is created by this user
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
  
  // get oranizator info
  $get_org_info = $db->prepare("SELECT organizator_id, organizator_name FROM organizators WHERE organizator_id = :org_id AND user_id = :user_id");
  $get_org_info->bindParam(":org_id", $_SESSION["org_id"]);
  $get_org_info->bindParam(":user_id", $_SESSION["user_id"]);

  $get_org_info->execute();

  $organizator = $get_org_info->fetch(PDO::FETCH_ASSOC);

  // check if organiztor
  // if (!$organizator && !in_array(1, $_SESSION['roles'])) {
  //   header('location:not-found.php');
  //   $_SESSION["error"] = "You are not organizator";
  //   return;
  // }

  // create empty dataset for new event
  $event = [
    "organizator_name" => $organizator["organizator_name"],
    "organizator_id" => $organizator["organizator_id"],
    "event_name" => "",
    "name" => "",
    "date" => "",
    "hour" => "",
    "min" => "",
    "register_deadline" => "",
    "age_rating" => "",
    "person_max" => "",
    "image" => "",
    "description" => "",
    "details" => "",
    "location_id" => ""
  ];
}
