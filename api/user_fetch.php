<?php 

$user_id = htmlspecialchars($_GET["user_id"]);

// check if session user id matches with requested user id
if ($_SESSION['user_id'] != $user_id && !in_array(1, $_SESSION['roles'])) {
  $_SESSION['error'] = 'Wrong user ID';
  header('location:not-found.php');
}

$request = $db->prepare("SELECT * FROM users WHERE user_id = ?");
$request->execute([$user_id]);


$user = $request->fetch(PDO::FETCH_ASSOC);