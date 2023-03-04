<?php 

$fetch_users = $db->prepare("SELECT * FROM users");
$fetch_users->execute();

$users = $fetch_users->fetchAll(PDO::FETCH_ASSOC);
