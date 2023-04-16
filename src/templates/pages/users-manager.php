<?php
is_logged();

if (!is_admin()) header('location:index.php?page=not-found');

include API . 'users_fetch.php';
?>

<main class="container-fluid">
  <table class="boot-table table table-striped table-hover table-sm">
    <thead>
      <tr>
        <th data-sortable="true" data-field="id">ID</th>
        <th data-sortable="true" data-field="email">Email</th>
        <th data-sortable="true" data-field="name">Name</th>
        <th data-sortable="true" data-field="surname">Surname</th>
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
          <td><a class="btn btn-primary py-0 px-1" href="index.php?page=user-editor&user_id=<?= $user['user_id'] ?>">E</a></td>
          <td><a class="btn btn-danger py-0 px-1" href="./src/api/user_delete.php?user_id=<?= $user['user_id'] ?>">X</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>