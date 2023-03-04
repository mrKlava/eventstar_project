<?php
session_start(); 
if (!isset($_SESSION['user_id'])) header('location:login.php');

include './config/config.php';
include DB;
include API . 'user_profile_fetch.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php $title="User"; include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'User Settings'; include TEMPLATE_PARTS . '_header.php';?>
  <?php 
    var_dump($_GET['id'])
  ?>
</body>

</html>