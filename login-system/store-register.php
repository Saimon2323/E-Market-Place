<?php
if(!isset($_SESSION)) session_start();

require "../login-system/db.php";

$store_id = rand();
$email =  $_SESSION['email'];

$_SESSION['store_name'] = $_POST['store_name'];

$store_name = $mysqli->escape_string($_POST['store_name']);

$result = $mysqli->query("SELECT * FROM store WHERE email='$email'") or die($mysqli->error());

if($result->num_rows > 0){
    do{
        $store_id = rand();
    }while ($result->num_rows <= 0);
        				
    $sql = "UPDATE store SET store='1', store_name = '$store_name', store_id = '$store_id' WHERE email='$email'";

}else{
    $sql = "INSERT INTO store ('email','store','store_name','store_id') VALUES ('$email','1','$store_name','$store_id')";
}

if ($mysqli->query($sql) === TRUE){

    $_SESSION['store_name'] = $store_name;
    $_SESSION['store_id'] = $store_id;
    $_SESSION['store'] = 1;


    $message = "Your store created successfully.\\nThank you.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Refresh:0; url=../source/new_store_description.php");
}
