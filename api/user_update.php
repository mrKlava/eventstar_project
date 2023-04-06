<?php 
session_start();

include "../db/db.php";
include "../functions/user_handling.php";

is_logged();


$user_id = htmlspecialchars($_GET["user_id"]);

// check if session user id matches with requested user id
if ($_SESSION['user_id'] != $user_id && !is_admin()) {
  $_SESSION['error'] = 'Incorrect user ID';
  header('location:../index.php?page=not-found');
}

    /* HANDLE USER INFO */

// check form form required fields
if (
  isset( $_POST["name"]) 
  && isset( $_POST["surname"]) 
  && isset( $_POST["email"]) 
  && isset( $_POST["bdate"])
) {
  // check if they are not empty
  if ( 
    $_POST["name"] != '' 
    && $_POST["surname"] != '' 
    && $_POST["email"] != '' 
    && $_POST["bdate"] != ''
  ) {


    // sanitize input
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $birth_date = htmlspecialchars($_POST['bdate']);

    
    // check if birth date is valid
    $today = date("Y-m-d");

    if ($birth_date >= $today) {
      $_SESSION["error"] = "Invalid birth date";
      header("location:../index.php?page=user-editor&user_id=$user_id");
      return;
    }


    // check if email is not in use
    $email_check = $db->prepare("SELECT * FROM users WHERE user_id != :id AND email LIKE :email");
    $email_check->bindParam(':id', $user_id);
    $email_check->bindParam(':email', $email);

    $email_check->execute();

    $email_exists = $email_check->fetch(PDO::FETCH_ASSOC);

    // if email 
    if ($email_exists) {
      $_SESSION['error'] = "User with same email already exists";
      header("location:../index.php?page=user-editor&user_id=$user_id");
      return;
    }


    // update info
    $update = $db->prepare("UPDATE users SET email = :email, name = :name, surname = :surname, birth_date = :birth_date WHERE user_id = :id");

    $update->bindParam(':id', $user_id);
    $update->bindParam(':email', $email);
    $update->bindParam(':name', $name);
    $update->bindParam(':surname', $surname);
    $update->bindParam(':birth_date', $birth_date);

    $update->execute();


      /* HANDLE PAS UPDATE */
            
    // check password for update and update
    if(isset($_POST["pwd"]) && isset( $_POST["rePwd"])) {
      // check if password fields are not empty
      if(($_POST["pwd"] != '' || $_POST["rePwd"] != '')) {
        if($_POST["pwd"] == $_POST["rePwd"]) {
      
          $hash = password_hash($_POST['pwd'], PASSWORD_BCRYPT);

          $change_pwd = $db->prepare("UPDATE users SET hash = :hash WHERE user_id = :id");

          $change_pwd->bindParam(':id', $user_id);
          $change_pwd->bindParam(':hash', $hash);

          $change_pwd->execute();
        } else {
          $_SESSION["error"] = "Password is not matching";
        }
      }
    }
    
  } else {
    $_SESSION["error"] = "You need to fill all required fields";
  }
}

header("location:../index.php?page=user-editor&user_id=$user_id");
return;