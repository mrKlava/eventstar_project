<?php
is_logged();

if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');

if (is_admin() && isset($_GET['organizator_id'])) {
  if ($_GET['organizator_id'] != "new") {
    $organizator['organizator_id'] = $_GET['organizator_id'];
  } else {
    $organizator = [
      'organizator_id' => 'new',
      'organizator_name' => '',
      'description' => '',
      'user_id' => 'NULL'
    ];
  }
} else {
  $organizator['organizator_id'] = $_SESSION['org_id'];
}

$current = ($organizator['organizator_id'] === $_SESSION['org_id']);

if (is_organizator()) {

}

include API . 'organizator_fetch.php';
include API . 'users_fetch.php';
?>

<main class="container mt-5">

  <form class="row mb-3 border rounded-3 px-3 py-5" action="./src/api/organizator_update.php?organizator_id=<?= $organizator['organizator_id'] ?>" method="post">

    <div class="row mb-3">
      <div class="col-sm-3 mb-4">
        <?php if ($organizator['organizator_id'] != "new") : ?>
          <h4>Organizator ID : <span class="ms-2"><?= $organizator['organizator_id'] ?></span></h4>
        <?php else: ?>
          <h4>New Organizator</h4>
        <?php endif ?>
      </div>
    </div>

    <div class="row">
        <div class="mb-4">
          <label for="user_id" class="form-label">User ID*</label>

          <?php if ($current): ?>
            <input type="text" class="form-control border-0" name="user_id" value="<?= $organizator["user_id"] ?>" readonly>
      </div>
          <?php else: ?>
            <select class="form-select" 
                name="user_id" 
                aria-label="Select user" 
                required
                <?= $curernt ? 'disabled' : null?>>
              <?php $sel_user = $organizator['user_id'] ?>
              <option <?php if ($sel_user == 'NULL') echo ('selected') ?> value="NULL" disabled>User ID - Email</option>
              <?php foreach ($users as $user) : ?>
                <option <?php if ($sel_user == $user["user_id"]) echo ('selected') ?> value="<?= $user["user_id"] ?>">
                  <?= $user["user_id"] ?> -
                  <?= $user["email"] ?>
                </option>
              <?php endforeach ?>
            </select>
          <?php endif ?>

        </div>
      </div>

    <div class="row">
      <div class="col mb-4">
        <label for="organizator_name" class="form-label">Title*</label>
        <input type="text" class="form-control" name="organizator_name" value="<?= $organizator["organizator_name"] ?>" required>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col">
        <label for="description" class="form-label">Description*</label>
        <textarea class="form-control" name="description" style="height: 150px" required><?= $organizator["description"] ?></textarea>
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