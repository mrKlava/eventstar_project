<?php
is_logged();

if (!is_admin()) header('location:index.php?page=not-found');

if (!isset($_GET['location_id'])) header('location:index.php?page=not-found');

if ($_GET['location_id'] != 'new') {
  include API . './location_fetch.php';
} else {
  $location = [
    'location_name' => '',
    'city' => '',
    'capacity' => '',
    'address' => '',
    'description' => '',
    'location_lat' => '',
    'location_long' => ''
  ];
}

include API . './locations_fetch.php';
include API . './cities_fetch.php';
?>

<main class="my-5 py-5">
  <section class="container">

    <p class="text-danger mb-4 text-center">
      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
    </p>

    <form action="./api/location_update.php?location_id=<?= $_GET["location_id"] ?>" method="POST" class="row mb-3 border rounded-3 px-3 py-5">
      <h4 class="mb-5">Location Editor</h4>
      <div class="row mb-3">
        <div class="col-sm-3 mb-4">
          <?php if ($_GET["location_id"] && $_GET["location_id"] != "new") : ?>
            <h5>Location ID : <span class="ms-2"><?= $location["location_id"] ?></span></h5>
          <?php else : ?>
            <h5>New Location</h5>
          <?php endif ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col mb-4">
          <label for="location_name" class="form-label">Name*</label>
          <input type="text" class="form-control" name="location_name" value="<?= $location["location_name"] ?>" required>
        </div>
        <div class="col-sm-3 mb-4">
          <label for="capacity" class="form-label">Capacity*</label>
          <input type="number" class="form-control" name="capacity" value="<?= $location["capacity"] ?>" min="0" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-8 mb-4">
          <label for="address" class="form-label">Address*</label>
          <input type="text" class="form-control" name="address" value="<?= $location["address"] ?>" required>
        </div>
        <div class="col-sm-4 mb-4">
          <label for="city_id" class="form-label">City Name*</label>
          <select class="form-select" name="city_id" aria-label="Select city" required>
            <option <?php if ($_GET['location_id'] === 'new') echo ('selected') ?> disabled>Select city</option>
            <?php $sel_city = $location['city_id'] ?>
            <?php foreach ($cities as $city) : ?>
              <option <?php if ($sel_city == $city["city_id"]) echo ('selected') ?> value="<?= $city["city_id"] ?>">
                <?= $city["city_name"] ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3 mb-4">
          <label for="location_lat" class="form-label">Latitude*</label>
          <input type="text" class="form-control" name="location_lat" value="<?= $location["location_lat"] ?>" required>
        </div>
        <div class="col-sm-3 mb-4">
          <label for="location_long" class="form-label">Longitude*</label>
          <input type="text" class="form-control" name="location_long" value="<?= $location["location_long"] ?>" required>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col">
          <label for="description" class="form-label">Description*</label>
          <textarea class="form-control" name="description" style="height: 150px" required><?= $location["description"] ?></textarea>
        </div>
      </div>
      <div class="col">
        <button class="btn btn-primary">Save</button>
      </div>
    </form>

  </section>
</main>