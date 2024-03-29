<?php
is_logged();

if (!is_admin()) header('location:index.php?page=not-found');

include API . 'users_fetch.php';
?>

<main class="container-fluid">
  <table class="boot-table table table-striped table-hover table-sm">
    <thead>
      <tr>
        <th data-sortable="true" data-field="id" data-width="75">ID</th>
        <th data-sortable="true" data-field="email">Email</th>
        <th data-sortable="true" data-field="name" data-width="250">Name</th>
        <th data-sortable="true" data-field="surname" data-width="250">Surname</th>
        <th data-width="50" class="text-center">EDIT</th>
        <th data-width="50" class="text-center">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?= htmlspecialchars($user['user_id']) ?></td>
          <td><?= htmlspecialchars($user['email']) ?></td>
          <td><?= htmlspecialchars($user['name']) ?></td>
          <td><?= htmlspecialchars($user['surname']) ?></td>
          <td><a class="btn btn-primary py-0 px-1" href="index.php?page=user-editor&user_id=<?= htmlspecialchars($user['user_id']) ?>">E</a></td>
          <td><a class="btn btn-danger py-0 px-1" href="./src/api/user_delete.php?user_id=<?= htmlspecialchars($user['user_id']) ?>">X</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>