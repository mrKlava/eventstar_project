<main class="container text-center my-5 py-5">
  <h1>PAGE - not found</h1>
  <p class="text-danger mb-4 text-center">
      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
    </p>
</main>