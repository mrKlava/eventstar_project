<!-- TODO 
- make search functionality
- filtering
- pagination
 -->

<table class="table table-striped table-hover table-sm">
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Name</th>
      <th>Surname</th>
      <th>EDIT</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?= $user['user_id'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['surname'] ?></td>
        <td><a href="user-editor.php?user_id=<?=$user['user_id']?>">EDIT</a></td>
        <td><a class="btn btn-danger py-0 px-1" href="api/user_delete.php?user_id=<?=$user['user_id']?>">X</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>