<?php
/* Database connection settings */
if(!isset($_SESSION)) session_start();

include 'db.php';
// $host = "localhost";
// $user = "root";
// $pass = "";
// $db = "e-market_place";

// $mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);

if($_POST['password'] == $_POST['rpt_password']){

// Set session variables to be used on profile.php page
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['user_name'] = $_POST['username'];


// Escape all $_POST variables to protect against SQL injections
    $account_Type = $mysqli->escape_string($_POST['account_type']);
    $user_name = $mysqli->escape_string($_POST['username']);
    $email = $mysqli->escape_string($_POST['email']);
    $Phone_Number = $mysqli->escape_string($_POST['phone']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $gender = $mysqli->escape_string($_POST['gender']);
    $hash = $mysqli->escape_string(md5(rand(0, 1000)));

// Check if user with that email already exists
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
    if ($result->num_rows > 0) {

        $_SESSION['message'] = 'User with this email already exists!';
        header("location: error.php");

    } else { // Email doesn't already exist in a database, proceed...

            // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (account_type, name, email, phone, password, gender, hash)"
    . " VALUES ('$account_Type', '$user_name', '$email', '$Phone_Number', '$password', '$gender', '$hash')";

            // Add user to the database
    if ($mysqli->query($sql) === TRUE) {

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = 1; // So we know the user has logged in
        $_SESSION['UserName'] = $user_name;
        $_SESSION['account_type'] = $account_Type;

        if($_SESSION['account_type'] == 'Business'){
            $sql2 = "INSERT INTO store (email) VALUES ('$email')";
            $mysqli->query($sql2);
        }
        $_SESSION['message'] =

            "Confirmation link has been sent to $email, please verify
            your account by clicking on the link in the message!";

                        // Send registration confirmation link (verify.php)
        $to = $email;
        $subject = 'Account Verification ( emarketplace.com )';
        $message_body = '
            Hello ' . $user_name . ',

            Thank you for signing up!

            Please click this link to activate your account:

            http://localhost/E-Market-Place/login-system/verify.php?email=' . $email . '&hash=' . $hash;

        mail($to, $subject, $message_body);

        if($_POST['account_type']== 'Business'){
            header("location: ../source/create_new_store.php");
        }
        else {
            header("location: ../source/index.php");
        }

    } else {
        $message = 'Registration failed!';
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh:0; url=../source/signUp.php");
    }

        /*    if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }*/

    $mysqli->close();

    }

}
else{
    $message = "Your entered password does not matched.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Refresh:0; url=../source/signUp.php");
}