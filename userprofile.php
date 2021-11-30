<?php
Session_start();
if (isset($_SESSION['user'])){
$username = $_SESSION['Username'];
$email = $_SESSION['email'];
$fname = $_SESSION['Firstname'];
$lname = $_SESSION['Lastname'];
$address = $_SESSION['Address'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    <li><a href="userprofile.php" class="active">Profile</a></li>
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
<h2 style="border-bottom: 3px solid black; font-size: 35px; margin-left: 200px;">Profile</h2>
      </div>
    </center>            
    <div id="bot">
<div style="font-size: 25px; margin-left: 30px; margin-top: 0;">
   <?php
                    echo "Username:  " . $username , "</br>";
                    echo "Email:  " .$email , "</br>";
                    echo "First Name:  " .$fname , "</br>";
                    echo "Last Name:  " .$lname , "</br>";
                    echo "Address:  " .$address , "</br>";
                    ?>
</div>
<br>
                <div style ="border:;">
                    </br>
                    <h1>Previous Orders</h1>
                    </br>

                    <?php

                    require_once "vendor/autoload.php";
              
                      $mongoClient = new MongoDB\Client();
                    $db = $mongoClient->Orders;
                    $collection = $db->Order_Info;

                    $query = array("Firstname" => $fname);
                    $mdbc = $db->Order_Info->find($query);
                    ?>

                            <!--=========== SHOW ORDERSSSSSS ======= -->

                    <table style="border: groove 3px orange">
                        <tr style="font-size: 20px;">

                            <td style="background: #FFFFFF;">Products</td>
                            <td style="background: #FFFFFF;">Quantities</td>
                        </tr>
                        <?php
                        foreach($mdbc as $doc)        {
                            ?>
                            <?php
                          
                            foreach ($doc{'Order_Items'} as $key => $value) { ?>
                               
                           
                            <tr>
                            <td style="background: #FFFFFF;"><?php echo $key ?> </td>
                            <td style="background: #FFFFFF;"><?php echo $value?></td>
                          </tr>
                            <?php
                          }
                        }
                        ?>
                        </tr>
                    </table>
                </div>



            </br>
                <h1>EDIT PROFILE</h1>
                </br>

                <form action= "userupdate.php" method="get">        
                    <input type="text" name="firstname" placeholder="First Name" required>
                    <br><br>
                    <input type="text" name="lastname"  placeholder="Last Name" required>
                    <br><br>
                    <input type="text" name="address"  placeholder="Address" required>
                    <br><br>
                     <input type="password" name="password"  placeholder="New Password" required>
                     <br><br>
                    <input type="submit" class="profilebtn">
                </form>
            </td>

    
     </div>
     </div>   
            
<?php } ?>

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
  height: 160%;
  background: #FFF;
}
.active {     
  color: orange;
}

input[type=text],input[type=password]  {
  width: 70%;
  padding: 12px 20px;
  border: 5px solid orange;
  border-radius: 5px;
  box-sizing: border-box;
  font-size: 20px;
}
.profilebtn {
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
