<?php 
is_logged();

include API . 'user_fetch.php'; 

$user_id = isset($_GET['user_id']) ? htmlspecialchars($_GET['user_id']) : $_SESSION['user_id'];
?>

<main class="container mt-5">
  <form class="row mb-3 border rounded-3 px-3 py-5" action="./src/api/user_update.php?user_id=<?= $user_id ?>" method="post">
    <div class="row">
      <div class="col-sm mb-3">
        <label for="name" class="form-label">Name*</label>
        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($user['name']) ?>" required />
      </div>
      <div class="col-sm mb-3">
        <label for="surname" class="form-label">Surname*</label>
        <input type="text" class="form-control" name="surname" value="<?= htmlspecialchars($user['surname']) ?>" required />
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 mb-3">
        <label for="email" class="form-label">Email*</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']) ?>" required />
      </div>
      <div class="col-sm-4 mb-3">
        <label for="bdate" class="form-label">Birth Date*</label>
        <input type="date" class="form-control date-picker" name="bdate" value="<?= htmlspecialchars($user['birth_date']) ?>" required />
      </div>
    </div>
    <div class="row">
      <div class="col-sm mb-3">
        <label for="pwd" class="form-label">Password</label>
        <input type="password" class="form-control" name="pwd" />
      </div>
      <div class="col-sm mb-3">
        <label for="rePwd" class="form-label">Password Confirm</label>
        <input type="password" class="form-control" name="rePwd" />
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
      <button class="btn btn-primary mb-3 col-3">Save</button>
    </div>
  </form>
</main>