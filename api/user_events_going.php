<?php
// get all event ids where user is registered
$get_event_ids = $db->prepare("SELECT event_id 
  FROM registrations AS R
  WHERE R.user_id = :user_id"
);

$get_event_ids->bindParam(':user_id', $_SESSION['user_id']);

$get_event_ids->execute();

$events_going = $get_event_ids->fetchAll(PDO::FETCH_ASSOC);

// put all ids to session
unset($_SESSION['events_going']);
foreach($events_going as $key => $event_id) {
  $_SESSION['events_going'][] = $event_id['event_id'];
}