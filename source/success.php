<?php 

require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

date_default_timezone_set("Asia/Dhaka");
    $time = date("h:i:sa");
    //$date =  date("d/m/y");
    $day =  date("d");
    $month = date("m");
    $year = date("y");

$sId = session_id();
$result = $mysqli->query("SELECT * FROM cart WHERE sId='$sId'");

while ($cartInfo = mysqli_fetch_array($result)){
$productId = $cartInfo['productId'];
/*$qty = $cartResult['customerQty'];*/

$result2 = $mysqli->query("SELECT * FROM productlist WHERE id = '$productId' ");
$productInfo = $result2->fetch_assoc();

    $newQty = $productInfo['quantity'] - $cartInfo['customerQty'];

        $upQuery = "UPDATE productlist SET quantity ='$newQty', Day='$day', Month='$month', Year='$year' WHERE id = '$productId'";
        mysqli_query($mysqli,$upQuery);

        $newQuery = "UPDATE productlist SET sellerQuantity ='$newQty' WHERE id = '$productId'";
        mysqli_query($mysqli,$newQuery);
}

    $delQuery = $mysqli->query("DELETE FROM cart WHERE sId='$sId'");
    mysqli_query($mysqli,$delQuery);

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <script type="text/javascript" src="../js/phone_validation.js"></script>



    <style>
        .form {
            background: rgba(19, 35, 47, 0.9);
            color: white;
            padding: 40px;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 4px;
            box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
        }

    </style>

</head>
<body>
    <?php include "header.php" ?>
    <?php include "sidebar.php" ?>

    <div class="form">
        <h1>Success!</h1>
        <p style="font-size: 20px;">
           Your order on Ghuri.com is complete.<br>
           Your order will be sent very soon.<br>
           For any further information, please contact out customer support.<br>
           Thanks for being with us.
        </p>
        <a href="index.php" class="btn btn-success">Home</a>
    </div>

    <footer>
        <?php include "footer.php" ?>
    </footer>
</body>
</html>