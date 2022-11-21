<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Motor Bike for sale or hire" />
    <meta name="keywords" content="affortable, bike, motorcycle, cheap motor bikes" />
    <meta name="author" content="Ayesha Akther" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> MOTORILA | ENHANCEMENTS 2 </title>
    <link href="styles/style.css" rel="stylesheet" />

</head>

<body>
<?php
include_once ("header.inc");
?>
    <section>
        <h1>ENHANCEMENTS 2</h1>
        <p class="enhancement"><strong>1. Preloaded Name on credit card </strong>
        <br>
        <br>Location Used: <a href="payment.php">Payment Page</a> 
        <br>
        <br>Referrence website : <a >Lab 06 task 2</a> 
        <br>
        <br> Explanation : For this enhancement to work, the user must fillout the enquiry form. Only then this enhancement loads name which was written in the enquiry page into the Credit Card Name 
        input box of the user. This concatenates the first and last name of the user and writes them as a full name. I extracted the first and the last name from storage and called that in a function 
        and replaced the value of the credit card name's input box with this.
        </p>
        <p class="enhancement"><strong>2. Timer   </strong>
        <br>
        <br>Location Used: <a href="payment.php">Payment Page</a> 
        <br>
        <br>Referrence website : <a href="https://www.w3schools.com">w3schools.com</a> 
        <br>
        <br> Explanation : This enhancemnent works when the user is on the payment.html page. This sets out a timer of
         1000s ( which is approximately 17 minutes.). In my opinion , it is enough for a user to enter credit card 
         details and check out the their details on the payment webpage. After the time is over , it redirects to the homepage.
        </p>
    </section>

    <?php
    include_once ("footer.inc");
    ?>

</body>
</html>