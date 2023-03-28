<?php

if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

$get_location = $db->prepare("SELECT * FROM VIEW_locations_list WHERE location_id = ?");

$get_location->execute([$_GET['location_id']]);

$location = $get_location->fetch(PDO::FETCH_ASSOC);
