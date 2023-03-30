<?php if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

$get_registrations = $db->prepare("SELECT * FROM VIEW_event_registrations WHERE event_id = ?");
$get_registrations->execute([$_GET['event_id']]);

$registrants = $get_registrations->fetchALl(PDO::FETCH_ASSOC);