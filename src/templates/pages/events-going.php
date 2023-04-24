<?php
is_logged();

include API . 'events_going_fetch.php';
include API . "cities_fetch.php";
?>


<main class="container my-5 py-5">
  <section class="cards" id="cards">
    <?php

    if (empty($_SESSION['events_going'])) {
      echo "<h1 class='text-center'>You are not registered to any event</h1>";
    }

    include FUNCTIONS . 'events_list_render.php';
    ?>
  </section>
</main>