<?php
include './config/config.php';
include DB;
include API . "events_fetch.php";

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
  <?php $page_title = 'Events';
  include TEMPLATE_PARTS . '_header.php'; ?>

  <main class="p-5">

    <section>
      <?php include FUNCTIONS . "events_list_render.php"; ?>
    </section>

  </main>

</body>

</html>