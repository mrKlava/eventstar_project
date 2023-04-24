<?php
is_logged();

if (!is_admin()) header('location:index.php?page=not-found');

include API . 'organizators_fetch.php';
?>

<main class="container-fluid">
  <section>
    <a class="btn btn-primary" href="index.php?page=organizator-editor&organizator_id=new">Create New Organizator</a>
  </section>
  <section>
    <table class="boot-table table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th data-sortable="true" data-field="id">ID</th>
          <th data-sortable="true" data-field="title">Title</th>
          <th data-sortable="true" data-field="user_id">User ID</th>
          <th>EDIT</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($organizators as $organizator) : ?>
          <tr>
            <td><?= $organizator['organizator_id'] ?></td>
            <td><?= $organizator['organizator_name'] ?></td>
            <td><a href="index.php?page=user-editor&user_id=<?= $organizator['user_id'] ?>"><?= $organizator['user_id'] ?></a></td>
            <td><a class="btn btn-primary py-0 px-1" href="index.php?page=organizator-editor&organizator_id=<?= $organizator['organizator_id'] ?>">E</a></td>
            <td><a class="btn btn-danger py-0 px-1" href="./src/api/organizator_delete.php?organizator_id=<?= $organizator['organizator_id'] ?>">X</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</main>