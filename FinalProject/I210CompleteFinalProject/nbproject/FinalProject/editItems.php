
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome CDN -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Time Travel Agency</title>
  
</head>

<?php 

    include('includes/navbar.php');
    include('includes/database.php');

?>
<div class="jumbotron"> 
    <h1> Edit Items </h1>
</div>
<div class="container">

        <!-- PHP to generate row for each in "tickets" table -->
        <?php 
            if(!$query) {
                $errno = $conn->connect_errno;
                $errmsg = $conn->connect_error;
                die ("Connection to database failed: ($errno) $errmsg.");
            } else {
                while(($row = $query->fetch_assoc()) !== NULL) {
                    // display exiting items and delete button
                    echo "<div class='row'>";
                    echo "<div class='col-md-6'>";
                    echo "<h3>", $row['destination'], "</h3>";
                    echo "<p>", $row['description'], "</p>";
                    echo "<p>$", $row['cost'], "</p><br>";
                    echo "<a style='margin-bottom: 10px' class='btn btn-primary' href=deleteItem.php?id=" , $row['ticket_num'], "> Delete Item </a><br>";
                    echo "<a class='btn btn-primary' href=updateItem.php?id=" , $row['ticket_num'], "> Update Item </a>";
                    echo "</div>";
                    // display fields to update item
                    
                    echo "</div>";
                    echo "<hr>"; 

                }
            }
        ?>
        
            <div class = 'col-md-6'>
                <h2>Add New Item</h2>
                    <form action="addItem.php" method="post">
                        <table>
                            <tr>
                                <td colspan="2">Insert Item Information<br><br></td>
                            </tr>
                            <tr>
                                <td>Destination: </td>
                                <td><input name="destination" type="text" required></td>
                            </tr>
                            <tr>
                                <td>Time Period: </td>
                                <td><input name="timePeriod" type="text" required></td>
                            </tr>
                            <tr>
                                <td>Cost: </td>
                                <td><input name="cost" type="text" required></td>
                            </tr>
                            <tr>
                                <td>Image: </td>
                                <td><input name="image" type="text" required></td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td><input name="description" type="text" required></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Add Item" />
                                    <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />                    
                                </td>
                            </tr>
                        </table>
                    </form>
            </div>
        
    
</div>

<?php include('includes/footer.php'); ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
