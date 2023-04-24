<?php
session_start();

include '../db/db.php';
require_once '../functions/user_handling.php';


/*  TODO

*/

// check if if user is admin
if (!is_admin()) header('location:index.php');

$org_id = htmlspecialchars($_GET['organizator_id']);


// get owner id 
$get_user = $db->prepare('SELECT user_id FROM organizators WHERE organizator_id = ?');
$get_user->execute([$org_id]);

$user = $get_user->fetch(PDO::FETCH_ASSOC);

var_dump($user);

if (!empty($user)) {
  // handle delete of organizator
  $delete_organizator = $db->prepare("DELETE FROM organizators WHERE organizator_id = ?");
  $delete_organizator->execute([$org_id]);
  
  $delete = $delete_organizator->fetch(PDO::FETCH_ASSOC);
  
  
  // remove role from user
  $remove_role = $db->prepare("DELETE FROM user_role WHERE user_id = ? and role_id = 4");
  $remove_role->execute([$user['user_id']]);

  $remove = $remove_role->fetch(PDO::FETCH_ASSOC);
}


header('location:../../index.php?page=organizators-manager');