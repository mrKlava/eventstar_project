<?php 
if (!is_admin() && !is_organizator()) header('location:index.php');

$fetch_users = $db->prepare("SELECT * FROM users ORDER BY user_id ASC");
$fetch_users->execute();

$users = $fetch_users->fetchAll(PDO::FETCH_ASSOC);
