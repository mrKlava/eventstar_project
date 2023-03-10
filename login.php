<?php
session_start();
if (isset($_SESSION['user_id'])) header('location:index.php');

include './config/config.php';
include DB;
?>

<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Login";
      include TEMPLATES . "_head.php"; ?></head>

<body class="remove-header">
  <main class="container vh-100 d-flex flex-column justify-content-center align-items-center">
    <h1 class="title mb-5 text-center">Login</h1>
    <form class="row mb-3 border rounded-3 px-3 py-5" action="./api/user_login.php" method="post">
      <div class="form-floating form-outline mb-4">
        <input type="email" id="emailInput" class="form-control" name="email" placeholder="name@example.com" />
        <label for="emailInput">Email address</label>
      </div>
      <div class="form-floating form-outline mb-4">
        <input type="password" id="pwdInput" class="form-control" name="pwd" placeholder="Password" />
        <label for="pwdInput">Password</label>
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
        <button class="btn btn-primary mb-3 col-3">Login</button>
        <div class="text-center">
          <span>Not registered?</span>
          <a href="register.php">Register</a>
        </div>
      </div>
    </form>
  </main>
</body>

</html>