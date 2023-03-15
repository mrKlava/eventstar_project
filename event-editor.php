<?php
session_start();
if (!isset($_SESSION['user_id'])) header('location:login.php');
if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

include './config/config.php';
include DB;
include API . './event_editor_fetch.php';
?>


<!-- TODO
- HANDLE DATE AND TIME
- IMAGE
-->


<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Event Editor";
      include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'Event Editor';
  include TEMPLATE_PARTS . '_header.php'; ?>

  <main class="my-5">
    <section class="container">
      <form action="./api/event_update.php?event_id=<?=$_GET["event_id"]?>" method="POST" class="row mb-3 border rounded-3 px-3 py-5">

        <div class="row mb-3">
          <div class="col-sm-3 mb-4">
            <?php if($_GET["event_id"] && $_GET["event_id"] != "new") : ?>
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
            <label for="name" class="form-label">Name*</label>
            <input type="text" class="form-control" name="name" value="<?= $event["event_name"] ?>" required>
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
            <input type="date" class="form-control date-picker" name="deadline" value="<?= $event["register_deadline"] ?>">
          </div>
          <div class="col-sm-4 mb-4">
            <label for="age" class="form-label">Age Rating</label>
            <select class="form-select" name="age" aria-label="Select rating">
              <option selected>No Rating</option>
              <option value="1">For Kids</option>
              <option value="2">6+</option>
              <option value="3">12+</option>
              <option value="4">16+</option>
              <option value="5">18+</option>
            </select>
          </div>
          <div class="col-sm-4 mb-4">
            <label for="places" class="form-label">Places*</label>
            <input type="text" class="form-control" name="places" value="<?= $event["registrations"] ?>" required>
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
          <div class="col-sm-5 mb-4">
            <label for="city" class="form-label">City*</label>
            <select class="form-select" name="city" aria-label="Select city" required>
              <option selected>Select city</option>
              <option value="1">For Kids</option>
              <option value="2">6+</option>
              <option value="3">12+</option>
              <option value="4">16+</option>
              <option value="5">18+</option>
            </select>
          </div>
          <div class="col-sm-7 mb-5">
            <label for="location" class="form-label">Location*</label>
            <select class="form-select" name="location" aria-label="Select Location" required>
              <option selected>Select Location</option>
              <option value="1">Select Location</option>
              <option value="2">6+</option>
              <option value="3">12+</option>
              <option value="4">16+</option>
              <option value="5">18+</option>
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
</body>

</html>