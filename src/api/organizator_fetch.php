<?php
require_once './src/functions/user_handling.php';

is_logged();

/* handle admin */

if (is_admin() && isset($_GET['organizator_id']) && $_GET['organizator_id'] !== 'new') {
  $get_organizator = $db->prepare("SELECT * FROM organizators WHERE organizator_id = ?");
  $get_organizator->execute([$_GET['organizator_id']]);

  $organizator = $get_organizator->fetch(PDO::FETCH_ASSOC);

  if (empty($organizator)) header('location:index.php?page=not-found');

  return;
} 


/* handle user */

if (is_organizator()) {
  $get_organizator = $db->prepare("SELECT * FROM organizators WHERE organizator_id = ?");
  $get_organizator->execute([$_SESSION['org_id']]);

  $organizator = $get_organizator->fetch(PDO::FETCH_ASSOC);
}
