<?php
session_start();

include '../db/db.php';

/*  TODO
-- validate inputs from form

*/

// check if if user is admin or organizator
if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');


// check if all required fields are field
if (
  isset($_GET["event_id"])
  && isset($_POST["event_name"])
  && isset($_POST["date"])
  && isset($_POST["hour"])
  && isset($_POST["min"])
  && isset($_POST["person_max"])
  && isset($_POST["age_rating"])
  && isset($_POST["description"])
  && isset($_POST["details"])
  && isset($_POST["location_id"])
) {
  // required are not empty
  if (
    $_GET["event_id"]         != ''
    && $_POST["event_name"]   != ''
    && $_POST["date"]         != ''
    && $_POST["hour"]         != ''
    && $_POST["min"]          != ''
    && $_POST["person_max"]   != ''
    && $_POST["age_rating"]   != ''
    && $_POST["description"]  != ''
    && $_POST["details"]      != ''
    && $_POST["location_id"]  != ''
  ) {


    /* sanitize && validate data */

    // required 
    $user_id = $_SESSION["user_id"];
    $event_id = htmlspecialchars($_GET['event_id']);
    $event_name = htmlspecialchars($_POST['event_name']);
    $description = htmlspecialchars($_POST['description']);
    $details = htmlspecialchars($_POST['details']);
    
    // select
    $location_id = htmlspecialchars($_POST['location_id']);
    
    // handle dates
    $date = htmlspecialchars($_POST['date']);
    $hour = htmlspecialchars($_POST['hour']);
    $min = htmlspecialchars($_POST['min']);
    
    $event_date = "$date $hour:$min:00";
    
    $register_deadline = htmlspecialchars($_POST['register_deadline']);

    // numbers
    $age_rating = htmlspecialchars($_POST['age_rating']);
    $person_max = htmlspecialchars($_POST['person_max']);

    $image = htmlspecialchars($_POST['image']);


    // check if event is not new
    // handle updating of event
    if ($event_id != "new") {
      $update = $db->prepare("UPDATE events
      SET event_name = :event_name
        ,details = :details
        ,description = :description
        ,event_date = :event_date
        ,register_deadline = :register_deadline
        ,person_max = :person_max
        ,age_rating = :age_rating
        ,location_id = :location_id
      WHERE event_id = :event_id AND organizator_id = :organizator_id");


      $update->bindParam('event_name',          $event_name);
      $update->bindParam('details'    ,         $details);
      $update->bindParam('description',         $description);
      $update->bindParam('event_date',          $event_date);
      $update->bindParam('register_deadline',   $register_deadline);
      $update->bindParam('person_max',          $person_max);
      $update->bindParam('age_rating',          $age_rating);
      $update->bindParam('location_id',         $location_id);
      $update->bindParam('event_id',            $event_id);
      $update->bindParam('organizator_id',      $_SESSION['org_id']);

      $update->execute();

      var_dump($update);

      $resp = $update->fetch(PDO::FETCH_ASSOC);

      var_dump($resp);

      var_dump($location_id);

      echo 'updated';

      // handle creation of new event
    } else if ($event_id == "new") {
      $create = $db->prepare("INSERT INTO events (
        event_name
        ,details
        ,description
        ,event_date
        ,register_deadline
        ,person_max
        ,age_rating
        ,location_id
        ,organizator_id
      ) VALUES(
        :event_name
        ,:details
        ,:description
        ,:event_date
        ,:register_deadline
        ,:person_max
        ,:age_rating
        ,:location_id
        ,:organizator_id)"
      );

      $create->bindParam('event_name',          $event_name);
      $create->bindParam('details'    ,         $details);
      $create->bindParam('description',         $description);
      $create->bindParam('event_date',          $event_date);
      $create->bindParam('register_deadline',   $register_deadline);
      $create->bindParam('person_max',          $person_max);
      $create->bindParam('age_rating',          $age_rating);
      $create->bindParam('location_id',         $location_id);
      $create->bindParam('organizator_id',      $_SESSION['org_id']);

      $create->execute();

      var_dump($create);

      $resp = $create->fetch(PDO::FETCH_ASSOC);

      var_dump($resp);

    }
  } else {
    $_SESSION['error'] = 'Please fill all required fields';
  }
} else {
  $_SESSION['error'] = 'Fatal error';
}

header("location:../event-editor.php?event_id=" . $_GET['event_id']);

