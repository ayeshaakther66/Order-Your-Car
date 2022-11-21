<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Motor Bike for sale or hire" />
    <meta name="keywords" content="affortable, bike, motorcycle, cheap motor bikes" />
    <meta name="author" content="Ayesha Akther" />
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> MOTORILA | MANAGER </title>
    <link href="styles/style2.css" rel="stylesheet"/>
</head>

<body>
<?php
include_once ("header.inc");
require_once('settings.php');
$conn = @mysqli_connect($host , $user , $pwd , $sql_db);
if (isset($_POST["update_status"]) && isset($_POST["order_id"])){
		$order_status = $_POST["update_status"];
		$order_id = $_POST['order_id'];
		$update = "UPDATE orders SET order_status = '$order_status' where order_id = $order_id ";
		if (mysqli_query($conn, $update)) {
						echo "Record updated successfully";
		  } else {
						echo "Error updating record: " . mysqli_error($conn);
		  }
    
}


?> 
    <section class="section1">
        <h1>MANAGER</h1>
        <form method="post" action="manager.php">
        <option value = "1">All orders</option>   
        <option value = "2">Orders for a customer based on their name</option>
        <option value = "3">Orders for a particular product</option>
        <option value = "4">Orders that are pending</option>
        <option value = "5">Orders sorted by total cost</option>
        <option value = "6">Orders sorted by Quantity</option>
        <option value = "7">Orders sorted by First Name</option>
        <option value = "8">Orders sorted by Time </option>
        </select>
        <button type="submit"   name = "submit">Submit</button>  
		</form>
        <br>
        <br>
        <?php
        
        $option = "select * FROM orders";
        $query = "";
        if(isset($_POST["submit"])){
            if(!empty($_POST["query"])){
                $selected = $_POST["query"];
                switch($selected){
                    case "1":
                     $option = "select * FROM orders";
                     break;
                     case "2":
                     ?>
                     <form method="post"  action= "manager.php">
                      <label for="search_name">First Name:</label>
                      <input type="text" name="search_name" id="search_name" maxlength="40" pattern="^[a-zA-Z]+$" required="required"/>
                      <br>
                      <button type="submit" value="s_name"   name="s_name" id="s_name">Search</button>
                      <br>
                     </form>
                     
                    <?php
                     break;
                     case "3":
                    ?>
                    <form method="post" action= "manager.php">
                    <label  for="product_name">Product Name:</label>
                    <input type="text" name="product_name" id="product_name" maxlength="25"  required="required"/>
                    <br>
                    <button type="submit"  value="s_product"  name = "s_product">Search</button>
                    <br>
                    </form>
                    <?php
                    break;
                    case "4":
                    $option ="SELECT * FROM orders where order_status = 'PENDING'";
                    break;
                    case "5":
                    $option =  "SELECT * FROM orders ORDER BY order_cost ASC"; // asc meaning ascending
                    break;
                    case "6":
                    $option =  "SELECT * FROM orders ORDER BY quantity DESC"; // asc meaning ascending
                    break;
                    case "7":
                    $option =  "SELECT * FROM orders ORDER BY f_name ASC "; // asc meaning ascending
                    break;
                    case "8":
                    $option =  "SELECT * FROM orders ORDER BY order_time DESC"; // asc meaning ascending
                    break;
                }
            }
        }
        $search_name = "";
        if(isset($_POST["s_name"])){
            $search_name = $_POST["search_name"];
            $option =  "select * FROM orders WHERE f_name like'%{$search_name}%'"; // Searching name
        }
        $product_name = "";
        if(isset($_POST["s_product"])){
           $product_name = $_POST["product_name"];
           $option = "SELECT * FROM orders where bike = '$product_name'";
       }
        ?>  
        <br/>
        </section>
        <section >
        
        <h1>Order Details</h1>
        <table id ="order_table">
               <thead>
                   <tr>
                       <th>ORDER ID</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Email</th>
                       <th>Street Address</th>
                       <th>Suburb</th>
                       <th>State</th>
                       <th>Postal Code</th>
                       <th>Phone Number</th>
                       <th>Contact Preference</th>
                       <th>BIKE</th>
                       <th>Quantity</th>
                       <th>Order Cost</th>
                       <th>Order Time</th>
                       <th>Order Status</th>
                       <th>Update Status</th>
                    </tr>
              </thead>
              <tbody>
              <?php
              if($option){
                $query = mysqli_query($conn, $option);
                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                    <th scope="row"><?php echo $row['order_id']; ?></th>
                    <td><?php echo $row['f_name']; ?></td>
                    <td><?php echo $row['l_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['street']; ?></td>
                    <td><?php echo $row['suburb']; ?></td>
                    <td><?php echo $row['state']; ?></td>
                    <td><?php echo $row['code']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['bike']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['order_cost']; ?></td>
                    <td><?php echo $row['order_time']; ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                    <td><form method="post" action= "manager.php">
                    <input type="hidden" name="order_status" value="<?php echo $row['order_status'] ?>" >
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>" >
                    <select name = "update_status"  >
                    <option value = "PENDING">PENDING</option>
                    <option value = "FULLFILLED">FULLFILLED</option>
                    <option value = "PAID">PAID</option>
                    <option value = "ARCHIVED">ARCHIVED</option>
                    </select>
                    <br>
                    <button type="submit" >Update</button>
                    </form></td>
                    </tr>
                    <?php
                }
            } ?>
            </tbody>
            </table>
    </section>

    <?php
    include_once ("footer.inc");
    ?>

</body>
</html>