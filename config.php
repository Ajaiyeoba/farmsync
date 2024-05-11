<?php
  // Enable error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Establish a connection to the database
  $link = mysqli_connect('localhost', 'root', '', 'farm_db');

  // Check if the connection was successful
  if (!$link) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
  }
?>
