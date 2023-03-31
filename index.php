<?php
session_start();

include './config/config.php';
include DB;

/* ROUTER PART */
$routes = [
  'home'                => 'EventStar',

  'login'               => 'Login',
  'register'            => 'Register',
  'user-editor'         => 'Edit Profile',
  'users-manager'       => 'Users Manager',

  'event-editor'        => 'Event Editor',
  'event-participants'  => 'Event Participants',
  'event-details'       => 'Event Details',
  'events'              => 'Events',
  'events-going'        => 'My events',
  'events-manager'      => 'Events Manager',

  'locations-manager'   => 'Locations Manager',
  'location-editor'     => 'Location Editor',
  
  'city-manager'        => 'City Manager',
];

$page = isset($_GET['page']) ? $page = $_GET['page'] : 'home';

$title = isset($routes[$page]) ? $routes[$page] : '404';
$page_title = $title;
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php include TEMPLATES . "_head.php" ?></head>

<body>
  <?php 
  include TEMPLATE_PARTS . '_header.php';

  if (file_exists(PAGES . "$page.php")) {
    include PAGES . "$page.php";
  } else {
    include PAGES . 'not-found.php';
  }
  ?>
</body>

</html>