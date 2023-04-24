<header class="header">

  <div class="banner mb-5 <?=$banner?>">
    <div class="overlay"></div>
    <div class="banner-inner">
      <div class="banner-content">
        <h1 class="page-title"><?= $page_title ?></h1>
      </div>
    </div>
  </div>

  <nav class="navbar bg-light fixed-top">
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">
        <img src="./public/assets/images/logo/eventstar.png" alt="Logo" height="24" class="d-inline-block align-text-top">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header bg-info bg-gradient">
          <?php if (isset($_SESSION['user_id'])) : ?>
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Welcome back <?= $_SESSION["name"] ?></h5>
          <?php endif ?>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <?php if (isset($_SESSION['user_id'])) : ?>

              <!-- USER -->

              <li class="nav-item">
                <a class="nav-link" href="index.php?page=events">Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=events-going">My events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=user-editor">Profile</a>
              </li>

              <!-- ORGANIZATOR -->

              <?php if ($_SESSION["roles"] != null && is_organizator()) : ?>
                <hr>
                <h6 class="mb-3"> Organizator menu </h6>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=events-manager">Manage events</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=event-editor&event_id=new">Create Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=organizator-editor">Organizator Profile</a>
                </li>
              <?php endif ?>

              <!-- ADMIN -->

              <?php if ($_SESSION["roles"] != null && is_admin()) : ?>
                <hr>
                <h6 class="mv-3"> Admin menu </h6>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=users-manager">User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=organizators-manager">Organizators</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=events-manager&events=all">Events</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=locations-manager">Locations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?page=city-manager">Cities</a>
                </li>
              <?php endif ?>

              <!-- GUEST --->

            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=events">Events</a>
              </li>
          </ul>

        <?php endif ?>

        </div>

        <!-- HANDLE LOGIN/REGISTER/LOGOUT -->

        <?php if (isset($_SESSION['user_id'])) : ?>
          <a class="btn btn-primary rounded-0" href="./src/api/user_logout.php">Log out</a>
        <?php else : ?>
          <div class="d-flex">
            <a class="btn btn-primary rounded-0 w-50" href="index.php?page=login">Log in</a>
            <a class="btn btn-secondary rounded-0 w-50" href="index.php?page=register">Register</a>
          </div>
        <?php endif ?>
      </div>
    </div>
  </nav>

</header>