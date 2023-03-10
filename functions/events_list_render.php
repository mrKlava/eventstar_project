<!-- TODO
- check user is registered for event
-->

<?php foreach ($events as $event) : ?>
  <article class="card mb-5">
    <div class="row g-0">
      <div class="col-md-4">
        <img src=<?= IMAGES . "events/event1.jpg" ?> class="img-fluid rounded-start" alt="event1">
      </div>
      <div class="col-md-8">
        <div class="card-header text-muted px-5 d-flex justify-content-between flex-wrap">
          <p class="me-2">
            <small class="text-muted">
              <span><?= $event['date'] ?></span>
              in
              <span><?= $event['city_name'] ?></span>
            </small>
          </p>
          <p>info</p>
        </div>
        <div class="card-body p-5">
          <h5 class="card-title mb-3"><?= $event['event_name'] ?></h5>
          <p class="card-text mb-3"><?= $event['description'] ?></p>
          <a class="card-link" href="event-details.php?event_id=<?= $event['event_id'] ?>">More details</a>
        </div>
      </div>
    </div>
  </article>
<?php endforeach ?>