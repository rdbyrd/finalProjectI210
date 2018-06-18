<?php


require_once 'includes/db_connect.php';
require_once 'includes/navbar.php';

if (!isset($_SESSION['login'])) {
    header("Location: loginhtmlform.php");
}

$sql = "SELECT * FROM users WHERE username='{$_SESSION['login']}'";

$query = $conn->query($sql);

if(!$query) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die ("Connection to database failed: ($errno) $errmsg.");
} else {
    $row = $query->fetch_assoc();
}
$_SESSION['id'] = $row['user_id'];
?>

    <div class='container'>

        <div class='row'>

        <div class = 'col-md-6'>
                    <h2>Update User Information</h2>
                        <form action="manageUserUpdate.php" method="post">
                            <table>
                                <tr>
                                    <td colspan="2">Insert New Information<br><br></td>
                                </tr>
                                <tr>
                                    <td>First name: </td>
                                    <td><input name="firstname" type="text" value="<?php echo $row['firstname'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Last name: </td>
                                    <td><input name="lastname" type="text" value="<?php echo $row['lastname']?>"></td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td><input name="email" type="text" value="<?php echo $row['email']?>"></td>
                                </tr>
                                <tr>
                                    <td>User Name: </td>
                                    <td><input name="username" type="text" value="<?php echo $row['username']?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td><input name="password" type="password" value="<?php echo $row['password']?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <br>
                                        <input type="submit" value="Update" />
                                        <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />                    
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                        echo "<br>";
                        echo "<a class='btn btn-danger' href=userdelete.php?id=", $row['user_id'],">Delete Account</a>";
                        echo "<a style='margin-left:20px' class='btn btn-primary' href='logout.php' onclick='return confirm('Are you sure?')>Logout</a><br/>";

                        if ($_SESSION['role'] == 1) {
                            echo "<br><a class='btn btn-outline-secondary' href='editItems.php'>Edit Items</a>";
                            echo "<a style='margin-left:20px' class='btn btn-outline-secondary' href='userlist.php'>Edit Users</a>";
                        }
                        ?>    
                </div>

        </div>

    </div>

