<?php
include "../db/db.php";

session_start();


if ( isset( $_POST["name"]) && isset( $_POST["surname"]) && isset( $_POST["email"]) && isset( $_POST["bdate"]) && isset( $_POST["pwd"]) ){
  if ( $_POST["name"] != '' && $_POST["surname"] != '' && $_POST["email"] != '' && $_POST["bdate"] != '' && $_POST["pwd"] != '' && $_POST["rePwd"] != '') {
    
    var_dump($_POST);

    if ($_POST["pwd"] != $_POST["rePwd"]) {
      $_SESSION['error'] = "Passwords not matching";
      header('location:../register.php');
      return;
    }

    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $hash = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
    $birth_date = htmlspecialchars($_POST['bdate']);

    $check = $db->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);

    $user_exists = $check->fetch(PDO::FETCH_ASSOC);

    if ($user_exists) {
      $_SESSION['error'] = "User already exists";
      header('location:../login.php');
      return;
    }


    $request = $db->prepare("INSERT INTO users (email, name, surname, hash, birth_date) VALUES(:email, :name, :surname, :hash, :birth_date)");

    $request->bindParam(':email', $email);
    $request->bindParam(':name', $name);
    $request->bindParam(':surname', $surname);
    $request->bindParam(':hash', $hash);
    $request->bindParam(':birth_date', $birth_date);

    var_dump($request);
    var_dump($email);
    var_dump($name);
    var_dump($surname);
    var_dump($hash);
    var_dump($birth_date);

    $request->execute();

    header('location:../login.php');
    return;
  }
}



// $2y$10$BaRB2eSVjEVwWhZ1wS12C.jt1hZt.0R.cvxpHLVb4YfkC5Wx131qe


//INSERT INTO `users` (`user_id`, `email`, `name`, `surname`, `hash`, `birth_date`) VALUES (NULL, 'test@email.com', 'test', 'test', '$2y$10$BaRB2eSVjEVwWhZ1wS12C.jt1hZt.0R.cvxpHLVb4YfkC5Wx131qe', '2023-02-17');