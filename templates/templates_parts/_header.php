<header>
  <div>
    <h1><?= $page_title ?></h1>
  </div>

  <nav class="navbar bg-light fixed-top">
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">
        <img src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        EventStar
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header bg-info bg-gradient">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Welcome back <?=$_SESSION["name"]?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <!-- USER -->

            <li class="nav-item">
              <a class="nav-link" href="events.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="events-registered.php?id=<?=$_SESSION['user_id']?>">My events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php?id=<?=$_SESSION['user_id']?>">Profile</a>
            </li>

            <!-- ORGANIZATOR -->

            <?php if ($_SESSION["roles"] != null && in_array(4, $_SESSION["roles"])): ?>
              <hr>
              <h6> Organizator menu </h6>
            <li class="nav-item">
              <a class="nav-link" href="events-manager.php?id=<?=$_SESSION["user_id"]?>">Manage events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="events-editor.php?id=<?=$_SESSION["user_id"]?>">Create Event</a>
            </li>
            <?php endif ?>

            <!-- ADMIN -->

            <?php if ($_SESSION["roles"] != null && in_array(1, $_SESSION["roles"])): ?>
              <hr>
              <h6> Admin menu </h6>
              <li class="nav-item">
                <a class="nav-link" href="user-table.php">User List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="events-table.php">Events List</a>
              </li>
            <?php endif ?>
            </ul>

          </div>
          
          <a class="btn btn-primary" href="api/user_logout.php">Log out</a>
        </div>
      </div>
    </nav>
</header>