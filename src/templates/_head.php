<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?></title>


<!-- All pages -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
<link rel="stylesheet" href=<?= CSS . 'styles.css' ?> />

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script defer src=<?= JS . "main.js" ?> ></script>

<!-- Events Lists -->

<?php if ($page === 'events-going' || $page === 'events') : ?>
  <link rel="stylesheet" href=<?= CSS . 'events.css' ?> />

  <script defer src=<?= JS . 'events.js' ?>></script>
<?php endif ?>

<!-- Event details -->

<?php if ($page === 'event-details') : ?>
  <link rel="stylesheet" href=<?= CSS . 'event-details.css' ?> />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

  <script defer src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  <script defer src=<?= JS . 'map.js' ?> ></script>
<?php endif ?>


<!-- Bootstrap table -->

<?php if (strpos($title, 'Manager') || $page === 'event-participants') : ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.css" />

  <script defer src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script defer src="https://unpkg.com/bootstrap-table@1.21.3/dist/bootstrap-table.min.js"></script>
  <script defer src=<?= JS . 'tables.js' ?> ></script>
<?php endif ?>