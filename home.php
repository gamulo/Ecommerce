<?php
session_start();
if (isset($_SESSION['user'])){
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$firstname = $_SESSION['Firstname'];
$lastname = $_SESSION['Lastname'];
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/homee.css">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MCC - ICS FOOD COM</title>
<nav> 							<!-- NAVIGATION BAR -->
<div class = "container">
	<br>

<ul>
	<div style="margin-left: 15px; font-size: 25px;">
	<li><h1 class="text-light">Welcome,<?php echo $username ?></h1></li>
	<div class = "logout">
	<li><a href="login.php">Logout</a></li>
	</div>
	<div class = "cart">
	<li><a href="userprofile.php">Profile</a></li>
	</div>
	<div class = "cart">
	<li><a href="Products.php">Products</a></li>
	</div>
	<div class = "home">
	<li><a href="home.php" class="active">Shops</a></li>
	</div>
</ul>
</div>
</nav>
</head>
<style type="text/css">

</style>
<body>

  
<div class="main" id="sec2">
<div class="img">
<h1 class = "image">AVAILABLE SHOPS</h1>
 <?php

                // SHOP COLLECTION

                 require_once "vendor/autoload.php";

                //Connection to DB
                  $mongoClient = new MongoDB\Client();
                  $db = $mongoClient->ShopsDetails;
                  $collection = $db->Shops;

           
                $mdbc = $db->Shops->find();
                foreach($mdbc as $doc)    {
                ?>

<img src="<?php echo $doc['image_url'] ?>">

      <?php

  
      if (isset($_SESSION['user'])) {

      }
      }


      ?>

 </div>
 <div class="shop1">
 	<a href = "Products.php" class="shop">Shop Now</a>
</div>
</div>     
<?php
}
?>
<style>
	
</style>
</body>
</html>