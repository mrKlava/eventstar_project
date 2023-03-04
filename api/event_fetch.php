<?php

$id = $_GET["event_id"];

$request = $db->prepare("SELECT * FROM events_info_view WHERE event_id = ?");
$request->execute([$id]);

$event = $request->fetch(PDO::FETCH_ASSOC);
