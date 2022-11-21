<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Motor Bike for sale or hire" />
    <meta name="keywords" content="affortable, bike, motorcycle, cheap motor bikes" />
    <meta name="author" content="Ayesha Akther" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Process Order</title>
</head>
<body>
    <h1>Process Order</h1>


    <?php

session_start();
 	function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;  
    }   
    ?>
    
    <?php
    require_once('settings.php');
    $conn = @mysqli_connect($host , $user , $pwd , $sql_db);
    // checks of connection is successful
    if(!$conn)
     // displaying an error message
    echo "<p>Data connection failure</p>"; // not in production in script
    else{
        // upon succesfull connection, Get data from the form for customer details
		if(isset($_POST["firstname"])){
			$firstname = sanitise_input($_POST["firstname"]);
		}
		else{
			header("location:enquire.php"); // directly redirects to the home page just in case someone tried to access this page through url
		}
        if(isset($_POST["lastname"])){
			$lastname = sanitise_input($_POST["lastname"]);
		}
        if(isset($_POST["email"])){
			$email = sanitise_input($_POST["email"]);
		}
        if(isset($_POST["street"])){
			$street = sanitise_input($_POST["street"]);
		}
        if(isset($_POST["suburb"])){
			$suburb = sanitise_input($_POST["suburb"]);
		}
        if(isset($_POST["state"])){
			$state = sanitise_input($_POST["state"]);
		}
        if(isset($_POST["code"])){
			$code = sanitise_input($_POST["code"]);
		}
        if(isset($_POST["phoneNumber"])){
			$phone = sanitise_input($_POST["phoneNumber"]);
		}
        if(isset($_POST["contact"])){
			$contact = sanitise_input($_POST["contact"]);
		}
        if(isset($_POST["biketype"])){
			$biketype = sanitise_input($_POST["biketype"]);
		}
        if(isset($_POST["quantity"])){
			$quantity = sanitise_input($_POST["quantity"]);
		}
        if(isset($_POST["cost"])){
			$cost = sanitise_input($_POST["cost"]);
		}
         // Get form data for card details
        if(isset($_POST["credit_type"])){
			$credit_type = sanitise_input($_POST["credit_type"]);
		}
        if(isset($_POST["credit_name"])){
			$credit_name = sanitise_input($_POST["credit_name"]);
		}
        if(isset($_POST["number"])){
			$credit_number = sanitise_input($_POST["number"]);
		}
        if(isset($_POST["expiry"])){
			$expiry = sanitise_input($_POST["expiry"]);
		}
        if(isset($_POST["cvv"])){
			$cvv = sanitise_input($_POST["cvv"]);
		}
//Check the data - do more tests - not trust the user!

$sql_table="orders";
$field_defined="order_id INT AUTO_INCREMENT PRIMARY KEY, f_name VARCHAR(50), l_name VARCHAR(5040), email VARCHAR(50), street VARCHAR(50), suburb VARCHAR(50), state VARCHAR(50), code VARCHAR(11), phone VARCHAR(20), contact VARCHAR(50), bike VARCHAR(50), quantity INT(11), product_price INT(20), order_cost INT(11), order_time VARCHAR(40), credit_type VARCHAR(20), credit_name VARCHAR(50), credit_number INT(30), credit_expiry VARCHAR(50), cvv INT(20),  order_status VARCHAR(50)";
// check: if table does not exist, create it
$sqlString = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
$result = @mysqli_query($conn, $sqlString);
// checks if any tables of this name
if(mysqli_num_rows($result)==0) {
echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script
$sqlString = "create table " . $sql_table . "(" . $field_defined . ")";
$result2 = @mysqli_query($conn, $sqlString);
// checks if the table was created
if($result2===false) {
echo "<p class=\"wrong\">Unable to create Table $sql_table.". mysqli_error($conn) . ":". mysqli_error($conn) ." </p>"; 
}
}


        /* Validation of Data*/

        $errMsg="";
        //test for first name
		if($firstname==""){
			$errMsg = $errMsg . "You must enter your first name.<br>";
		}
		else if(!preg_match("/^[a-zA-Z]+$/",$firstname)){
			$errMsg = $errMsg . "Only alpha letters allowed in your first name.<br>";
		}
        else if (strlen($firstname) > 25){
            $errMsg  = $errMsg . "First name has a maximum length of 25<br>";
        }
		
		// test for last name
		if($lastname==""){
			$errMsg = $errMsg . "You must enter your last name.<br>";
		}
		else if(!preg_match("/^[a-zA-Z]+$/",$lastname)){
			$errMsg = $errMsg . "Only alpha letters allowed in your last name.<br>";
		}
        else if (strlen($lastname) > 25){
            $errMsg  = $errMsg . "Last name has a maximum length of 25<br>";
        }
        // test for email
        if ($email == ""){
            $errMsg  = $errMsg. "You must enter your Email<br>";
        }
        else if(filter_var($email, FILTER_VALIDATE_EMAIL)== false){
            $errMsg  = $errMsg. "Email format is not correct<br>";
        }
        // Street address validation
        if($street == ""){
            $errMsg  = $errMsg ."Street Address is required<br>";
        }
        else if(strlen($street) > 40){
            $errMsg  = $errMsg . "Street Address has a maximum length of 40<br>";
          }
          // Suburb address validation
        if($suburb == ""){
            $errMsg  = $errMsg ."Suburb Address is required<br>";
        }
        else if(strlen($suburb) > 20){
            $errMsg  = $errMsg . "Street Address has a maximum length of 20<br>";
          }
        
           // State address validation
           if($state == ""){
            $errMsg  = $errMsg ."State name is required<br>";
          }
          else{
        $code_check = substr($code , 0 , 1);
          switch ($state) {    // validating post code here for different states
            case "VIC":
              if (!($code_check == "3" || $code_check == "8")) {
                $errMsg =
                  $errMsg . "Your first code digit must be 3 or 8 for Victoria.<br>";
              }
              break;
            case "NSW":
              if (!($code_check == "1" || $code_check == "2")) {
                $errMsg = $errMsg . "Your first code digit must be 1 or 2 for NSW.<br>";
              }
              break;
            case "QLD":
              if (!($code_check == "4" || $code_check == "9")) {
                $errMsg = $errMsg . "Your first code digit must be 4 or 9 for QLD.<br>";
              }
              break;
            case "NT":
            case "ACT":
              if (!($code_check == "0")) {
                $errMsg = $errMsg . "Your first code digit must be 0 for NT.<br>";
              }
              break;
            case "WA":
              if (!($code_check == "6")) {
                $errMsg = $errMsg . "Your first code digit must be 6 for WA.<br>";
              }
              break;
            case "SA":
              if (!($code_check == "5")) {
                $errMsg = $errMsg . "Your first code digit must be 5 for SA.<br>";
              }
              break;
            case "TAS":
              if (!($code_check == "7")) {
                $errMsg = $errMsg . "Your first code digit must be 7 for TAS.<br>";
              }
          }
        }


        // POSTAL CODE VALIDATION
        if(strlen($code) != 4 ){
        $errMsg = $errMsg . "Postal Code must be 4 characters.<br>";
    }
    // PHONE VALIDATION
      if($phone == ""){
        $errMsg  = $errMsg ."Phone number is required<br>";
      }
      else if (strlen($phone) != 10){
        $errMsg  = $errMsg . "Phone number has a length of 10.<br>";
      }

      // Preferred Contact Validation
      if($contact == ""){
        $errMsg  = $errMsg ."Preferred Contact type is required<br>";
      }

      // Bike Selection Validation
      if ($biketype == "") {
        $errMsg = $errMsg . "Please select an option <br>";
      }

      // Quantity Validation
      if (!($quantity > 1 && $biketype != "")) {
        $errMsg = $errMsg . "Your quantity must be greater than 0<br>";
      }


    // Credit Card Type and number Validation
    $result = true;
    $credit_type = strtolower($credit_type);
    if (!($credit_type == "visa" || $credit_type == "mastercard" || $credit_type == "american express")) {
        $errMsg = $errMsg . "Your card type must a Visa card, Mastercard or an An American Express card.<br>";
        $result = false;
    }
    if (!preg_match('/[0-9]{15,16}/', $credit_number)){
        $errMsg  = $errMsg ."Your credit card number must be 15 or 16 digit long.<br>";
      }

      if ($credit_type == "visa" && !( $result == true || strlen($credit_number)  == 16 || substr($credit_number , 0 , 1) == "4")) {
        $errMsg = $errMsg . "Visa cards  have 16 digits and start with a 4.<br>";
        $result = false;
      } else if ($credit_type == "mastercard" && !( $result == true || strlen($credit_number)  == 16 || substr($credit_number , 0 , 2) >= "51" || substr($credit_number , 0 , 2) <= "55")) {
        $errMsg = $errMsg . "MasterCard have 16 digits and start with digits 51 through to 55.<br>";
        $result = false;
      } else if ( $credit_type == "american express" && !( $result == true || strlen($credit_number)  == 15 || (substr($credit_number, 0, 2) == "34" || substr($credit_number, 0 , 2) == "37"))) {
        $errMsg = $errMsg . "American Express has 15 digits and starts with 34 or 37.<br>";
        $result = false;
      }


      // Credit Card Name validation
        if ($credit_name == ""){
           $errMsg  = $errMsg . "Credit Name is required<br>";
        }
        else if(!preg_match('/[A-Za-z ]*/', $credit_name)){
           $errMsg  = $errMsg . "Credit name only contains letters!<br>";
        }
        else if (strlen($credit_name) < 0 && strlen($credit_name) > 40){
            $errMsg  = $errMsg . "Credit name has a maximum length of 40<br>";
        }

      //expiry date validation
      if($expiry == ""){
        $errMsg  = $errMsg ."Expiry Date is required<br>";
      }
      else if (!preg_match('/\d{1,2}-\d{1,2}/', $expiry)){
        $errMsg  = $errMsg ."Please enter date in the right format<br>";
      }


      // CVV Validation
      if($cvv == ""){
        $errMsg  = $errMsg ."CVV is required<br>";
      }
      else if (!preg_match('/[0-9]{3}/', $cvv)){
        $errMsg  = $errMsg ."Please enter CVV in the right format<br>";
      }


      

      // Checking error message
  
        if ($errMsg != ""){
          $_SESSION["errMsg"] = $errMsg;
          $_SESSION["firstname"] = $firstname;
          $_SESSION["lastname"] = $lastname;
          $_SESSION["email"] = $email;
          $_SESSION["street"] = $street;
          $_SESSION["suburb"] = $suburb;
          $_SESSION["state"] = $state;
          $_SESSION["code"] = $code;
          $_SESSION["phone"] = $phone;
          $_SESSION["contact"] = $contact;
          $_SESSION["biketype"] = $biketype;
          $_SESSION["quantity"] = $quantity;

          header('location:fix_order.php');
        }
        else {
          // order cost calculation
          if ($biketype == "ducati_panigale_v2_s" ) {
            $order_cost = 15000 * $quantity;
          }
          else if ($biketype == "kawasaki_ninja_h2" ) {
            $order_cost = 22000 * $quantity; 
          }
          else if ($biketype == "ducati_panigale_v4_s" ) {
            $order_cost = 23900 * $quantity; 
          }
          $order_status = "PENDING";
          if(isset($_POST['firstname'])){
            $sql_table = "orders";
            $insert = "insert into $sql_table (f_name , l_name , email , street , suburb , state , code , phone , contact , bike, quantity , order_cost  , credit_type , credit_name , credit_number , credit_expiry , cvv , order_status) values ('$firstname' , '$lastname' , '$email' , '$street' , '$suburb' , '$state' , '$code' , '$phone' , '$contact' , '$biketype' , '$quantity' , '$order_cost' , '$credit_type' , '$credit_name' , '$credit_number' , '$expiry' , '$cvv' , '$order_status')";
            //die($insert);
            $result = mysqli_query($conn, $insert);
            if ($result == true) {
              echo "Your data is sent";

              $_SESSION["firstname"] = $firstname;
              $_SESSION["lastname"] = $lastname;
              $_SESSION["email"] = $email;
              $_SESSION["street"] = $street;
              $_SESSION["suburb"] = $suburb;
              $_SESSION["state"] = $state;
              $_SESSION["code"] = $code;
              $_SESSION["phone"] = $phone;
              $_SESSION["contact"] = $contact;
              $_SESSION["biketype"] = $biketype;
              $_SESSION["quantity"] = $quantity;
              $_SESSION["credit_type"] = $credit_type;
              $_SESSION["credit_name"] = $credit_name;
              $_SESSION["credit_number"] = $credit_number;
              $_SESSION["expiry"] = $expiry;
              $_SESSION["cvv"] = $cvv; 
              $_SESSION["order_status"] = $order_status;
              $_SESSION["order_time"] = $order_time; 
              $_SESSION["order_cost"] = $order_cost; 

              header('location: receipt.php');
          } else {
              echo "Send error";
          }
        }
        

      


        }
        
      
      mysqli_close($conn);
    }
?>
</body>
</html>