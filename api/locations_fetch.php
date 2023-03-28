<?php

// check if if user is admin or organizator
if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

$get_locations = $db->prepare("SELECT * FROM VIEW_locations_list ORDER BY city_name ASC");
$get_locations->execute();

$locations = $get_locations->fetchAll(PDO::FETCH_ASSOC);


// $get_locations = $db->prepare("SELECT L.location_id
//     ,L.location_name
//     ,C.city_name
//     ,L.address
//   FROM city_location AS CL
//   INNER JOIN locations AS L
//     ON CL.location_id = L.location_id
//   INNER JOIN cities AS C
//     ON CL.city_id = C.city_id");

// $get_locations->execute();

// $locations = $get_locations->fetchAll(PDO::FETCH_ASSOC);