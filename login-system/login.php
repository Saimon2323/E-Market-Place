<?php

session_start();

require 'db.php';

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email = '$email'");

if( $result->num_rows == 0){
	$_SESSION['message'] = "User with that email doesn't exist!";
	    header("location: error.php");

	  /*  $message = "User with that email doesn't exist!\\nFirst register.";
		  echo "<script type='text/javascript'>alert('$message');</script>";
		  header("Refresh:0; url=../source/signIn.php");*/
}
else{
	$user = $result->fetch_assoc();

	if( password_verify($_POST['password'], $user['password'])){
		$_SESSION['email'] = $user['email'];
		$_SESSION['UserName'] = $user['name'];
		$_SESSION['active'] = $user['active'];
		$_SESSION['account_type'] = $user['account_type'];
		$_SESSION['logged_in'] = 1;


		header("location: ../source/index.php");
	}
	else{
	/*$_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");	
*/

		   $message = "You have entered wrong password.\\nTry again.";
		  echo "<script type='text/javascript'>alert('$message');</script>";
		  header("Refresh:0; url=../source/signIn.php");
	}

}

?>