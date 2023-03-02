<?php $page_title = 'Events';
include TEMPLATE_PARTS . '_header.php'; ?>

<?php if (empty($event)) :
  echo "No events with this id";
?>
  <h1>404</h1>
  <h2>Event whit this id was not found</h2>
<?php else : ?>
  <h2><?= $event['event_name'] ?></h2>

  <p>Date: <?= $event["date"] ?></p>

  <?php if ($event["pers_max"]) : ?>
    <p>Places left: <?= $event["pers_max"] - $event['registrations'] ?></p>
  <?php endif ?>
  <br>
  <p><?= $event['description'] ?></p>

  <p>Address: <?= $event["location_name"] ?> <?= $event["address"] ?> <?= $event["city_name"] ?></p>

<?php endif ?>