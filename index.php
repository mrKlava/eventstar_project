<?php
session_start();

require_once './src/config/config.php';
require_once DB;
require_once ROUTER;
require_once FUNCTIONS . 'user_handling.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head><?php include TEMPLATES . "_head.php" ?></head>

<body>
  <?php 
  include TEMPLATE_PARTS . '_header.php';

  if (file_exists(PAGES . "$page.php")) {
    include PAGES . "$page.php";
  } else {
    header('location:index.php?page=not-found');
  }
  ?>
</body>

</html>