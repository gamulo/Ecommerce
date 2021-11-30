<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
        <link rel="stylesheet" href="css/login_reggg.css">
</head>
<body>
<div class="main-container">
 
    <div class="container">
        <!-- REGISTER -->
      <div class="user signupBx">
        <div class="formBx">
         <form action="reg_con.php" method="GET">
            <h2>Please Sign Up</h2>
             <input type="text" name="username" placeholder="Username" required="" >
            <input type="text" name="email" placeholder="Email" required="">
            <input type="text" name="firstname" placeholder="First Name" required="">
            <input type="text" name="lastname" placeholder="Last Name" required="">
            <input type="text" name="address" placeholder="Address" required="">
            <input type="password" name="password" id="pass" placeholder="Create Password" required>
            <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" onblur="chk()" required>
            <div id="error"></div>

             <button type="submit" class="btn btn-default" name="reg">Sign Up</button>

            <p class="signup">
              Already have an account ?
              <a href="login.php">Sign in.</a>
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
