<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">



  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Sign In</title>
</head>
<body>

    <?php include "header.php" ?>
      <?php include "sidebar.php" ?>

<!-- Sign In form start -->
<div class="sign_in_form">
<div align="center">
<img style="height: 200px; width: 15% auto;" src="../images/logo.png">
</div>

<form action="../login-system/login.php" method="POST" id="login">

  <div class="sign_in_input">
    <label><b>E-mail</b></label>
    <input type="email" placeholder="Enter e-mail" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <input type="checkbox" checked="checked"> Remember me
    <button  type="submit" style="width: 30%;margin-left: 35%;">Sign In</button>
    

    <span class="forgot_psw"><a href="forgot_pre.php" style="color: red;"> Forgot your password?</a></span>
  
    <h3><b> New to Ghuri?</b></h3>
    <button type="button" style="padding:5px;"><a href="signUp.php" style="color: white">Create your Ghuri Account</a></button>
  </div>

</form>


</div>
<!-- Sign In form End -->



<?php include "footer.php" ?>


</body>
</html>