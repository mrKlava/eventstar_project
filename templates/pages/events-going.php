<?php 
is_logged();

include API . 'events_going_fetch.php';
?>

<main class="container">
  <?php

  // var_dump($_SESSION['events_going']);

  if (empty($_SESSION['events_going'])) {
    echo "<h1 class='text-center'>You are not registered to any event</h1>";
  }
  
  include FUNCTIONS . 'events_list_render.php'; 
  ?>
</main>