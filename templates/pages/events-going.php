<?php if (!isset($_SESSION['user_id'])) header('location:login.php') ?>

<main class="container">
  <?php
  include API . 'events_user_fetch.php';

  var_dump($_SESSION['events_going']);
  
  include FUNCTIONS . 'events_list_render.php'; 
  ?>
</main>