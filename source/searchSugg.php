<?php
require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

$request = $mysqli->escape_string($_POST["query"]);

$raw_results = $mysqli->query("SELECT * FROM productlist WHERE (`shopName` LIKE '%".$query."%') OR (`productFor` LIKE '%".$query."%') OR (`productName` LIKE '%".$query."%') OR (`price` LIKE '%".$query."%') OR (`keyword` LIKE '%".$query."%')");


$result = $mysqli->query($raw_results);

  $data = array(); // new added

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["shopName"];
  $data[] = $row["shopName"];
  $data[] = $row["shopName"];
  $data[] = $row["shopName"];
  $data[] = $row["keyword"];
 }
 echo json_encode($data);
}

?>