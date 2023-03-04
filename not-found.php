<?php
session_start();
include './config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Not found";
      include TEMPLATES . "_head.php"; ?></head>

<body>

  <?php $page_title = '404';
  include TEMPLATE_PARTS . '_header.php'; ?>

  <?php
  if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  }
  ?>
</body>

</html>