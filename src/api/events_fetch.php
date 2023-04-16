<?php 

$fetch_events = $db->prepare("SELECT * FROM VIEW_events_list ORDER BY event_id ASC");
$fetch_events->execute();

$events = $fetch_events->fetchAll(PDO::FETCH_ASSOC);