
<?php

session_start();

require 'db.php';

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email = '$email'");

if( $result->num_rows == 0){
	$_SESSION['message'] = "User with that email doesn't exist!";
	    header("location: error.php");
}
else{
	$user = $result->fetch_assoc();

		$email = $user['email'];
        $hash = $user['hash'];
        $user_name = $user['name'];

        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ( emarketplace.com )';
        $message_body = '
        Hello '.$user_name.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/E-Market-Place/source/reset_pre.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: success.php");

}

?>