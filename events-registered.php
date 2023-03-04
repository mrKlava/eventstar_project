<?php
session_start(); 
if (!isset($_SESSION['user_id'])) header('location:login.php');

include './config/config.php';
include DB;
include API . 'events_user_fetch.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php $title="My Events"; include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'My Events'; include TEMPLATE_PARTS . '_header.php';?>

  <main class="container">
    <?php include FUNCTIONS . 'events_list_render.php'; ?>
  </main>
</body>

</html>