<table>
  <thead>
    <tr>
      <th><?= $users[0]['user_id'] ?></th>
      <th><?= $users[0]['email'] ?></th>
      <th><?= $users[0]['name'] ?></th>
      <th>Link</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?= $user['user_id'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><a href="event-editor.php?user_id=<?=$user['user_id']?>">EDIT</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>