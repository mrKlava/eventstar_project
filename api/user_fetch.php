<?php 
require_once './functions/user_handling.php';

is_logged();

/* handle admin */

if (is_admin()) {
  if (isset($_GET['user_id'])) {
    $get_user = $db->prepare("SELECT * FROM users WHERE user_id = ?");
    $get_user->execute([$_GET['user_id']]);
  
    $user = $get_user->fetch(PDO::FETCH_ASSOC);

    if (empty($user)) header('location:index.php?page=not-found');

    return;
  } else {
    header('location:../index.php?page=not_found');
  }
}

/* handle user */

if (is_user()) {
  $get_user = $db->prepare("SELECT * FROM users WHERE user_id = ?");
  $get_user->execute([$_SESSION['user_id']]);

  $user = $get_user->fetch(PDO::FETCH_ASSOC);
}