<?php
session_start(); 
if (!isset($_SESSION['user_id'])) header('location:login.php');
if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

include './config/config.php';
include DB;
include API . './event_fetch.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php $title="Event Editor"; include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title='Event Editor'; include TEMPLATE_PARTS . '_header.php';?>

  <main>
    <?php var_dump($event)?>
  </main>
</body>

</html>