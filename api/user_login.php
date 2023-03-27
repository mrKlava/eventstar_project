<?php
include '../db/db.php';

// init session
session_start();

// check table for keys
if (isset($_POST["email"]) && isset($_POST["pwd"])) {
  // check if input is not empty
  if ($_POST["email"] != '' && $_POST["pwd"] != '') {

    $email = htmlspecialchars($_POST['email']);
    $pwd = $_POST['pwd'];

    // get user data
    $get_user = $db->prepare("SELECT * FROM users WHERE email = :email");
    $get_user->bindParam(':email', $email);
    $get_user->execute();

    $user = $get_user->fetch(PDO::FETCH_ASSOC);

    // check user exists
    if ($user) {
      if (password_verify($pwd, $user['hash'])) {
        // add user to session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        
        // add user roles to session
        $get_roles = $db->prepare("SELECT role_id FROM user_role WHERE user_id = :user_id");
        $get_roles->bindParam(':user_id', $user['user_id']);
        $get_roles->execute();
    
        $roles = $get_roles->fetchAll(PDO::FETCH_ASSOC);

        if ($roles) {
          foreach ($roles as $role) $_SESSION["roles"][] = intval($role['role_id']);
        } else {
          $_SESSION["roles"] = null;
        }


        if (in_array(4, $_SESSION['roles'])) {
          $get_org_id = $db->prepare("SELECT organizator_id FROM organizators WHERE user_id = :user_id");
          $get_org_id->bindParam('user_id', $user['user_id']);
          $get_org_id->execute();
          
          $org_id = $get_org_id->fetch(PDO::FETCH_ASSOC);

          $_SESSION['org_id'] = $org_id['organizator_id'];
        }

        // get list of events registered on
        require './user_events_going.php';


        // add registered event list
        // $get_event_list = $db->prepare("CALL PR_get_user_events(:user_id)");
        // $get_event_list->bindParam(':user_id', $user['user_id']);
        // $get_event_list->execute();

        // $event_list = $get_event_list->fetchAll(PDO::FETCH_ASSOC);
        

        // foreach ($event_list as $event) $_SESSION["event_list"][] = intval($event['event_id']);

        
        // redirect to index
        header('location:../index.php');

      } else {
        $_SESSION['error'] = "401 UNAUTHORIZED - wrong password";
        header('location:../login.php');
      }
    } else {
      $_SESSION['error'] = "401 UNAUTHORIZED - no user found";
      header('location:../login.php');
    }
  }
}
