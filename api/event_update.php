<?php
session_start();

include '../db/db.php';

/*  TODO
-- validate inputs from form

*/

if (!in_array(1, $_SESSION['roles']) && !in_array(4, $_SESSION['roles'])) header('location:index.php');

// check if all required fields are field
if (
  isset($_GET["event_id"])
  && isset($_POST["name"])
  && isset($_POST["date"])
  && isset($_POST["hour"])
  && isset($_POST["min"])
  && isset($_POST["places"])
  && isset($_POST["description"])
  && isset($_POST["details"])
  && isset($_POST["city"])
  && isset($_POST["location"])
) {
  // required are not empty
  if (
    $_GET["event_id"]         != ''
    && $_POST["name"]         != ''
    && $_POST["date"]         != ''
    && $_POST["hour"]         != ''
    && $_POST["min"]          != ''
    && $_POST["places"]       != ''
    && $_POST["description"]  != ''
    && $_POST["details"]      != ''
    && $_POST["city"]         != ''
    && $_POST["location"]     != ''
  ) {

    /* sanitize && validate data */

    // required 
    $user_id = $_SESSION["user_id"];
    $event_id = htmlspecialchars($_GET['event_id']);
    $event_name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $details = htmlspecialchars($_POST['details']);
    
    // select
    $city = htmlspecialchars($_POST['city']);
    $location = htmlspecialchars($_POST['location']);
    
    // handle dates
    $date = htmlspecialchars($_POST['date']);
    $hour = htmlspecialchars($_POST['hour']);
    $min = htmlspecialchars($_POST['min']);
    
    $event_date = "$date $hour:$min:00";
    
    $deadline = htmlspecialchars($_POST['deadline']);
    
    // numbers
    $age = htmlspecialchars($_POST['age']);
    $places = htmlspecialchars($_POST['places']);

    $image = htmlspecialchars($_POST['image']);

    var_dump($event_date);

    // check if event is not new
    if ($event_id != "new") {
      $update = $db->prepare("CALL PR_event_update(:event_id, :event_name, :description, :pers_max, :register_deadline, :event_date, :age_limit, :location_id , :organizatior_id)");

      $update->bindParam('event_id',            $event_id);
      $update->bindParam('event_name',          $event_name);
      $update->bindParam('description',         $description);
      $update->bindParam('pers_max',            $places);
      $update->bindParam('event_date',          $date);
      $update->bindParam('register_deadline',   $register_deadline);
      $update->bindParam('age_limit',           $age_limit);
      $update->bindParam('location_id',         $location_id);
      $update->bindParam('organizatior_id',     $organizatior_id);

      $update->execute();

      var_dump($update);

      $resp = $update->fetch(PDO::FETCH_ASSOC);

      var_dump($resp);

      // handle creation of new event
    } else {
      echo 'create';
    }
  }
}
