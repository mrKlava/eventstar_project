<?php
include API . "events_fetch.php";
include API . "cities_fetch.php";
?>

<main class="container">
  <section class="filter mb-4">

    <div class="row">

      <div class="col-5 mb-3">
        <div class="input-group">
          <input type="text" class="form-control" id="searchIn" placeholder="Search" aria-label="Search" aria-describedby="searchBtn">
          <button class="btn btn-primary" type="button" id="searchBtn">
            <svg style="width: 1.25rem; fill:#fff;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
            </svg>
          </button>
        </div>
      </div>

      <div class="col-sm-3 mb-3">
        <select class="form-select" id="cityIn" name="location_id" aria-label="Select city">
          <option value="NULL" selected>All cities</option>
          <?php foreach ($cities as $city) : ?>
            <option value="<?= $city["city_name"] ?>">
              <?= $city["city_name"] ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="col-sm-2">
        <select name="rating-input" id="ratingIn" class="form-select" aria-label="">
          <option value="NULL" selected>Age rating</option>
          <option value="1">For Kids</option>
          <option value="2">6+</option>
          <option value="3">12+</option>
          <option value="4">16+</option>
          <option value="5">18+</option>
        </select>
      </div>

      <div class="col-sm-2">
        <select name="sort-inp" id="sortIn" class="form-select" aria-label="">
          <option value="" selected>Sort by</option>
          <option value="0">Name</option>
          <option value="1">Upcoming</option>
          <option value="2">Other</option>
        </select>
      </div>

    </div>



  </section>

  <section class="cards" id="cards">
    <?php include FUNCTIONS . "events_list_render.php"; ?>
  </section>
</main>