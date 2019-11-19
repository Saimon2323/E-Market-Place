<?php


require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

if(isset($_GET['pId'])){
    $pId = $_GET['pId'];
    $singleResult = $mysqli->query("SELECT * FROM productlist WHERE id='$pId'");
    $row = $singleResult->fetch_assoc();
}

if(isset($_POST['submit'])){
    $size = $_POST['productSize'];
    $pQuantity = $_POST['pQuantity'];
    $sId = session_id();
    $productId = $pId;
    $pName = $row['productName'];
    $pPic = $row['productPic'];
    $pPrice = $row['price'];

    $checkQuery = $mysqli->query("SELECT * FROM cart WHERE sId='$sId' AND productId='$productId' ");
    $checkResult = $checkQuery->fetch_assoc();

    if($checkResult){
        $msg = "Product already added!! Go to cart please.";
    }
    else {

        $query = " INSERT INTO `cart` (`sId`, `productId`,`proName`,`proPic`,`price`, `size`, `customerQty`) VALUES ('$sId', '$productId','$pName','$pPic','$pPrice', '$size', '$pQuantity');  ";
        mysqli_query($mysqli, $query);
        $_SESSION['ref'] =1;
        header('location: check_out_item.php');
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">


	<title>Product</title>

</head>
<body>

<?php include "header.php" ?>
<?php include "header2.php" ?>
<?php include "sidebar.php" ?>

<div class="row" style="margin: 5%">
    <div class="col-md-4">
<!--	<img style="width: 100%;height: 400px;" id="store_banner_upload"   src="../images/store_banner.png">-->
 <?php echo "<img style=\"width:100%;height:400px;\" id=\"store_banner_upload\" src='../seller/productPic/".$row['productPic']."'>"; ?>
    </div>

    <div class="col-md-7" style="margin-left: 10px">
    	<h3><b><?= $row['productName']; ?></b></h3>

    	<div style="margin: 5%">
    		<h4><b>Description</b></h4>
    		<p>
                <?= $row['description']; ?>
    		</p>
    	
            <form action="" method="post">
<!--                <input type="hidden" name="productId" value="--><?//= $pId; ?><!--">-->
               <?php if($row['productFor']=="Men's Fashion" || $row['productFor']=="Women's Fashion" || $row['productFor']=="Baby's Fashion"): ?>
                 <label ><b>Size </b></label><br>
         <select name="productSize" style="border: 1px solid gray;border-radius: 10px;cursor: pointer;width: 20%;height: 30px" required>
                    <option name="size" selected disabled>Select Size</option>
                    <option name="size" value="Short">S</option>
                    <option name="size" value="Medium">M</option>
                    <option name="size" value="Large">L</option>
                    <option name="size" value="Extra Large">XL</option>
                 </select><?php endif; ?> <br><br>
                 <label for="quantity">Quantity </label><br>
                 <input type="number" style="width: 20%;height: 30px;border-radius: 10px;border: 1px solid gray" name="pQuantity" value="1">

                 <h4 data-currency-iso="BDT" style="margin-top: 5%"><b>Price:</b> ৳ <?= $row['price']; ?></h4>

                 <button name="submit" class="btn" style="background-color: #222222;color: #F79622;font-size: 20px;float: right;">Add To Cart </button><br><br>
            </form>

            <span style="color: red; font-size: 18px;">
                <?php
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>
            </span>
        </div>
    </div>

   
	
</div>







<?php include "footer.php" ?>

</body>
</html>