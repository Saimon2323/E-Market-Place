<?php


   function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  // define variables and set to empty values
   $nameErr = $emailErr = "";
   $name = $email  = $message = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST"){


   {
    $name = test_input($_POST["fullname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Invalid name format. Only letters and white space allowed.\\nTry again.";
      echo "<script type='text/javascript'>alert('$nameErr');</script>";
      header("Refresh:0; url=../source/contact.php");
    }
  }

 {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
      $emailErr = "Invalid email format.\\nTry again.";
      echo "<script type='text/javascript'>alert('$emailErr');</script>";
      header("Refresh:0; url=../source/contact.php");
    }
  }


  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }


 



    if ($nameErr=="" && $emailErr=="") {
      
    $to = "saimon.ctg@gmail.com"; // this is your Email address
    $from = $_POST["email"]; // this is the sender's Email address
    $name = $_POST["fullname"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: ".$from . "\r\n" . "CC: ".$from;
    mail($to,$subject,$message,$headers);

          echo "<script type='text/javascript'>alert('Thank you $name for share your comment');</script>";
                header("Refresh:0; url=../source/index.php");
    }

  }  

?>

 

