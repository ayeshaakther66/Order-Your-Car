<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Motor Bike for sale or hire" />
    <meta name="keywords" content="affortable, bike, motorcycle, cheap motor bikes" />
    <meta name="author" content="Ayesha Akther" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> MOTORILA | Receipt </title>
    <link href="styles/style.css" rel="stylesheet" />


</head>

<body>
<header>
<a href="index.php">  <img src="images/logo.jpg" width="100" height="100" alt="logo" class="logo" /></a>
</header>

    <section class="section1">
        <h1>Receipt</h1>
        <?php
        session_start();
        if ( $_SESSION["firstname"] !="") {
            echo "<h1>Customer Details</h1>";
            echo "<p> First Name:".$_SESSION["firstname"]."</p>" ;}
        else{
            header("location:enquire.php");
        }
        require_once('settings.php');
        $conn = @mysqli_connect($host , $user , $pwd , $sql_db);
        // checks of connection is successful
        if(!$conn)
        // displaying an error message
        echo "<p>Data connection failure</p>"; // not in production in script
        else{
            $sql_table="orders";
            $insert= "SELECT order_id, order_time FROM $sql_table ORDER BY order_id DESC";
            $result = mysqli_query($conn, $insert);
            $id = mysqli_fetch_assoc($result);
        }

        
        
        ?>  
        
        <p> Last Name: <?php echo $_SESSION["lastname"]?></p>
        <p> Email: <?php echo $_SESSION["email"]?></p>
        <p> Street: <?php echo $_SESSION["street"]?> </p>
        <p> Suburb: <?php echo $_SESSION["suburb"]?></p>
        <p> State: <?php echo $_SESSION["state"]?></p>
        <p> Postcode: <?php echo $_SESSION["code"]?></p>
        <p> Phone Number: <?php echo $_SESSION["phone"]?> </p>
        <p> Contact Preference: <?php echo $_SESSION["contact"]?></p>
        <p> Bike: <?php echo $_SESSION["biketype"]?></p>
        <p> Quantity: <?php echo $_SESSION["quantity"]?></p>
        
        <br>
        <br>
        <h1> Credit Card Details</h1>
        <p> Credit Type: <?php echo $_SESSION["credit_type"]?> </p>
        <p> Credit Name: <?php echo $_SESSION["credit_name"]?></p>
        <p> Credit Number: <?php echo $_SESSION["credit_number"]?></p>
        <p> Credit Expiry Date: <?php echo $_SESSION["expiry"]?></p>
        <p> CVV: <?php echo $_SESSION["cvv"]?></p>
        <br>
        <br>

        <p> Order ID: <?php echo $id["order_id"]?></p>
        <p> Order Status:<?php echo $_SESSION["order_status"]?></p>
        <p> Order Cost: £<?php echo $_SESSION["order_cost"]?></p>
        <p> Order Time: <?php echo $id["order_time"]?></p>


        
    </section>
    <?php
    include_once ("footer.inc");
    ?>

</body>
</html>