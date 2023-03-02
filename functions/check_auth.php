<?php
// init session
session_start(); 

// handle routes
if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
} else {
  header('location:index.php');
}