<?php

require_once 'includes/db_connect.php';
require_once 'includes/navbar.php';

$sql = "SELECT * FROM users WHERE username='{$_SESSION['login']}'";

$query = $conn->query($sql);

if(!$query) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die ("Connection to database failed: ($errno) $errmsg.");
} else {
    $row = $query->fetch_assoc();
}
?>

<h2 class="jumbotron">Welcome to the future! Your account has been created.</h2>

<?php
echo "<a class='btn btn-outline-secondary' href=editUsers.php?id=", $row['user_id'],">Edit User Information</a>";
?>
        
<?php 
include 'includes/footer.php';