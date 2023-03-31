<?php 
if (!isset($_SESSION['user_id'])) header('location:index.php?page=login');

include API . 'events_manager_fetch.php';
?>

<main class="container-fluid">
  <?php var_dump($_SESSION['org_id']) ?>

  <section>
    <?php include FUNCTIONS . 'events_table_render.php'; ?>
  </section>
</main>