<?php
is_logged();

if (!is_admin()) header('location:index.php?page=not-found');

include API . 'cities_fetch.php';
?>

<main class="container-fluid">
  <section class="container-fluid">

    <p class="text-danger mb-4 text-center">
      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
    </p>

    <form action="./src/api/city_update.php" method="POST" class="row mb-5 border rounded-3 px-3 py-5">
      <h4 class="mb-5">City editor</h1>
        <div class="row mb-3">
          <div class="col-sm-6 mb-4">
            <label for="city_id" class="form-label">Name*</label>
            <select class="form-select" name="city_id" aria-label="Select city" required>
              <option value="NULL" selected>Add new city -></option>
              <?php foreach ($cities as $city) : ?>
                <option value="<?= $city["city_id"] ?>">
                  <?= $city["city_name"] ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-sm-6 mb-4">
            <label for="city_name" class="form-label">New name</label>
            <input type="text" class="form-control" name="city_name">
          </div>
        </div>
        <div class="col">
          <button class="btn btn-primary">Save</button>
        </div>
    </form>
  </section>

  <section>
    <table class="boot-table table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th data-sortable="true" data-field="id" data-width="75">ID</th>
          <th data-sortable="true" data-field="name">Name</th>
          <th data-width="50" class="text-center">
            Delete
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cities as $city) : ?>
          <tr>
            <td><?= $city['city_id'] ?></td>
            <td><?= $city['city_name'] ?></td>
            <td><a class="btn btn-danger py-0 px-1" href="./src/api/city_delete.php?city_id=<?= $city['city_id'] ?>">X</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</main>