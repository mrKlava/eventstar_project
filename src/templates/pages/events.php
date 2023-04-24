<?php
include API . "events_fetch.php";
include API . "cities_fetch.php";
?>

<main class="container my-5 py-5">
  <section class="cards" id="cards">
    <?php include FUNCTIONS . "events_list_render.php"; ?>
  </section>
</main>