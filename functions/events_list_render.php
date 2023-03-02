<?php foreach ($events as $event) : ?>
  <article class="row mb-5 bg-info">
    <div class="col-4">

    </div>
    <div class="col-8 p-3">
      <h4><?= $event['event_name'] ?></h4>
      <div class="row">
        <p>
          <span><?= $event['date'] ?></span>
          in
          <span><?= $event['city_name'] ?></span>
        </p>
      </div>
      <div class="row">
        <p><?= $event['description'] ?></p>
      </div>
      <a href="event-details.php?event_id=<?= $event['event_id'] ?>">More details</a>
    </div>
  </article>
<?php endforeach ?>