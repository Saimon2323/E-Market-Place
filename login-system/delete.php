<?php

session_start();
require "db.php";

$email = $_SESSION['email'];

$sql= "DELETE FROM users WHERE email='$email' ";

$sql2= "DELETE FROM store WHERE email='$email' ";

if ($mysqli->query($sql) === TRUE){

	$mysqli->query($sql2);
	
	session_unset();


	$_SESSION['message'] =
                
                 "Your account deleted. Thank You !!!";


                  header("location: success.php");

}
else{
	 $_SESSION['message'] = 'Your account can not delete.';
        header("location: error.php");
   
}



?>