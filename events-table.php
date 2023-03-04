<?php
session_start(); 
if (!isset($_SESSION['user_id'])) header('location:login.php');
if (!in_array(1, $_SESSION['roles'])) header('location:index.php');

include './config/config.php';
include DB;
include API . 'events_fetch.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php $title="Events List"; include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'Events List'; include TEMPLATE_PARTS . '_header.php';?>
  <?php include FUNCTIONS . 'events_table_render.php'; ?>
</body>

</html>