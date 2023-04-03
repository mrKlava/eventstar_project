<?php
include API . "events_fetch.php";
include API . "cities_fetch.php";
?>

<main class="container">
  <section class="filter mb-4">

    <form class="row">
      <div class="input-group col mb-3">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-btn">
        <button class="btn btn-primary" type="button" id="search-btn"><i class="fas fa-search"></i></button>
      </div>
      <div class="col-sm-3 mb-3">
        <select class="form-select" name="location_id" aria-label="Select city" required>
          <?php $sel_location = $event['location_id'] ?>
          <option value="NULL">All cities</option>
          <?php foreach ($cities as $city) : ?>
            <option value="<?= $city["city_id"] ?>">
              <?= $city["city_name"] ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-sm-3">
        <select name="sort-inp" class="form-select" aria-label="">
          <option selected>Sort by</option>
          <option value="date-asc">New first</option>
          <option value="date-desc">Last first</option>
        </select>
      </div>
    </form>

  </section>

  <section>
    <?php include FUNCTIONS . "events_list_render.php"; ?>
  </section>
</main>