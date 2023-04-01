<?php is_logged()?>

<main class="container">
  <?php
  include API . 'events_going_fetch.php';

  var_dump($_SESSION['events_going']);
  
  include FUNCTIONS . 'events_list_render.php'; 
  ?>
</main>