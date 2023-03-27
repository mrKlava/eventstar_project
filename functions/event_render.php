<!-- TODO

- user registered on event handling
- ? carousel for gallery 
- ? map integration
 -->

<?php if (empty($event)) : ?>
  <h2>Event whit this id was not found</h2>
<?php else : ?>

  <main>

    <section class="container my-5">
      <div class="row mb-3 border rounded-3 px-3 py-3 mx-1">
        <div class="col-sm-8 mb-3">
          <p>Date: <span><?= $event['date'] ?></span> <span><?= $event['hour'] ?>:<?= $event['min'] ?></span></p>
          <?php if ($event["person_max"]) : ?>
            <p>Places left: <?= $event["person_max"] - $event['registrations'] ?></p>
          <?php endif ?>
          <p>City: <?= $event["city_name"] ?></p>
          <p>Location: <?= $event["location_name"] ?></p>
        </div>

        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center mb-3">
          <div class="row">
            <?php if ($event["age_rating"] != NULL) : ?>
              <p class="mb-3">This event has age limit: <?= $event["age_rating"] ?></p>
            <?php endif ?>
          </div>
          <div class="row">
            <?php if (in_array($event['event_id'], $_SESSION['events_going'])) : ?>
              <a class="btn btn-danger" href="./api/user_handle_registration.php?event_id=<?= $event['event_id'] ?>">Un-register</a>
            <?php else : ?>
              <a class="btn btn-success" href="./api/user_handle_registration.php?event_id=<?= $event['event_id'] ?>">Register</a>
            <?php endif ?>
          </div>
        </div>

        <hr class="my-3">
        <h5 class="mb-2">Details</h5>
        <p class="mb-3"><?= $event['details'] ?></p>
      </div>
    </section>

    <section class="container mb-5">
      <h3 class="title mb-3"> About event</h3>
      <p class="mb-3"><?= $event['description'] ?></p>
    </section>

    <div>
      <p class="container">Address: <?= $event["location_name"] ?> <?= $event["address"] ?> <?= $event["city_name"] ?></p>
      <div style="height:300px; background-color: green;">MAP</div>
    </div>

  </main>

<?php endif ?>