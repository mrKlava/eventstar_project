<table>
  <thead>
    <tr>
      <th><?= $events[0]['event_name'] ?></th>
      <th><?= $events[0]['date'] ?></th>
      <th><?= $events[0]['city_name'] ?></th>
      <th>Link</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($events as $event) : ?>
      <tr>
        <td><?= $event['event_name'] ?></td>
        <td><?= $event['date'] ?></td>
        <td><?= $event['city_name'] ?></td>
        <td><a href="event-editor.php?event_id=<?=$event['event_id']?>">EDIT</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>