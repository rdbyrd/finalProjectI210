<?php


require_once('includes/db_connect.php');
include('includes/navbar.php');
 
//retrieve user id from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "<h1 style='padding-top:50px'>Error: user id was not found.</h1>";
    require_once ('includes/footer.php');
    exit();
}
 
$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 
//define the MySQL delete statement
 $sql = "DELETE FROM users WHERE user_id=$user_id";
 
//execute the query
 $query = @$conn->query($sql);
 
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "<div class='alert alert-success' role='alert'><h3>You have been removed from history.</h3></div>";
// close the connection.
$conn->close();

// end session
session_unset();
session_destroy();
 
include ('includes/footer.php');
?>
