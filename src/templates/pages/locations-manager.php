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
          <th data-sortable="true" data-field="id">ID</th>
          <th data-sortable="true" data-field="name">Name</th>
          <th data-sortable="true" data-field="city">City</th>
          <th data-sortable="true" data-field="address">Address</th>
          <th>EDIT</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($locations as $location) : ?>
          <tr>
            <td><?= $location['location_id'] ?></td>
            <td><?= $location['location_name'] ?></td>
            <td><?= $location['city_name'] ?></td>
            <td><?= $location['address'] ?></td>
            <td><a class="btn btn-primary py-0 px-1" href="index.php?page=location-editor&location_id=<?= $location['location_id'] ?>">E</a></td>
            <td><a class="btn btn-danger py-0 px-1" href="./src/api/location_delete.php?location_id=<?= $location['location_id'] ?>">X</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</main>