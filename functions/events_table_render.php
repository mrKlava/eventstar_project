<!-- TODO 
- make search functionality
- filtering
- pagination
 -->

<table class="table table-striped table-hover table-sm" id="table">
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
      <th data-sortable="true" data-field="id">ID</th>
      <th data-sortable="true" data-field="name">Name</th>
      <th>Registrations</th>
      <th data-sortable="true" data-field="date">Date</th>
      <th data-sortable="true" data-field="city">City</th>
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
        <td>
          <?php $event['registrations'] = $event['registrations'] == NULL ? 0 : $event['registrations'] ?>
          <?= $event['registrations'] ?>
          /
          <?= $event['person_max'] ?></td>
        <td><?= $event['event_date'] ?></td>
        <td><?= $event['city_name'] ?></td>
        <td><a class="btn btn-primary py-0 px-1" href="event-editor.php?event_id=<?= $event['event_id'] ?>">E</a></td>
        <td><a class="btn btn-danger py-0 px-1" href="api/event_delete.php?event_id=<?= $event['event_id'] ?>&org_id=<?= $event['organizator_id'] ?>">X</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>