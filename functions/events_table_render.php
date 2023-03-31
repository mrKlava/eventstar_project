<!-- TODO 
- sorting bug on event name
- pagination bug with dropdown
 
-->

<table class="boot-table table table-striped table-hover table-sm">
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
      <th data-sortable="true" data-field="id" data-width="75">
        ID
      </th>
      <th data-sortable="true" data-field="name">
        Name
      </th>
      <th data-width="100">
        Registrations
      </th>
      <th data-sortable="true" data-field="date" data-width="160">
        Date
      </th>
      <th data-sortable="true" data-field="city" data-width="200">
        City
      </th>
      <th data-width="32">Edit</th>
      <th data-width="32">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($events as $event) : ?>
      <tr>
        <td><?= $event['event_id'] ?></td>
        <td>
          <a class="card-link" href="index.php?page=event-details&event_id=<?= $event['event_id'] ?>">
            <?= $event['event_name'] ?>
          </a>
        </td>
        <td>
          <a href="index.php?page=event-registrations&event_id=<?= $event['event_id'] ?>">
            <?php $event['registrations'] = $event['registrations'] == NULL ? 0 : $event['registrations'] ?>
            <?= $event['registrations'] ?>
            /
            <?= $event['person_max'] ?>
          </a>
        </td>
        <td><?= $event['event_date'] ?></td>
        <td><?= $event['city_name'] ?></td>
        <td><a class="btn btn-primary py-0 px-1" href="index.php?page=event-editor&event_id=<?= $event['event_id'] ?>">E</a></td>
        <td><a class="btn btn-danger py-0 px-1" href="api/event_delete.php?event_id=<?= $event['event_id'] ?>&org_id=<?= $event['organizator_id'] ?>">X</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>