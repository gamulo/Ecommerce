
<!DOCTYPE html>
<html>
<head>
  <title>Log In</title>
        <link rel="stylesheet" href="css/login_reggg.css">
</head>
<body>
<div class="main-container">
 
    <div class="container">
        <!-- LOG IN -->
      <div class="user signupBx">
        <div class="formBx">
         <form action="log_con.php" method="GET">
            <h2>Welcome Back!</h2>
             <input type="text" name="log_user" placeholder="Username" required="">
            <input type="password" name="log_pw" placeholder="Password" required="">
            <div id="error"></div>
             <button type="submit" class="btn btn-default" name="reg">Sign In</button>

            <p class="signup">
               Don't have an account ?
              <a href="register.php">Sign up.</a>
            </p>
            <a href="admin_login.php">Login as Admin</a>
          </form>
        </div>
        <div class="imgBx"><img src="images/regdeliver.jpg" /></div>
      </div>
    </div>

 </div>
  <script src="js/script.js" type="text/javascript"></script>
</body>
</html>
