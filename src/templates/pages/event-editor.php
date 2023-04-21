<?php
is_logged();

if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');

if (!isset($_GET['event_id'])) {
  var_dump('not set');
  var_dump(!isset($_GET['event_id']));

  header('locations:index.php?page=not-found');
}

include API . './event_editor_fetch.php';
include API . './locations_fetch.php';
?>

<main class="container my-5">
  
  <section class="">
    <form action="./src/api/event_update.php?event_id=<?= $_GET["event_id"] ?>&organizator_id=<?= $event['organizator_id'] ?>" method="POST" class="row mb-3 border rounded-3 px-3 py-5">

      <p class="text-danger mb-4 text-center">
        <?php
        if (isset($_SESSION['error'])) {
          echo $_SESSION['error'];
          unset($_SESSION['error']);
        }
        ?>
      </p>

      <div class="row mb-3">
        <div class="col-sm-3 mb-4">
          <?php if ($_GET["event_id"] && $_GET["event_id"] != "new") : ?>
            <h4>Event ID : <span class="ms-2"><?= $event["event_id"] ?></span></h4>
          <?php else : ?>
            <h4>New event</h4>
          <?php endif ?>
        </div>
        <div class="col-sm-9 mb-4">
          <div class="row mb-3">
            <h6>Organizator ID : <span class="ms-2"><?= $event["organizator_id"] ?></span></h6>
          </div>
          <div class="row">
            <h6>Organizator Name : <span class="ms-2"><?= $event["organizator_name"] ?></span></h6>
          </div>
        </div>
      </div>

      <hr class="mb-4">

      <div class="row">
        <div class="col mb-4">
          <label for="event_name" class="form-label">Name*</label>
          <input type="text" class="form-control" name="event_name" value="<?= $event["event_name"] ?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4 mb-4">
          <label for="date" class="form-label">Date*</label>
          <input type="date" class="form-control date-picker" name="date" value="<?= $event["date"] ?>" required>
        </div>
        <div class="col-sm-2 mb-4">
          <label for="hour" class="form-label">Hour*</label>
          <input type="number" class="form-control date-picker" name="hour" value="<?= $event["hour"] ?>" min="0" max="23" required>
        </div>
        <div class="col-sm-2 mb-4">
          <label for="min" class="form-label">Minutes*</label>
          <input type="number" class="form-control date-picker" name="min" value="<?= $event["min"] ?>" min="0" max="59" required>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4 mb-4">
          <label for="deadline" class="form-label">Registration Deadline</label>
          <input type="date" class="form-control date-picker" name="register_deadline" value="<?= $event["register_deadline"] ?>">
        </div>
        <div class="col-sm-4 mb-4">
          <label for="age_rating" class="form-label">Age Rating</label>
          <select class="form-select" name="age_rating" aria-label="Select rating">

            <?php $sel_age = $event['age_rating'] ?>

            <option <?php if ($sel_age == NULL) echo ('selected') ?> value="NULL" disabled>No Rating</option>
            <option <?php if ($sel_age == 1) echo ('selected') ?> value="1">For Kids</option>
            <option <?php if ($sel_age == 2) echo ('selected') ?> value="2">6+</option>
            <option <?php if ($sel_age == 3) echo ('selected') ?> value="3">12+</option>
            <option <?php if ($sel_age == 4) echo ('selected') ?> value="4">16+</option>
            <option <?php if ($sel_age == 5) echo ('selected') ?> value="5">18+</option>
          </select>
        </div>

        <div class="col-sm-4 mb-4">
          <label for="person_max" class="form-label">Places*</label>
          <input type="text" class="form-control" name="person_max" value="<?= $event["person_max"] ?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col mb-4">
          <label for="image" class="form-label">Image</label>
          <input type="text" class="form-control" name="image" value="<?= $event["name"] ?>">
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="description" class="form-label">Description*</label>
          <textarea class="form-control" name="description" style="height: 150px" required><?= $event["description"] ?></textarea>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="details" class="form-label">Details*</label>
          <textarea class="form-control" name="details" style="height: 350px" required><?= $event["details"] ?></textarea>
        </div>
      </div>

      <div class="row">
        <div class="mb-4">
          <label for="location_id" class="form-label">City & Location*</label>
          <select class="form-select" name="location_id" aria-label="Select city" required>
            <?php $sel_location = $event['location_id'] ?>
            <option <?php if ($sel_location == NULL) echo ('selected') ?> value="NULL" disabled>City - Location name : Address</option>
            <?php foreach ($locations as $location) : ?>
              <option <?php if ($sel_location == $location["location_id"]) echo ('selected') ?> value="<?= $location["location_id"] ?>">
                <?= $location["city_name"] ?> -
                <?= $location["location_name"] ?> :
                <?= $location["address"] ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <button class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>

  </section>
</main>