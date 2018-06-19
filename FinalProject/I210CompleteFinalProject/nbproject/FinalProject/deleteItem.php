<?php 

include('includes/db_connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM tickets WHERE ticket_num=$id";

if(mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: editItems.php');
    exit;
} else {
    echo "Error deleting item.";
}

?>