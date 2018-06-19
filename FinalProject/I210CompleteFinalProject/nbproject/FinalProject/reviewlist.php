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
    <h1>Testimonials </h1>
</div>
<div class="container">

    <!-- PHP to generate row for each in "reviews" table -->
    <?php
//define the select statement
    $sql = "SELECT * FROM reviews";

//execute the query
    $query = $conn->query($sql);

    if (!$query) {
        $errno = $conn->connect_errno;
        $errmsg = $conn->connect_error;
        die("Connection to database failed: ($errno) $errmsg.");
    } else {
        while (($row = $query->fetch_assoc()) !== NULL) {

            echo "<div class='row'>";
            echo "<div class='col-md-8'>";
            echo "<div class='card'>";
            echo "<div class='card-header'>", $row['title'], "</div>";
            echo "<div class='card-body'><blockquote class='blockquote mb-0'><p>", $row['message'], "</p>";
            echo "<footer class='blockquote-footer'>", $row['username'], "</footer></blockquote></div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
        }
    }
    ?>

</div>

<?php include('includes/footer.php'); ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

