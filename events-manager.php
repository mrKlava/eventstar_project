<?php
session_start(); 
if (!isset($_SESSION['user_id'])) header('location:login.php');

include './config/config.php';
include DB;
include API . 'events_user_fetch.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php $title="Events Manager"; include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'Events Manager'; include TEMPLATE_PARTS . '_header.php';?>

  <main class="container-fluid">
    <?php include FUNCTIONS . 'events_table_render.php'; ?>
  </main>
</body>

</html>