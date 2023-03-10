<?php

/* TODO 
- create procedures:
  - is user registered on on event 
  - is user is organizer

- register / unregister user for event
*/

$id = $_GET["event_id"];

$request = $db->prepare("SELECT * FROM events_info_view WHERE event_id = ?");
$request->execute([$id]);

$event = $request->fetch(PDO::FETCH_ASSOC);