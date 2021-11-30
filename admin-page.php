<?php
Session_start();
if (isset($_SESSION['admin_user'])){
$admin_username = $_SESSION['admin_user'];

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrator</title>
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/login_reggg.css">
</head>
<nav> 							<!-- NAVIGATION BAR -->
<div class = "container">
	<br>

<ul>
	<div class = "">
	<li><h1 class="text-light">Welcome,<?php echo $admin_username ?></h1></li>
	<div class = "logout">
	<li><a href="login.php">Logout</a></li>
</ul>
</div>
</nav>
<body>
	<br><br><br><br><br>
 <div style ="border: 4px groove orange; width: 50%;">
                </br>
              <center><h1>Add Shop</h1></center>
                </br>
                    <table>     
                       <!--========== FORM IN SHOPS============ -->
            <form action="admin_addshop.php" method="POST" enctype="multipart/form-data">
                            <tr>
                                <td style="background: #FFFFFF;">Name: </td><td style="background: #FFFFFF;">
            <input type="text" name="shop_name" required></td>
                            </tr>
                        <tr>
                            <td style="background: #FFFFFF;">Image: </td><td style="background: #FFFFFF;">
            <input type="file" name="fileToUpload" id="fileToUpload" required></td>
                        </tr>
                        <td style="background: #FFFFFF;">
       <input type="submit" class="add" value="Add Shop"></td>
                        </form>

                    </table>
</div>
<br>
 <div style ="border: 4px groove orange; width: 50%;">
                </br>
                <center><h1>Add Product</h1></center>
                </br>
                    <table>

                       <!--========== FORM IN ADD_PRODUCT============ -->
            <form action="admin_addproduct.php" method="POST" enctype="multipart/form-data">
             <tr>
             <td style="background: #FFFFFF;">Name of the Shop: </td><td style="background: #FFFFFF;">
			 <input type="text" name="shop_name" required></td>
             </tr>

            <tr>
            <td style="background: #FFFFFF;">Name: </td><td style="background: #FFFFFF;">
            <input type="text" name="prod_name" required></td>
            </tr>

            <tr>
            <td style="background: #FFFFFF;">Prize: </td><td style="background: #FFFFFF;">
            <input type="number" name="prod_price" required></td>
            </tr>

            <tr>
            <td style="background: #FFFFFF;">Image: </td><td style="background: #FFFFFF;">
            <input type="file" name="file" id="fileToUpload" required></td> 
           	</tr> 

            <td style="background: #FFFFFF;">
            <input type="submit" class="add" value="Add Product" name="addproduct"></td>
            </form>
            </table>

<?php
}
?>
</body>
</html>