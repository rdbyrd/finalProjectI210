<?php

require_once('includes/db_connect.php');

//starts the session

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//shows login
$_SESSION['login_status'] = 2;

//initialize variables for username and password
$username = $password = "";

//retrieve user name and password from the form in the registerform.php 
if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//validate user name and password against a record in the users table in the database
//select statement
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

//execute the query 
$query = @$conn->query($sql);

//fetch results
if ($query->num_rows) {
    //It is a valid user. Need to store the user in session variables.
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
//    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];

    //update the login status
    $_SESSION['login_status'] = 1;

    
}

?>

<h2 class="jumbotron">Welcome to the future.</h2>

<?php 
    if(isset($row['role']) && $row['role'] == 1) {
        echo "<h3>Welcome administrator.</h3>";
        echo "<a class='btn btn-outline-secondary' href='editItems.php'>Edit Items</a>";
        echo "<a class='btn btn-outline-secondary' href='userlist.php'>Edit Users</a>";
        $_SESSION['role'] = $row['role'];
        
        
    }  else if(isset($row['role'])) {
        echo "<a class='btn btn-outline-secondary' href=editUsers.php?id=", $row['user_id'],">Edit User Information</a>";
        $_SESSION['role'] = $row['role'];
        
    } else {
        echo "<h3 style='padding-left: 30px'>Your credentials are not valid. Please register if you have not done so.";
    }
?>

<?php
//close the connection
$conn->close();
