<?php
session_start();

include '../db/db.php';


if (
  isset($_POST["name"])
  && isset($_POST["surname"])
  && isset($_POST["email"])
  && isset($_POST["bdate"])
  && isset($_POST["pwd"])
) {
  if (
    $_POST["name"] != ''
    && $_POST["surname"] != ''
    && $_POST["email"] != ''
    && $_POST["bdate"] != ''
    && $_POST["pwd"] != ''
    && $_POST["rePwd"] != ''
  ) {

    var_dump($_POST);

    if ($_POST["pwd"] != $_POST["rePwd"]) {
      $_SESSION['error'] = "Passwords not matching";
      header('location:../../index.php?page=register');
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
      header('location:../../index.php?page=login');
      return;
    }

    $request = $db->prepare("INSERT INTO users (email, name, surname, hash, birth_date) VALUES(:email, :name, :surname, :hash, :birth_date)");

    $request->bindParam(':email', $email);
    $request->bindParam(':name', $name);
    $request->bindParam(':surname', $surname);
    $request->bindParam(':hash', $hash);
    $request->bindParam(':birth_date', $birth_date);

    $request->execute();

    header('location:../../index.php?page=login');
    return;
  }
}