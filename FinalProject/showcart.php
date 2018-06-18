<?php


$page_title = "Shopping Cart";
require_once ('includes/navbar.php');

//define parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "timetraveldb";

//Connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);

//handle connection errors
if ($conn->connect_errno != 0) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die ("Connection failed with: ($errno) $errmsg.");
}
// create variable to hold grand total value
$grandTotal = 0;
?>
<div class="jumbotron">
    <h2>My Shopping Cart</h2>
</div>
<?php
 
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
   
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}
if (!isset($_SESSION['role'])) {
    
    echo "Please <a href='loginhtmlform.php'>login</a> to continue.<br><br>";
    include 'includes/footer.php';
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Destination</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <?php
    //insert code to display the shopping cart content
        // select statement
        $sql = "SELECT ticket_num, destination, cost, user_id FROM tickets WHERE 0";

        foreach(array_keys($cart) as $id) {
            $sql .= " OR ticket_num=$id";
        }

        
        // execute query
        $query = $conn->query($sql);

        // fetch books and display in table
        while($row = $query->fetch_assoc()) {
            $id = $row['ticket_num'];
            $title = $row['destination'];
            $price = $row['cost'];
            $qty = $cart[$id];
            $total = $qty * $price;
            $grandTotal += $total;
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'><a href='itemdetails.php?id=$id'>$title</a></th>";
            echo "<td>$$price</td>";
            echo "<td>$qty</td>";
            echo "<td>$$total</td></tr>";

        }
        $grandTotal = number_format($grandTotal,2);
        echo "<tr><th scope='row'><h2>Grand Total</h2></th><td></td><td></td><td><h2>$$grandTotal</h2></td></tr>";

    
    ?>
</table>
<br>
<div class="bookstore-button">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'destinations.php'" />
</div>
<br><br>

<?php
include ('includes/footer.php');
