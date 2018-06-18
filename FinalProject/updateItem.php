<?php

//include code from header.php and database.php
require_once('includes/db_connect.php');
include('includes/navbar.php');

$id = $_GET['id'];

// select statement
$sql = "SELECT * FROM tickets WHERE ticket_num=$id";

// execute query
$query = $conn->query($sql);

if(!$query) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die ("Connection to database failed: ($errno) $errmsg.");
} else {
    $row = $query->fetch_assoc();
    
}

?>

<div class='container'>

    <div class='row'>

    <div class = 'col-md-6'>
                <h2>Update Item Information</h2>
                    <form action="manageUpdate.php" method="post">
                        <table>
                            <tr>
                                <td colspan="2">Insert Item Information<br><br></td>
                            </tr>
                            <tr>
                                <td>Destination: </td>
                                <td><input name="destination" type="text" value="<?php echo $row['destination'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Time Period (YYYY): </td>
                                <td><input name="timePeriod" type="text" value="<?php echo $row['time_period']?>"></td>
                            </tr>
                            <tr>
                                <td>Cost: </td>
                                <td><input name="cost" type="text" value="<?php echo $row['cost']?>"></td>
                            </tr>
                            <tr>
                                <td>Image: </td>
                                <td><input name="image" type="text" value="<?php echo $row['images']?>"></td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td><input name="description" type="text" value="<?php echo $row['description']?>"></td>
                            </tr>
                            <tr>
                                <td>ID:</td>
                                <td><input name="id" type="text" value="<?php echo $id ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Update" />
                                    <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />                    
                                </td>
                            </tr>
                        </table>
                    </form>
            </div>

    </div>

</div>

