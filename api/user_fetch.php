<?php 

$id = htmlspecialchars($_GET["id"]);

// check if session user id matches with requested user id
if ($_SESSION['user_id'] != $id) {
  $_SESSION['error'] = 'Wrong user ID';
  header('location:not-found.php');
}

$request = $db->prepare("SELECT * FROM users WHERE user_id = ?");
$request->execute([$id]);


$user = $request->fetch(PDO::FETCH_ASSOC);