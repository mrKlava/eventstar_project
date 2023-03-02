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

<head><?php $title="Login"; include TEMPLATES . "_head.php";?></head>

<body>

  <?php
  if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
  }
  ?>
  <main>
    <a href="register.php">Register</a>
    <h1>Login</h1>
    <form action="./api/user_login.php" method="post">
      <div>
        <label for="email">Email</label>
        <input type="text" name="email" required>
      </div>
      <div>
        <label for="pwd">Password</label>
        <input type="password" name="pwd" required>
      </div>
      <input type="submit" value="Login">
    </form>
  </main>
</body>

</html>