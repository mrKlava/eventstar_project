<?php if (isset($_SESSION['user_id'])) header('location:index.php')?>

<main class="container vh-100 d-flex flex-column justify-content-center align-items-center remove-header">
  <h1 class="title mb-5 text-center">Register</h1>
  <form class="row mb-3 border rounded-3 px-3 py-5" action="./api/user_register.php" method="post">
    <div class="row">
      <div class="col-sm mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="col-sm mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" class="form-control" name="surname" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="col-sm-4 mb-3">
        <label for="bdate" class="form-label">Birth Date</label>
        <input type="date" class="form-control date-picker" name="bdate" required>
      </div>
    </div>
    <div class="row">
      <div class="col-sm mb-3">
        <label for="pwd" class="form-label">Password</label>
        <input type="password" class="form-control" name="pwd" required>
      </div>
      <div class="col-sm mb-3">
        <label for="rePwd" class="form-label">Password Confirm</label>
        <input type="password" class="form-control" name="rePwd" required>
      </div>
    </div>
    <p class="text-danger mb-4 text-center">
      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
    </p>
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
      <button class="btn btn-primary mb-3 col-3">Register</button>
      <div class="text-center">
        <span>Have account?</span>
        <a href="index.php?page=login">Login</a>
      </div>
    </div>
  </form>
</main>