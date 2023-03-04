<?php
include './config/config.php';
include DB;
include API . "event_fetch.php";

session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Event";
      include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'Events';
  include TEMPLATE_PARTS . '_header.php'; ?>
  <main>
    <?php include FUNCTIONS . "event_render.php"; ?>
  </main>
</body>

</html>