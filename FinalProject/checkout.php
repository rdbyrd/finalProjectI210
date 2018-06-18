<?php 

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //empty shopping cart
    unset($_SESSION['cart']);
    
    

    // display nav
    include('includes/navbar.php');


?>

<div class='jumbotron'>

    <h1>Checkout</h1>

    <p>Thank you for your order.  We hope you arrive back in one piece, with the current timeline in tact (for the most part).</p>

    

</div>

<?php 
    include('includes/footer.php');
?>