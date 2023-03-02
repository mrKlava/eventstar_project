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
  
  <head><?php $title = "Events";
      include TEMPLATES . "_head.php"; ?></head>

<body>
  <main>
    <?php include FUNCTIONS . "event_render.php"; ?>
  </main>
</body>

</html>