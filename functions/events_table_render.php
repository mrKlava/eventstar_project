<!-- TODO 
- make search functionality
- filtering
- pagination
 -->

<table class="table table-striped table-hover table-sm">
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
        <td>INT/INT</td>
        <td><?= $event['date'] ?></td>
        <td><?= $event['city_name'] ?></td>
        <td><a href="event-editor.php?event_id=<?=$event['event_id']?>">EDIT</a></td>
        <td>X</td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>