<?php
/* Displays user information and some useful messages */

require '../login-system/db.php';

session_start();


	if(!isset($_SESSION['logged_in'])){
		$_SESSION['message'] = "You have to login first.";
			    header("location: error.php");

	}

	else{

	$email = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    	$user = $result->fetch_assoc();

    if( $user['active'] == 0){
    	$message = "You have to activate your account first.";
		  echo "<script type='text/javascript'>alert('$message');</script>";
		  header("Refresh:0; url=profile.php");
    }

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Complete Profile | Buyer</title>
</head>
<body>
	
	<?php include "header.php" ?>
		<?php include "sidebar.php" ?>

	<!-- complete profile start -->
	<h3 align="center" style="margin-top: 4%">Complete your profile</h3>
	<form method="" action="profile.php">
		<div class="complete_profile_buyer_form">
		<label>First name</label><br>
		<input type="text" name="fName" placeholder="first name" required><br>
		
		<label>Last name</label><br>
		<input type="text" name="lName" placeholder="last name" required><br>
		
		<label>Address</label><br>
		<input type="text" name="address" placeholder="address" required><br>
		<label>Postal code</label><br>
		<input type="number" name="Pcode" placeholder="postal code" required>
		</div>
		<div>
			<button class="complete_profile_buyer_button" type="submit" name="cpbbtn" style="width: 10%">Submit</button>
		</div>
	</form>
	


	<!-- complete profile end -->


<?php include "footer.php" ?>



</body>
</html>