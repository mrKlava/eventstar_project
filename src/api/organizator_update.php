<?php
session_start();

include '../db/db.php';
include '../functions/user_handling.php';


// check if if user is admin or organizator
if (!is_admin() && !is_organizator()) header('location:../../index.php');

// check if all required fields are field
if (
  isset($_GET["organizator_id"])
  && isset($_POST["user_id"])
  && isset($_POST["organizator_name"])
  && isset($_POST["description"])
) {
  // required are not empty
  if (
    $_GET["organizator_id"]       != ''
    && $_POST["user_id"]          != ''
    && $_POST["organizator_name"] != ''
    && $_POST["description"]      != ''
  ) {

    // prepare data
    $organizator_id = htmlspecialchars($_GET['organizator_id']);
    $organizator_name = htmlspecialchars($_POST['organizator_name']);
    $description = htmlspecialchars($_POST['description']);
    $user_id = htmlspecialchars($_POST['user_id']);


    // check if selected user is already organizator
    $get_user = $db->prepare("SELECT user_id FROM organizators WHERE user_id = ? AND organizator_id <> ?");
    $get_user->execute([$user_id, $organizator_id]);

    $exists = $get_user->fetch(PDO::FETCH_ASSOC);

    if ($exists) {
      $_SESSION['error'] = 'Selected user is already organizator';
      header("location:../../index.php?page=organizator-editor&organizator_id=" . $_GET['organizator_id']);

    return;
    }

    // handle update of organizator
    if ($organizator_id != "new") {


      // get old organizator user_id
      $get_user = $db->prepare("SELECT user_id FROM organizators WHERE organizator_id = ?");
      $get_user->execute([$organizator_id]);
  
      $user_id_old = $get_user->fetch(PDO::FETCH_ASSOC);


      // update organizator info
      $update = $db->prepare("UPDATE organizators
      SET organizator_name = :organizator_name
        ,description = :description
        ,user_id = :user_id
      WHERE organizator_id = :organizator_id");

      $update->bindParam(':organizator_id',       $organizator_id);
      $update->bindParam(':organizator_name',     $organizator_name);
      $update->bindParam(':description',          $description);
      $update->bindParam(':user_id',              $user_id);

      $update->execute();

      $resp = $update->fetch(PDO::FETCH_ASSOC);


    // handle create of organizator
    } elseif ($organizator_id == 'new') {
      $create = $db->prepare("INSERT INTO organizators (
        organizator_name
        ,description
        ,user_id
      ) VALUES (
        :organizator_name
        ,:description
        ,:user_id
      )");

      $create->bindParam(':organizator_name',     $organizator_name);
      $create->bindParam(':description',          $description);
      $create->bindParam(':user_id',              $user_id);

      $create->execute();

      $resp = $create->fetch(PDO::FETCH_ASSOC);

      echo 'INSERTED';
      var_dump($resp);
    }

    // remove old user role
    if (!empty($user_id_old)) {
      $delete = $db->prepare('DELETE FROM user_role WHERE user_id = ? AND role_id = 4');
      $delete->execute([$user_id_old['user_id']]);
      $delete_user = $delete->fetch(PDO::FETCH_ASSOC);
    }

    // update user role
    $insert = $db->prepare('INSERT INTO user_role(user_id, role_id) VALUES(:user_id, 4)');
    $insert->bindParam(':user_id', $user_id);

    $insert->execute();

    $insert_user = $insert->fetch(PDO::FETCH_ASSOC);
  } else {
    $_SESSION['error'] = 'Please fill all required fields';
  }
} else {
  $_SESSION['error'] = 'Fatal error';
}

header("location:../../index.php?page=organizator-editor&organizator_id=" . $_GET['organizator_id']);