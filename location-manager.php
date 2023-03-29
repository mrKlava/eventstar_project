<?php
session_start();
if (!isset($_SESSION['user_id'])) header('location:login.php');
if (!in_array(1, $_SESSION['roles'])) header('location:index.php');

include './config/config.php';
include DB;
include API . 'locations_fetch.php';

?>


<!-- TODO

-->


<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Event Editor";
      include TEMPLATES . "_head.php"; ?>

  <!-- check out bootstrap tables -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.css">

  <script defer src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script defer src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>

  <script defer src="<?= JS . 'tables.js' ?>"></script>
</head>

<body>
  <?php $page_title = 'Location Manager';
  include TEMPLATE_PARTS . '_header.php'; ?>

  <main class="container-fluid">
    <section>
      <a class="btn btn-primary" href="location-editor.php?location_id=new">Create New location</a>
    </section>
    <?php include FUNCTIONS . 'locations_table_render.php' ?>
  </main>
</body>

</html>