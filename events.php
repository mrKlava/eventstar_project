<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

include './config/config.php';
include DB;
include API . "events_fetch.php";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php $title = "Events";
      include TEMPLATES . "_head.php"; ?></head>

<body>
  <?php $page_title = 'Events';
  include TEMPLATE_PARTS . '_header.php'; ?>

  <main class="p-5">
    <section class="filter mb-4">

      <form class="row">
        <div class="input-group col mb-3">
          <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-btn">
          <button class="btn btn-primary" type="button" id="search-btn"><i class="fas fa-search"></i></button>
        </div>
        <div class="col-sm-3 mb-3">
          <input type="text" class="form-control"  placeholder="make city select">
        </div>
        <div class="col-sm-3">
          <select name="sort-inp" class="form-select" aria-label="">
            <option selected>Sort by</option>
            <option value="date-asc">New first</option>
            <option value="date-desc">Last first</option>
          </select>
        </div>
      </form>

    </section>

    <section>
      <?php include FUNCTIONS . "events_list_render.php"; ?>
    </section>

  </main>

</body>

</html>