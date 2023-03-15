<?php 

$fetch_events = $db->prepare("SELECT * FROM events_info_view");
$fetch_events->execute();

$events = $fetch_events->fetchAll(PDO::FETCH_ASSOC);