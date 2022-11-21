<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Motor Bike for sale or hire" />
    <meta name="keywords" content="affortable, bike, motorcycle, cheap motor bikes" />
    <meta name="author" content="Ayesha Akther" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> MOTORILA | PAYMENT </title>
    <link href="styles/style.css" rel="stylesheet" />
    <script src="scripts/payment.js"></script>
    <script src="scripts/enhancements.js"></script>


</head>

<body>

    <section class="booking_form">
        <h1>BOOKING FORM</h1>
        <form id="bookform" method="post" action="process_order.php"  novalidate="novalidate">
            <fieldset>
                <legend>Your Booking</legend>
                <p>Your Name: <span id="confirm_name"></span></p>
                <p>Your Email: <span id="confirm_email"></span></p>
                <p>Street: <span id="confirm_street"></span></p>
                <p>Suburb: <span id="confirm_suburb"></span></p>
                <p>State: <span id="confirm_state"></span></p>
                <p>Postcode: <span  id="confirm_code"></span></p>
                <p>Phone Number: <span  id="confirm_phone"></span></p>
                <p>Contact Preference: <span  id="confirm_contact"></span></p>
                <p>Bike: <span  id="bike_enquiry"></span></p>
                <p>Quantity: <span  id="confirm_quantity"></span></p>
                <p>Total Cost: £<span  id="confirm_cost"></span></p>
    
                <input type="hidden" name="firstname" id="firstname" />
                <input type="hidden" name="lastname" id="lastname" />
                <input type="hidden" name="email" id="email" />
                <input type="hidden" name="street" id="street" />
                <input type="hidden" name="suburb" id="suburb" />
                <input type="hidden" name="state" id="state" />
                <input type="hidden" name="code" id="code" />
                <input type="hidden" name="phoneNumber" id="phone" />
                <input type="hidden" name="contact" id="contact" />
                <input type="hidden" name="biketype" id="biketype" />
                <input type="hidden" name="quantity" id="quantity" />
                <input type="hidden" name="cost" id="cost" />
            </fieldset>

            <fieldset>
                <legend>Credit Card Details</legend>
                <p><label for="credit_type">Credit Card Type</label>
                    <select name="credit_type" id="credit_type" required>
                        <option value="" >Please Select</option>
                        <option value="visa">Visa</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="american">American Express</option>
                    </select>
                </p>
                <p><label for="credit_name">Name on Credit Card</label> 
                    <input type="text" name= "credit_name" id="credit_name"  maxlength="40" pattern="[A-Za-z ]*" required="required"/>
                </p>
                <p><label for="number">Credit card Number:</label>
                    <input type="text" id="number" name="number" pattern="[0-9]{15,16}"  required="required"/>
                </p>
                <p><label for="expiry">Credit Card Expiry:</label>
                    <input type="text" id="expiry" name="expiry" placeholder="mm-yy" pattern="\d{1,2}-\d{1,2}" required="required"/>
                </p>
                <p><label for="cvv">Card Verification Value:</label>
                    <input type="text" id="cvv" name="cvv" pattern="[0-9]{3}"  required="required"/>
                </p>
                <p>
                    Redirecting to Home page after <span id="countdown">1000</span> seconds.
                </p>
                <p><input type="submit" value="CHECK OUT"/> <br>
                    <button type="button" id="cancel">Cancel</button>
                </p>
            </fieldset>
        </form>
    </section>
    <?php
    include_once ("footer.inc");
    ?>

</body>
</html>