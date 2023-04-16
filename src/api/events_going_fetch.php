<?php
require_once './src/functions/user_handling.php';

is_logged();

// get all event ids where user is registered
$request = $db->prepare(" SELECT *
FROM VIEW_events_list
WHERE event_id IN (
SELECT event_id 
  FROM registrations AS R
  WHERE R.user_id = :user_id
) ORDER BY event_date ASC");

$request->bindParam(':user_id', $_SESSION['user_id']);

$request->execute();

$events = $request->fetchAll(PDO::FETCH_ASSOC);