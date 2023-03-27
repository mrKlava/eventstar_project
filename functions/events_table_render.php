<!-- TODO 
- make search functionality
- filtering
- pagination
 -->

<table class="table table-striped table-hover table-sm">
  <p class="text-danger mb-4 text-center">
    <?php
    if (isset($_SESSION['error'])) {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
    }
    ?>
  </p>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Registrations</th>
      <th>Date</th>
      <th>City</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($events as $event) : ?>
      <tr>
        <td><?= $event['event_id'] ?></td>
        <td>
        <a class="card-link" href="event-details.php?event_id=<?= $event['event_id'] ?>">
          <?= $event['event_name'] ?>
        </a>
        </td>
        <td><?= $event['registrations'] ?>/<?= $event['person_max'] ?></td>
        <td><?= $event['event_date'] ?></td>
        <td><?= $event['city_name'] ?></td>
        <td><a href="event-editor.php?event_id=<?=$event['event_id']?>">EDIT</a></td>
        <td><a class="btn btn-danger py-0 px-1" href="api/event_delete.php?event_id=<?=$event['event_id']?>&org_id=<?=$event['organizator_id']?>">X</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>