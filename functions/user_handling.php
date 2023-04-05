<?php


function is_logged() {
  if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Unauthorized';
    header('location:index.php?page=not-found');
  }
}


function is_user() {
  return isset($_SESSION['user_id']);
}


function is_admin() {
  if (isset($_SESSION['roles'])) {
    return in_array(1, $_SESSION['roles']);
  }
  return false;
}


function is_organizator() {
  if (isset($_SESSION['roles'])) {
    return in_array(4, $_SESSION['roles']);
  }
  return false;
}


function is_participant($event_id) {
  return in_array($event_id, $_SESSION['events_going']);
}