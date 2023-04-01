<?php 
is_logged();

if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');

include API . 'events_manager_fetch.php';
?>

<main class="container-fluid">
  <section>
    <?php include FUNCTIONS . 'events_table_render.php'; ?>
  </section>
</main>