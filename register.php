<?php
include './config/config.php';
include DB;

session_start();

if (isset($_SESSION['user_id'])) {
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Register"; include TEMPLATES . "_head.php"; ?></head>

<body>
  <main class="container">
    <div class="register bg-info bg-gradient p-5">
      <h1 class="mb-5">Register</h1>
      <form action="./api/user_register.php" method="post">
        <div class="row">
          <div class="col mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="col mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" name="surname" required>
          </div>
        </div>
        <div class="row">
          <div class="col-9 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="col-3 mb-3">
            <label for="bdate" class="form-label">Birth Date</label>
            <input type="date" class="form-control date-picker" name="bdate" required>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" class="form-control" name="pwd" required>
          </div>
          <div class="col mb-3">
            <label for="rePwd" class="form-label">Password Confirm</label>
            <input type="password" class="form-control" name="rePwd" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
  </main>
  <?php 
  if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  } 
  ?>
</body>

</html>