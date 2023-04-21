<?php foreach ($events as $event) :

  // handle date format
  $date_obj = date_create($event["event_date"]);

  $event["date"] = $date_obj->format('d/m/Y');
  $event["hour"] = $date_obj->format('H');
  $event["min"] =  $date_obj->format('i');

  $event['place_left'] = $event["person_max"] - $event['registrations'];
?>

  <article class="card mb-5">
    <span class="d-none age-rating"><?=$event['age_rating']?></span>
    <div class="row g-0">
      <div class="col-md-4">
        <img src=<?= IMAGES . "events/event1.jpg" ?> class="img-fluid rounded-start" alt="event1">
      </div>
      <div class="col-md-8">
        <div class="card-header text-muted px-5 d-flex justify-content-between flex-wrap">
          <p class="me-2">
            <small class="text-muted">
              <span class="event-date"><?= $event['date'] ?></span> <span class="event-time"><?= $event['hour'] ?>:<?= $event['min'] ?></span>
              in
              <span class="city-name"><?= $event['city_name'] ?></span>
            </small>
          </p>
          <?php if (is_user()) : ?>
            <?php if (is_participant($event['event_id'])) : ?>
              <p class="text-success">You are registered</p>
            <?php else : ?>
              <?php if ($event['place_left'] > 0): ?>
                  <a class="btn btn-primary" href="./src/api/user_handle_registration.php?event_id=<?= $event['event_id'] ?>">Register</a>
                <?php else : ?>
                  <p>Event is full</p>
                <?php endif ?>
            <?php endif ?>
          <?php else : ?>
            <!-- show some info for not logged users -->
          <?php endif ?>

        </div>
        <div class="card-body p-5">
          <h5 class="card-title mb-3 event-name"><?= $event['event_name'] ?></h5>
          <p class="card-text mb-3"><?= $event['details'] ?></p>
          <a class="card-link" href="index.php?page=event-details&event_id=<?= $event['event_id'] ?>">More details</a>
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