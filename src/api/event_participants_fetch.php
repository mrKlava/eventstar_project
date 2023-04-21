<!-- HEADER REDIRECT ERROR LINE: 5 12-->

<?php 
is_logged();

if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');
if (!isset($_GET['event_id'])) header('location:index.php?page=not-found');

$get_organiztor = $db->prepare("SELECT organizator_id FROM events WHERE event_id = ?");
$get_organiztor->execute([$_GET['event_id']]);

$organizator = $get_organiztor->fetch(PDO::FETCH_ASSOC);

if (empty($organizator)) header('location:index.php?page=not_found');

if (!is_admin() && is_organizator() && $organizator['organizator_id'] != $_SESSION['org_id']) header('location:index.php?page=not-found');

$get_registrations = $db->prepare("SELECT * FROM VIEW_event_registrations WHERE event_id = ?");
$get_registrations->execute([$_GET['event_id']]);

$registrants = $get_registrations->fetchALl(PDO::FETCH_ASSOC);