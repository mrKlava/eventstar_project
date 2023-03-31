<?php include API . "events_fetch.php" ?>

<main class="container">
  <section class="filter mb-4">

    <form class="row">
      <div class="input-group col mb-3">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-btn">
        <button class="btn btn-primary" type="button" id="search-btn"><i class="fas fa-search"></i></button>
      </div>
      <div class="col-sm-3 mb-3">
        <input type="text" class="form-control" placeholder="make city select">
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