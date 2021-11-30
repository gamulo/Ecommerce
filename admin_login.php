 <!-- PLEASE READ THE ADMIN-ACCOUNT.TXT -->
<!DOCTYPE html>
<html>
<head>
  <title>Log In</title>
        <link rel="stylesheet" href="css/login_reggg.css">
</head>
<body>
<div class="main-container">
 
    <div class="container">
        <!-- ADMIN LOGIN -->
      <div class="user signupBx">
        <div class="formBx">
         <form action="admincon.php" method="GET">
            <h2>Administrator</h2>
             <input type="text" name="log_admin_user" placeholder="Username" required="">
            <input type="password" name="log_admin_pw" placeholder="Password" required="">
            <div id="error"></div>
             <button type="submit" class="btn btn-default">Log In</button>

            <p class="signup">
              <a href="login.php">Back</a>
            </p>
          </form>
        </div>
        <div class="imgBx"><img src="images/regdeliver.jpg" /></div>
      </div>
    </div>

 </div>
  <script src="js/script.js" type="text/javascript"></script>
</body>
</html>
