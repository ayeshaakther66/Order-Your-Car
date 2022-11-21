<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Motor Bike for sale or hire" />
    <meta name="keywords" content="affortable, bike, motorcycle, cheap motor bikes" />
    <meta name="author" content="Ayesha Akther" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> MOTORILA |FIX ORDER </title>
    <link href="styles/style.css" rel="stylesheet" />
    
</head>
<body>

<?php
include_once ("header.inc");
?>
    <section class="enquiry_form">
        <h1>FIX ORDER FORM</h1>
        <?php
        session_start();
        if ( $_SESSION["errMsg"] !="") {
            echo "<p>".$_SESSION["errMsg"]."</p>";}
        else{
            header("location:enquire.php");
        }
        ?>  
        <form id="payform" method="post" action="process_order.php"  novalidate="novalidate" >
                <p><label for="first_name">First Name</label>
                    <input type="text" name= "firstname" id="first_name" value="<?php echo $_SESSION["firstname"]?>" maxlength="25"   pattern="[A-Za-z]*" required="required"/>
                </p>
                <p><label for="last_name">Last Name :</label> 
                    <input type="text" name= "lastname" id="last_name" value="<?php echo $_SESSION["lastname"]?>" maxlength="25" pattern="[A-Za-z]*" required="required"/>	 
                </p>
                <p><label for="email">Email Address :</label>
                    <input type="email" id="email" name="email" value="<?php echo $_SESSION["email"]?>" size="30" required="required" />
                </p>
            <fieldset>
                <legend>Address</legend>
                <p><label for="street">Street Address</label> 
                    <input type="text" name= "street" id="street" value="<?php echo $_SESSION["street"]?>" maxlength="40"  required="required"/>
                </p>
                <p><label for="suburb">Suburb/Town</label> 
                    <input type="text" name= "suburb" id="suburb" value="<?php echo $_SESSION["suburb"]?>" maxlength="20"  required="required"/>
                </p>
                <p><label for="state">State</label>
                    <select name="state" id="state" required>
                        <option value="" >Please Select</option>
                        <option value="VIC" <?php if ($_SESSION["state"] == "VIC"){echo 'selected';}?>>VIC</option>
                        <option value="NSW" <?php if ($_SESSION["state"] == "NSW"){echo 'selected';}?>>NSW</option>
                        <option value="QLD" <?php if ($_SESSION["state"] == "QLD"){echo 'selected';}?>>QLD</option>
                        <option value="NT"  <?php if ($_SESSION["state"] == "NT"){echo 'selected';}?>>NT</option>
                        <option value="WA" <?php if ($_SESSION["state"] == "WA"){echo 'selected';}?>>WA</option>
                        <option value="SA" <?php if ($_SESSION["state"] == "SA"){echo 'selected';}?>>SA</option>
                        <option value="TAS" <?php if ($_SESSION["state"] == "TAS"){echo 'selected';}?>>TAS</option>
                        <option value="ACT" <?php if ($_SESSION["state"] == "ACT"){echo 'selected';}?>>ACT</option>
                    </select>
                </p>
                <p><label for="code">Post Code</label>
                    <input type="text" name = "code" value="<?php echo $_SESSION["code"]?>" id = "code" pattern= "[0-9]{4}" required="required" />
                </p>
            </fieldset>
            <p><label for="phone">Phone number:</label>
                <input type="text" id="phone" name="phoneNumber" value="<?php echo $_SESSION["phone"]?>" placeholder="0123456789" pattern="[0-9]{10}"  required="required"/>
            </p>
            <fieldset>
                <p id="contact" name="contact" >Preferred Contact:
                    <label><input type="radio" id="email_2"  name="contact" value="email" required="required" <?php if ($_SESSION["contact"] == "email"){echo 'checked';}?> >Email</label> 
                    
                    <label><input type="radio" id="post" name="contact" value="post" <?php if ($_SESSION["contact"] == "post"){echo 'checked';}?> required="required"/>Post</label> 
                    
                    <label><input type="radio" id="phone2" name="contact" <?php if ($_SESSION["contact"] == "phone"){echo 'checked';}?> required="required" value="phone"/>Phone</label> 
                </p>
            </fieldset> 
            <p><label for="bike_enquiry">Select Bike Name:</label>
                <select name="biketype" id="bike_enquiry" required="required">
                <option value="" >Please Select</option>
                <option value="ducati_panigale_v2_s" <?php if ($_SESSION["biketype"] == "ducati_panigale_v2_s"){echo 'selected';}?>>Ducati Panigale V2 - £15,000</option>
                <option value="kawasaki_ninja_h2" <?php if ($_SESSION["biketype"] == "kawasaki_ninja_h2"){echo 'selected';}?>>Kawasaki Ninja H2 - £22,000</option>
                <option value="ducati_panigale_v4_s"  <?php if ($_SESSION["biketype"] == "ducati_panigale_v4_s"){echo 'selected';}?>>Ducati Panigale V4 - £23,900 S</option>
            </select></p>
            <p><label for="quantity">Product Quantity</label>
                <input type="number" name = "quantity" value="<?php echo $_SESSION["quantity"]?>" id = "quantity" min="0" required="required" />
            </p>
            <fieldset>
                <legend>Credit Card Details</legend>
                <p><label for="credit_type">Credit Card Type</label>
                    <select name="credit_type"  id="credit_type" required>
                        <option value="" >Please Select</option>
                        <option value="visa">Visa</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="american">American Express</option>
                    </select>
                </p>
                <p><label for="credit_name">Name on Credit Card</label> 
                    <input type="text" name= "credit_name"  id="credit_name"  maxlength="40" pattern="[A-Za-z ]*" required="required"/>
                </p>
                <p><label for="number">Credit card Number:</label>
                    <input type="text" id="number"  name="number" pattern="[0-9]{15,16}"  required="required"/>
                </p>
                <p><label for="expiry">Credit Card Expiry:</label>
                    <input type="text" id="expiry" name="expiry"  placeholder="mm-yy" pattern="\d{1,2}-\d{1,2}" required="required"/>
                </p>
                <p><label for="cvv">Card Verification Value:</label>
                    <input type="text" id="cvv" name="cvv"  pattern="[0-9]{3}"  required="required"/>
                </p>
            </fieldset>
            <p><input type="submit" value="PAY NOW"/> <br>
                <input type="reset" value="RESET" />
            </p>
                
        </form>
    </section>
    <?php
    include_once ("footer.inc");
    ?>
</body>
</html>