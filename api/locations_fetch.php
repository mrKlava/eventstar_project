<?php

// check if if user is admin or organizator
if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');

$get_locations = $db->prepare("SELECT * FROM VIEW_locations_list ORDER BY city_name ASC");
$get_locations->execute();

$locations = $get_locations->fetchAll(PDO::FETCH_ASSOC);
