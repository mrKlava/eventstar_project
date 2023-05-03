<?php
is_logged();

if (!is_admin() && !is_organizator()) header('location:index.php?page=not-found');

include API . 'event_participants_fetch.php';
?>

<main class="container-fluid">
  <section>
    <p class="text-danger mb-4 text-center">
      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
    </p>

    <table class="boot-table table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th data-sortable="true" data-field="id" data-width="75">ID</th>
          <th data-sortable="true" data-field="name">Name</th>
          <th data-sortable="true" data-field="surname">Surname</th>
          <th data-sortable="true" data-field="email">Email</th>
          <th data-sortable="true" data-field="registered" data-width="200">Registered</th>
          <th data-width="50" class="text-center">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($registrants as $registrant) : ?>
          <tr>
            <td><?= htmlspecialchars($registrant['user_id']) ?></td>
            <td><?= htmlspecialchars($registrant['name']) ?></td>
            <td><?= htmlspecialchars($registrant['surname']) ?></td>
            <td><?= htmlspecialchars($registrant['email']) ?></td>
            <td><?= htmlspecialchars($registrant['registration_date']) ?></td>
            <td><a class="btn btn-danger py-0 px-1" href="./src/api/registration_delete.php?user_id=<?= htmlspecialchars($registrant['user_id']) ?>&event_id=<?= htmlspecialchars($_GET['event_id']) ?>">X</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</main>