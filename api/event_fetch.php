<?php
$id = $_GET["event_id"];

$request = $db->prepare("SELECT * FROM VIEW_events_list WHERE event_id = ?");
$request->execute([$id]);

$event = $request->fetch(PDO::FETCH_ASSOC);

$date_obj = date_create($event["event_date"]);

$event["date"] = $date_obj->format('d/m/Y');
$event["hour"] = $date_obj->format('H');
$event["min"] =  $date_obj->format('i');  