<?php 

// is_logged();

// if (!is_admin()) header('location:index.php');

$get_cities = $db->prepare("SELECT * FROM cities ORDER BY city_name ASC");

$get_cities->execute();

$cities = $get_cities->fetchALl(PDO::FETCH_ASSOC);