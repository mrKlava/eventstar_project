<?php

// check if if user is admin or organizator
if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

$get_locations = $db->prepare("SELECT * FROM VIEW_locations_list ORDER BY city_name ASC");
$get_locations->execute();

$locations = $get_locations->fetchAll(PDO::FETCH_ASSOC);
