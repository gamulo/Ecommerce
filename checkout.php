<?php
Session_start();
if(isset($_SESSION['user'])){

    $user_firstname = $_SESSION{'Firstname'};
    $user_lastname = $_SESSION['Lastname'];
    $user_address = $_SESSION['Address'];
    $username = $_SESSION['username'];
};
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="js/js.js"></script>
    <title>Checkout</title>
</head>
<nav>                           <!-- NAVIGATION BAR -->
<div class = "container">
    <br>

<ul>
   <div style="margin-left: 15px; font-size: 25px;">
  <li><h1 class="text-light" style="color: white;">Welcome,<?php echo $username ?></h1></li>
    <div class = "logout">
    <li><a href="login.php">Logout</a></li>
    </div>
    <div class = "cart">
  <li><a href="userprofile.php">Profile</a></li>
  </div>
    <div class = "cart">
    <li><a href="Products.php" class="">Products</a></li>
    </div>
    <div class = "home">
    <li><a href="home.php">Shops</a></li>
    </div>
</ul>
</div>
</nav>
<body>
<br>
<br>
<br>
<br>
  <div id="invoice-POS" >
<br>
<br>
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
<h2 style="border-bottom: 3px solid black; font-size: 30px; margin-left: 80px;">MCC - ICS FOOD COMP</h2>
      </div>
    </center>           
    <div id="bot">

                    <div id="table">
                        <table>
                         
                            <tr class="tabletitle" style="font-size: 25px;">
                                <td class="item"  style="padding-left: 30px;"><h2>Item</h2></td>
                                <td class="Hours" style="padding-left: 40px;"><h2>Qty</h2></td>
                                <td class="Rate" style="padding-left: 50px;"><h2>Price</h2></td>
                                <td class="Rate" style="padding-left: 60px;"><h2>Sub Total</h2></td>
                            </tr>

 <?php
                    require_once "vendor/autoload.php";
                   
                    $prodIDs = $_POST['prodIDs'];

                    $products_split = explode(",", $prodIDs);
                    $actual_products = array_count_values($products_split);

                    if($prodIDs != null){
                    $prod_cost_summary_array = array();

                    foreach ($actual_products as $key => $value){

                    //Connection to DB
                     $mongoClient = new MongoDB\Client();
                    $db = $mongoClient->ShopsDetails;
                    $collection = $db->Products;

                    $query = array('ProductName' => $key);
                    $mdbc = $db->Products->findOne($query);


                    ?>
                            <tr class="service" style="font-size: 20px;">
                                <td class="tableitem"style="padding-left: 30px;"><?php echo $key; ?></td>
                                <td class="tableitem" style="padding-left: 50px;"><?php echo $value ?></td>
                                <td class="tableitem" style="padding-left: 60px;">Php<?php echo $mdbc['Price'] ?></td>
                                <td class="tableitem" style="padding-left: 70px;">Php<?php $cost_per_item = $mdbc['Price'] * $value;
                                        echo $cost_per_item;
                                        array_push($prod_cost_summary_array, $cost_per_item);
                                        ?></td>
                            </tr>


                        
                  <?php
                     
                        };


                        };

                ?>

                        </table>
                     
                 <?php
          
                          //DISPLAY THE TOTAL     
                         $total_bill = array_sum($prod_cost_summary_array);
                     echo "<h1 style='margin-top:10px; padding-left:15px; font-size:30px;'>Total: Php " . $total_bill;
  

                 if (isset($_SESSION['user'])) {

                ?>
                <br>
                <br>
                <div id="mid" style="">
                <div class="info" style="margin-left: 15px; margin-top: 0;">
      
                <h1>Delivery Information</h1>
                <?php
                echo "<p style='font-size:20px; color:gray;'>First Name: " . $user_firstname . "</br>";
                echo "Last Name: " . $user_lastname . "</br>";
                echo "Address: " . $user_address . "</br></p>";


                //create db data
                $user_order_info = [
                    "Firstname" => $user_firstname,
                    'Lastname' => $user_lastname,
                    "Address" => $user_address,
                   "Order Details" => $actual_products
                ];
            

                ?>   

              <br>
              <br>     
     </div>
     </div>   
     <br>
     <br>  
                    
                 <form action="submit_order.php" method="POST">
                    <input type="hidden" name="order_details" value ='<?php echo (json_encode($user_order_info));?>'>
                    <input type="submit" value="Confirm Order" class="order">
                </form>
                    </div>

      </div>
    </div>
                   

                </div>
  </div>
  <?php
   }
  ?>


<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Josefin Sans', sans-serif;
}
    #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.7);
  padding:2mm;
  margin: 0 auto;
  width: 50%;
  height: 120%;
  background: #FFF;
}
/* ------------------------- NAVBAR START ------------*/
.container{
  background-color: #444;
  color: #fff;
  opacity: 0.9;
  padding: 0.4px;
 
}

nav { 
  position: sticky;  
  top: 0;
  height: 5px;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 20;
}

ul{
  background-color:none;
  list-style-type: none;
  height:50px;
  padding-right: 20px;
}

.logout, .cart, .home {
  float: right;
  font-size: 23px;
  width: 100; 
  margin-top: -30px;
  text-align: center;
  padding:5px 8px;
}

a {
  text-decoration: none;
  color: White;
}

a:hover {
  color: orange;
}


.gallery{
  padding-right: 30px;
}
.order {
   border-radius: 5px;
  max-width: 130px;
  background:#FFC300 ;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.5s;
  width: 100%;
  padding: 10px;
  border: none;
  outline: none;
  box-shadow: none;
  margin: 8px 0;
}
/* ------------------------- NAVBAR END ------------*/
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  float: left;
    height: 60px;
    width: 60px;

    background-size: 60px 60px;
}
.clientlogo{
  float: left;
    height: 60px;
    width: 60px;

    background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE;
}
.tabletitle{
  padding: 5px;
  font-size: .5em;
  background: gray;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}

</style>
    
</body>
</html>
