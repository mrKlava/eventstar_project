<!-- TODO 
- sorting bug on event name
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
      <th data-sortable="true" 
          data-field="id" 
          data-width="75"
      >
        ID
      </th>
      <th data-sortable="true" 
          data-field="name"
      >
        Name
      </th>
      <th data-width="100">
        Registrations
      </th>
      <th data-sortable="true" 
          data-field="date" 
          data-width="160"
      >
        Date
      </th>
      <th data-sortable="true" 
          data-field="city" 
          data-width="200"
      >
        City
      </th>
      <th data-width="50"
          class="text-center"
      >
        Edit
      </th>
      <th data-width="50"
          class="text-center"
      >
        Delete
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($events as $event) : ?>
      <tr>
        <td><?= htmlspecialchars($event['event_id']) ?></td>
        <td>
          <a class="card-link" href="index.php?page=event-details&event_id=<?= htmlspecialchars($event['event_id']) ?>">
            <?= htmlspecialchars($event['event_name']) ?>
          </a>
        </td>
        <td>
          <a href="index.php?page=event-participants&event_id=<?= htmlspecialchars($event['event_id']) ?>">
            <?php $event['registrations'] = $event['registrations'] == NULL ? 0 : htmlspecialchars($event['registrations']) ?>
            <?= htmlspecialchars($event['registrations']) ?>
            /
            <?= htmlspecialchars($event['person_max']) ?>
          </a>
        </td>
        <td><?= htmlspecialchars($event['event_date']) ?></td>
        <td><?= htmlspecialchars($event['city_name']) ?></td>
        <td><a class="btn btn-primary py-0 px-1" href="index.php?page=event-editor&event_id=<?= htmlspecialchars($event['event_id']) ?>">E</a></td>
        <td><a class="btn btn-danger py-0 px-1" href="./src/api/event_delete.php?event_id=<?= htmlspecialchars($event['event_id']) ?>&org_id=<?= htmlspecialchars($event['organizator_id']) ?>">X</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>