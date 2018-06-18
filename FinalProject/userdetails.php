<?php

require_once ('includes/db_connect.php');

//retrieve user id
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "<h2>Your ID is undetected.</h2>";
    require_once ('includes/footer.php');
    exit();
}

$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM users WHERE user_id=" . $user_id;

//execute the query
$query = $conn->query($sql);

//retrieve the results
$row = $query->fetch_assoc();

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}
//display results in a table
?>

<h2 class="jumbotron">User Details</h2>

<table align="center">
    <tr>
        <th>User ID</th>
        <td><?php echo $row['user_id'] ?></td>
    </tr>
        <tr>
        <th>Firstname</th>
        <td><?php echo $row['firstname'] ?> </td>
    </tr>    
    <tr>
        <th>Lastname</th>
        <td><?php echo $row['lastname'] ?> </td>
    </tr>    
    <tr>
        <th>Email</th>
        <td> <?php echo $row['email'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $row['username'] ?> </td>
    </tr>
    <tr>
        <th>Password</th>
        <td><?php echo $row['password'] ?> </td>
    </tr>
</table>
<p align="center">

<form action="userdelete.php" onsubmit="return confirm('Confirm this action if you wish the user be deleted from history.')" align='center'>
    <input type="submit" value="Delete">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'userlist.php'" value="Cancel">
    <input type="hidden" name="id" value="<?php echo $row['user_id'] ?>">
</form>


</p>

<?php

//finish the query to remove results
$query->close();

// close the connection.
$conn->close();

require_once ('includes/footer.php');