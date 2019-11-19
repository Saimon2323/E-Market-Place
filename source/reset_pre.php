
<?php 
session_start();
require '../login-system/db.php';



if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
</head>
<body>
	
<?php include "header.php" ?>
	
	<div align="center">
		
		<h1>Choose Your New Password</h1><br>
		<form action="../login-system/reset.php" method="POST">
			<label style="font-size: 30px;">New Password</label><br>
			<input style="width: 25%;height: 35px;border-radius: 10px;border: 1px solid grey" type="Password" required name="newpassword"><br>
			
			<label style="font-size: 30px;">Confirm New Password</label><br>
			<input style="width: 25%;height: 35px;border-radius: 10px;border: 1px solid grey" type="Password" name="confirmpassword"><br>

	    	<input type="hidden" name="email" value="<?= $email ?>">    
            <input type="hidden" name="hash" value="<?= $hash ?>">    
          

            <button class="btn btn-default" style="padding: 20px;margin: 15px;width: 10%;font-size: 25px" type="submit" style="width: 30%;">Apply</button>
    

		</form>
		
	</div>

<?php include "footer.php" ?>


</body>
</html>