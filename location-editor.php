<?php
session_start();
if (!isset($_SESSION['user_id'])) header('location:login.php');
if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

include './config/config.php';
include DB;
include API . './location_fetch.php';
?>


<!-- TODO
- HANDLE DATE AND TIME
- IMAGE
-->


<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Location Editor";
      include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'Location Editor';
  include TEMPLATE_PARTS . '_header.php'; ?>

  <main class="my-5">
    <section class="container">
      <form action="./api/location_update.php?location_id=<?= $_GET["location_id"] ?>" method="POST" class="row mb-3 border rounded-3 px-3 py-5">

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
            <?php if ($_GET["location_id"] && $_GET["location_id"] != "new") : ?>
              <h4>Location ID : <span class="ms-2"><?= $location["location_id"] ?></span></h4>
            <?php else : ?>
              <h4>New event</h4>
            <?php endif ?>
          </div>
          <div class="col mb-4">
            <label for="location_name" class="form-label">Name*</label>
            <input type="text" class="form-control" name="location_name" value="<?= $location["location_name"] ?>" required>
          </div>
        </div>

        <hr class="mb-4">



        <!-- <div class="row">
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
            <textarea class="form-control" name="details" style="height: 350px" required><?= $event["description"] ?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="mb-4">
            <label for="location_id" class="form-label">City & Location*</label>
            <select class="form-select" name="location_id" aria-label="Select city" required>
              <?php $sel_location = $event['location_id'] ?>
              <option <?php if ($sel_location == NULL) echo ('selected') ?> 
                    value="NULL" disabled>City - Location name : Address</option>
              <?php foreach ($locations as $location) : ?>
                <option <?php if ($sel_location == $location["location_id"]) echo ('selected') ?> 
                    value="<?= $location["location_id"] ?>">
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
        </div> -->
      </form>

    </section>

  </main>
</body>

</html>