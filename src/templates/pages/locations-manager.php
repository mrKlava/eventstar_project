<?php
is_logged();

if (!is_admin()) header('location:index.php?page=not-found');

include API . 'locations_fetch.php';
?>

<main class="container-fluid">
  <section>
    <a class="btn btn-primary" href="index.php?page=location-editor&location_id=new">Create New location</a>
  </section>
  <section>
    <table class="boot-table table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th data-sortable="true" data-field="id" data-width="75">ID</th>
          <th data-sortable="true" data-field="name">Name</th>
          <th data-sortable="true" data-field="city" data-width="250">City</th>
          <th data-sortable="true" data-field="address">Address</th>
          <th data-width="50" class="text-center">EDIT</th>
          <th data-width="50" class="text-center">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($locations as $location) : ?>
          <tr>
            <td><?= htmlspecialchars($location['location_id']) ?></td>
            <td><?= htmlspecialchars($location['location_name']) ?></td>
            <td><?= htmlspecialchars($location['city_name']) ?></td>
            <td><?= htmlspecialchars($location['address']) ?></td>
            <td><a class="btn btn-primary py-0 px-1" href="index.php?page=location-editor&location_id=<?= htmlspecialchars($location['location_id']) ?>">E</a></td>
            <td><a class="btn btn-danger py-0 px-1" href="./src/api/location_delete.php?location_id=<?= htmlspecialchars($location['location_id']) ?>">X</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</main>