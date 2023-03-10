<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

include './config/config.php';
include DB;
include API . "event_fetch.php";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Event";
      include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php
  if (empty($event)) {
    $page_title = "404";
  } else {
    $page_title = $event['event_name'];
  }
  include TEMPLATE_PARTS . '_header.php';
  include FUNCTIONS . "event_render.php"; ?>
</body>

</html>