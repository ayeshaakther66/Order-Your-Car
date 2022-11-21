<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Motor Bike for sale or hire" />
    <meta name="keywords" content="affortable, bike, motorcycle, cheap motor bikes" />
    <meta name="author" content="Ayesha Akther" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> MOTORILA |ENQUIRY FORM </title>
    <link href="styles/style.css" rel="stylesheet" />
    <script src="scripts/part2.js"></script>
    
</head>
<body>

<?php
include_once ("header.inc");
?>
    <section class="enquiry_form">
        <h1>ENQUIRY FORM</h1>

        <form id="payform" method="post" action="payment.php"  novalidate="novalidate" >
                <p><label for="first_name">First Name</label> 
                    <input type="text" name= "first_name" id="first_name"  maxlength="25" pattern="[A-Za-z]*" required="required"/>
                </p>
                <p><label for="last_name">Last Name :</label> 
                    <input type="text" name= "last_name" id="last_name"  maxlength="25" pattern="[A-Za-z]*" required="required"/>	 
                </p>
                <p><label for="email">Email Address :</label>
                    <input type="email" id="email" name="email" size="30" required="required" />
                </p>
            <fieldset>
                <legend>Address</legend>
                <p><label for="street">Street Address</label> 
                    <input type="text" name= "street" id="street" maxlength="40"  required="required"/>
                </p>
                <p><label for="suburb">Suburb/Town</label> 
                    <input type="text" name= "suburb" id="suburb" maxlength="20"  required="required"/>
                </p>
                <p><label for="state">State</label>
                    <select name="state" id="state" required>
                        <option value="" >Please Select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </p>
                <p><label for="code">Post Code</label>
                    <input type="text" name = "post_code" id = "code" pattern= "[0-9]{4}" required="required" />
                </p>
            </fieldset>
            <p><label for="phone">Phone number:</label>
                <input type="text" id="phone" name="phone" placeholder="0123456789" pattern="[0-9]{10}"  required="required"/>
            </p>
            <fieldset>
                <p id="contact">Preferred Contact:
                    <label><input type="radio" id="email_2" name="contact" value="email" required="required">Email</label> 
                    
                    <label><input type="radio" id="post" name="contact" value="post" required="required"/>Post</label> 
                    
                    <label><input type="radio" id="phone2" name="contact" required="required" value="phone"/>Phone</label> 
                </p>
            </fieldset> 
            <p><label for="bike_enquiry">Select Bike Name:</label>
                <select name="bike_enquiry" id="bike_enquiry" required="required">
                <option value="" >Please Select</option>
                <option value="ducati_panigale_v2_s">Ducati Panigale V2 - £15,000</option>
                <option value="kawasaki_ninja_h2">Kawasaki Ninja H2 - £22,000</option>
                <option value="ducati_panigale_v4_s">Ducati Panigale V4 - £23,900 S</option>
            </select></p>
            <p><label for="quantity">Product Quantity</label>
                <input type="number" name = "product_quantity" id = "quantity" min="0" required="required" />
            </p>
            <p><label>Additional Comments<br />
                <textarea name="comment" rows="5" cols="50" ></textarea>
            </label></p>
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