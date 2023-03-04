<?php
session_start(); 
if (!isset($_SESSION['user_id'])) header('location:login.php');
include './config/config.php';
include DB;
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php $title="Home"; include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'Home'; include TEMPLATE_PARTS . '_header.php';?>
</body>

</html>