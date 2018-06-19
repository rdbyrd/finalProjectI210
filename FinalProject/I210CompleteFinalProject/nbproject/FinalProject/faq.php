
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

<?php include('includes/navbar.php'); ?>

<!-- Jumbotron header -->
<div class="jumbotron">
    <h1>Frequently Asked Questions</h1>
</div>

<!-- Accordion HTML -->
    <button class="accordion">Are we allowed to bring back any souvenirs?</button>
    <div class="panel">
        <br>
        <p>You make bring back whatever you like, but keep in mind that this may alter the present in magnificent or terrible ways. The company also gets 50% of any and all plunder acquired on the trip.</p>
    </div>

    <button class="accordion">What if I have a bad experience?</button>
    <div class="panel">
        <br>
        <p>If you have a bad experience, we will go back in time and ensure that your experience goes better.  If your experience is so bad that you perish in the distant past/future, then we will destroy all documents that hint that there was ever a relationship between you and our company.  We will carry on like you never existed and your family will not be informed.</p>
    </div>

    <button class="accordion">Why don't you all just do the world a favor and just go back in time and kill Hitler?</button>
    <div class="panel">
        <br>
        <p>Why don't you just stop asking stupid questions? Idiot.</p>
    </div>

<!-- Custom Javascript for accordion -->
<script>

    // get elements
    var acc = document.getElementsByClassName("accordion");
    var i;

    // loop through and add event listeners
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {

          // add/remove active class to show current question
          this.classList.toggle("activeAccordion");
          var panel = this.nextElementSibling;
          if (panel.style.maxHeight){
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          } 
        });
      }
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php include('includes/footer.php'); ?>
