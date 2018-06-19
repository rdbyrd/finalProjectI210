<?php

//include code from header.php and database.php
require_once('includes/db_connect.php');

$destination = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_STRING)));
$timePeriod = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'timePeriod', FILTER_SANITIZE_STRING)));
$cost = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//$role = 2;  //regular user

//insert statement. The id field is an auto field.
$sql = "INSERT INTO tickets VALUES (NULL, '$destination', '$timePeriod', '$cost', 1 , '$image', '$description')";

//execut the insert query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $error = "Insertion failed with: ($errno) $error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$conn->close();

//start session if it has not already started
 if (session_status() == PHP_SESSION_NONE) {
     session_start();
 }

//create session variables
// $_SESSION['login'] = $username;
// $_SESSION['name'] = "$firstname $lastname";
//$_SESSION['role'] = 2;

//set login status to 3 since this is a new user.

// $_SESSION['login_status'] = 3;

//redirect the user to the loginform.php page
header("Location: editItems.php");

