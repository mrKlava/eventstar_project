<?php
require_once './src/functions/user_handling.php';

is_logged();

/* Handle for admin */

if (is_admin()) {
  if (isset($_GET['events']) && $_GET['events'] === 'all') {
    $request = $db->prepare("SELECT * FROM VIEW_events_list");
    $request->execute();
    
    $events = $request->fetchAll(PDO::FETCH_ASSOC);
    return;
  }
}

/* Handle for orgonizator */

if (is_organizator()) {
  $request = $db->prepare("SELECT * FROM VIEW_events_list WHERE organizator_id = :org_id ORDER BY event_id");
  $request->bindParam(':org_id', $_SESSION['org_id']);
  $request->execute();
  
  $events = $request->fetchAll(PDO::FETCH_ASSOC);
}