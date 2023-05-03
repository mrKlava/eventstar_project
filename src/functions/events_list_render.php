<section class="filter mb-5">

    <div class="row">

      <div class="col-sm-5 mb-3">
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
            <option value="<?=htmlspecialchars($city["city_name"])?>">
              <?=htmlspecialchars($city["city_name"])?>
            </option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="col-sm-2 mb-3">
        <select name="rating-input" id="ratingIn" class="form-select" aria-label="">
          <option value="NULL" selected>Age rating</option>
          <option value="1">For Kids</option>
          <option value="2">6+</option>
          <option value="3">12+</option>
          <option value="4">16+</option>
          <option value="5">18+</option>
        </select>
      </div>

      <div class="col-sm-2 mb-3">
        <select name="sort-inp" id="sortIn" class="form-select" aria-label="">
          <option value="" selected>Sort by</option>
          <option value="0">Name</option>
          <option value="1">Upcoming</option>
          <option value="2">Other</option>
        </select>
      </div>

    </div>

  </section>


<?php foreach ($events as $event) :

  // handle date format
  $date_obj = date_create($event["event_date"]);

  $event["date"] = $date_obj->format('d/m/Y');
  $event["hour"] = $date_obj->format('H');
  $event["min"] =  $date_obj->format('i');

  $event['place_left'] = $event["person_max"] - $event['registrations'];

  if (file_exists(IMAGES . 'events/' . $event['src'])) {
    $image = IMAGES . 'events/' . $event['src'];
  } else {
    $image = IMAGES . "events/event1.jpg";
  }
?>

  <article class="card mb-5">
    <span class="d-none age-rating"><?=htmlspecialchars($event['age_rating']) ?></span>
    <div class="row g-0">
      <div class="col-md-4">
        <img src=<?= htmlspecialchars($image) ?> class="img-fluid rounded-start" alt=<?= htmlspecialchars($image) ?>>
      </div>
      <div class="col-md-8">
        <div class="card-header text-muted px-5 d-flex justify-content-between flex-wrap">
          <p class="me-2">
            <small class="text-muted">
              <span class="event-date"><?= htmlspecialchars($event['date']) ?></span> <span class="event-time"><?= $event['hour'] ?>:<?= $event['min'] ?></span>
              in
              <span class="city-name"><?= htmlspecialchars($event['city_name']) ?></span>
            </small>
          </p>
          <?php if (is_user()) : ?>
            <?php if (is_participant($event['event_id'])) : ?>
              <p class="text-success">You are registered</p>
            <?php else : ?>
              <?php if ($event['place_left'] > 0): ?>
                  <a class="btn btn-primary" href="./src/api/user_handle_registration.php?event_id=<?= htmlspecialchars($event['event_id']) ?>">Register</a>
                <?php else : ?>
                  <p>Event is full</p>
                <?php endif ?>
            <?php endif ?>
          <?php else : ?>
            <!-- show some info for not logged users -->
          <?php endif ?>

        </div>
        <div class="card-body p-5">
          <h5 class="card-title mb-3 event-name"><?= htmlspecialchars($event['event_name']) ?></h5>
          <p class="card-text mb-3"><?= htmlspecialchars($event['details']) ?></p>
          <a class="card-link" href="index.php?page=event-details&event_id=<?= htmlspecialchars($event['event_id']) ?>">More details</a>
        </div>
      </div>
    </div>
  </article>

<?php endforeach ?>

<button id="btnUp">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
    <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
  </svg>
</button>