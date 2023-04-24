<?php 

if (!is_admin()) header('location:index.php?page=not-found');

$fetch_organizators = $db->prepare("SELECT * FROM organizators ORDER BY organizator_name ASC");
$fetch_organizators->execute();

$organizators = $fetch_organizators->fetchAll(PDO::FETCH_ASSOC);
