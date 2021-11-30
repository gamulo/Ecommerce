<?php
session_start();
if (isset($_SESSION['user'])){
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$firstname = $_SESSION['Firstname'];
$lastname = $_SESSION['Lastname'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<script src="js/js.js"></script>
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
	<li><a href="Products.php" class="active">Products</a></li>
	</div>
	<div class = "home">
	<li><a href="home.php">Shops</a></li>
	</div>
</ul>
</div>
</nav>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- SEARCH PRODUCT or SHOP -->
	<div class="main" id="sec2">
	<div class="img">
	<h1 class = "image" style="text-align: center; font-size: 60px;">Menu</h1>
	 <form action="search.php" method = "GET">
	 <div class="search">
    <input type="text" name="search_field" placeholder= "Search Product" style="font-size: 20px;">
    <input type="submit" value="Search" class="searchbtn">
    </div>
    </form>
<br>
<br>

    <?php

                // PRODUCT COLLECTION

                 require_once "vendor/autoload.php";

                //Connection to DB
            $mongoClient = new MongoDB\Client();
    				$db = $mongoClient->ShopsDetails;
    				$collection = $db->Products;


                $mdbc = $db->Products->find();?>

          <?php
  

          //LOOP FOR UPLOAD PRODUCTS
          foreach($mdbc as $doc)        {
          ?>
          
<div class="cards"><br>
  <div class="card">
  	<br>
    <img class="card__image" src="<?php echo $doc['prodimage'] ?>">
    <div class="card__content">
      <h1><?php echo $doc['Shop'] ?></h1><br><br><br>
 <h2><?php echo $doc['ProductName'] ?></h2><br><br>
        <h3 class="price" style="color:gray;">Php<?php echo $doc['Price'] ?></h3> 
    </div>
    <div class="card__info">
      <div style="display: flex;">
      	<?php
      	 echo '<button onclick=\'addToBasket("' . $doc["_id"] . '", "' . $doc["ProductName"] . '")\'>';
       	 echo 'Add To Cart</button></br>';
     	 echo '</br></br>';
      	?>
      </div>
    </div>
  </div>
</div> 
 
  
      <?php

      }


      ?>
 <!-- Basket Form -->
 <div class="wrapper">
        <div class="chat-box">
            <div class="chat-head">
            <button class="toggle"><h2>MY CART</h2></button>
            </div>
            <div class="chat-body">
              <div class="flex">
                 <form action="checkout.php" method="post">
                 	 <div id="basketDiv" style="color: black; font-size: 20px;">
                        <input type="hidden" name="prodIDs">
                        <input type="submit" value="Checkout" class="checkout">
                      </form>
                      <br>
                      <button onclick="emptyBasket()">Empty</button>
                      </div>        
                    </div>
                  <div>  
            </div>
        </div>
  <script>
    $(document).ready(function(){
      $(".toggle").click(function(){
        $(".chat-body").slideToggle();
      });
    });
  </script>
  
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Josefin Sans', sans-serif;
}
.search {
	padding-left: 65%;
}
.active {     
  color: orange;
}
input[type=text] {
  width: 70%;
  padding: 12px 20px;
  border: 5px solid orange;
  border-radius: 5px;
  box-sizing: border-box;
}
.toggle{
  background:#2c3e50;
  position: absolute;
}
.searchbtn {
   border-radius: 5px;
  max-width: 100px;
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
.empty {
  border-radius: 5px;
  max-width: 100px;
  height: 50px;
  background:#2c3e50;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.5s;
  width: 80%;
  padding: 10px;
  border: none;
  outline: none;
  box-shadow: none;
  margin: 8px 0;
  color: white;
  transform: translate(10px, 135px);
}
.check {
  position:static;
  border-radius: 5px;
  max-width: 100px;
  height: 50px;
  background:#2c3e50;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.5s;
  width: 80%;
  padding: 10px;
  border: none;
  outline: none;
  box-shadow: none;
  margin: 8px 0;
  color: white;
  transform: translate(190px, 200px);

}
/* ------------------------- NAVBAR ----------------*/
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
  padding-right: 30px;
}

.logout, .cart, .home {
  float: right;
  font-size: 23px;
  width: 100; 
  margin-top: -30px;
  text-align: center;
  padding:5px 15px;
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

/* ------------------------- NAVBAR END ------------*/

.cards {
    margin: 20px;
    max-width: 1000px;
    display:inline-block;
    grid-template-columns: repeat(auto-fill, minmax(225px, 1fr));
    grid-auto-rows: auto;
    gap: 20px;
    font-family: sans-serif;
}

.cards * {
    box-sizing: border-box;

}

.card__image {
    width: 350px;
    height: 300px;
    object-fit: cover;
    display: block;
    border-top: 2px solid #333333;
    border-right: 2px solid #333333;
    border-left: 2px solid #333333;
}

.card__content {
    line-height: 10px;
    font-size: 1em;
    padding: 15px;
    background: #fafafa;
    border-right: 2px solid #333333;
    border-left: 2px solid #333333;
}

.card__content > p:first-of-type {
    margin-top: 0;
}

.card__content > p:last-of-type {
    margin-bottom: 0;
}

.card__info {
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #555555;
    background: #eeeeee;
    font-size: 0.8em;
    border-bottom: 2px solid #333333;
    border-right: 2px solid #333333;
    border-left: 2px solid #333333;
}

.card__info i {
    font-size: 0.9em;
    margin-right: 8px;
}

.card__link {
    color: #64968c;
    text-decoration: none;
}

.card__link:hover {
    text-decoration: underline;
}
/* ------------------------- MY CART -------------------*/
.chat-box{
    position: fixed;
    right: 20px;
    bottom: 0px;
    background:#FFC300 ;
    width: 300px;
    /* height: 250px; */
    border-radius: 5px 5px 0px 0px;
}
.chat-head{
    width: inherit;
    height: 45px;
    background: #2c3e50;
    border-radius: 5px 5px 0px 0px;
}
.chat-head h2{
    color: white;
    padding: 8px;
    display: inline-block;
}
.chat-head img{
    cursor: pointer;
    float: right;
    width: 25px;
    margin: 10px;
}
.chat-body{
    height: 355px;
    width: inherit;
    overflow: auto;
    margin-bottom: 45px;
}
.flex{
  justify-content:center;
}
.chat-text{
    position: fixed;
    bottom: 0px;
    height: 45px;
    width: inherit;
}
.chat-text textarea{
    width: inherit;
    height: inherit; 
    box-sizing: border-box;
    border: 1px solid #bdc3c7;
    padding: 10px;
    resize: none;
}

.msg-send, .msg-receive{
    width: 200px;
    height: 35px;
    padding: 5px 5px 5px 10px;
    margin: 10px auto;
    border-radius: 3px;
    line-height: 30px;
    position: relative;
    color: white;
}


.msg-receive:hover, .msg-send:hover{
    opacity: .9;
}

</style>
</body>
</html>
<?php
}

?>