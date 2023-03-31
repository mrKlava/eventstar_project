<?php
session_start();
include './config/config.php';
include DB;

$routes = [
  'home' => 'EventStar',
  'login' => 'Login',
  'register' => 'Register',
  'events' => 'Events',
  'event-details' => 'Event Details',
  'event-details' => 'My events',
];

$page = isset($_GET['page']) ? $page = $_GET['page'] : 'home';

$title = isset($routes[$page]) ? $routes[$page] : '404';
$page_title = $title;
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php include TEMPLATES . "_head.php"; ?></head>

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