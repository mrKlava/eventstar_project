<?php
session_start();

include '../db/db.php';

$event_id = $_GET['event_id'];

if (in_array($event_id, $_SESSION['events_going'])) {
  $q = "DELETE FROM registrations WHERE event_id = :event_id AND user_id = :user_id";
} else {
  $q = "INSERT INTO registrations (event_id, user_id, registration_date) VALUES (:event_id, :user_id, NOW())";
}

$handle_registration = $db->prepare($q);
$handle_registration->bindParam(':event_id', $event_id);
$handle_registration->bindParam(':user_id', $_SESSION['user_id']);

$handle_registration->execute();

require './user_events_going.php';

// open previous page
header("location:" . $_SERVER['HTTP_REFERER']);
// header("location:../event-details.php?event_id=" . $_GET['event_id']);