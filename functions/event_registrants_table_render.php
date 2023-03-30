<!-- TODO 
 
-->
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
        <th data-sortable="true" data-field="id">ID</th>
        <th data-sortable="true" data-field="name">Name</th>
        <th data-sortable="true" data-field="surname">Surname</th>
        <th data-sortable="true" data-field="email">Email</th>
        <th data-sortable="true" data-field="registered">Registered</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($registrants as $registrant) : ?>
        <tr>
          <td><?= $registrant['user_id'] ?></td>
          <td><?= $registrant['name'] ?></td>
          <td><?= $registrant['surname'] ?></td>
          <td><?= $registrant['email'] ?></td>
          <td><?= $registrant['registration_date'] ?></td>
          <td><a class="btn btn-danger py-0 px-1" href="api/registration_delete.php?user_id=<?= $registrant['user_id'] ?>&event_id=<?= $_GET['event_id'] ?>">X</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</section>