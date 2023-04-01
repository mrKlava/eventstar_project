<?php

if(!isset($_GET['event_id'])) header('location:index.php?page=not-found');

$id = $_GET["event_id"];

$get_event = $db->prepare("SELECT * FROM VIEW_events_list WHERE event_id = ?");
$get_event->execute([$id]);

$event = $get_event->fetch(PDO::FETCH_ASSOC);

if(empty($event)) header('location:index.php?page=not-found');

$date_obj = date_create($event["event_date"]);

$event["date"] = $date_obj->format('d/m/Y');
$event["hour"] = $date_obj->format('H');
$event["min"] =  $date_obj->format('i');  