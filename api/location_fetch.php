<?php

if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');

if (!isset($_GET['location_id'])) header('location:index.php?page=not-found');

$get_location = $db->prepare("SELECT * FROM VIEW_locations_list WHERE location_id = ?");

$get_location->execute([$_GET['location_id']]);

$location = $get_location->fetch(PDO::FETCH_ASSOC);

if (empty($location)) header('location:index.php?page=not-found');
