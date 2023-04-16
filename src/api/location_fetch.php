<?php

if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');

if (!isset($_GET['location_id'])) header('location:index.php?page=not-found');

$get_location = $db->prepare("SELECT * FROM VIEW_locations_list WHERE location_id = :location_id");

$get_location->bindParam(':location_id', $_GET['location_id']);

$get_location->execute();

$location = $get_location->fetch(PDO::FETCH_ASSOC);

if (empty($location)) header('location:index.php?page=home');
