<?php
if(!isset($_SESSION)) session_start();

$_SESSION['ref'] ="";

if($_SESSION['ref'] == '1'){
header("Refresh:0; url=check_out_item.php");
	$_SESSION['ref'] = 0;
}
require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

if(isset($_GET['del'])){
    $cId = $_GET['del'];
    header("Refresh:0; url=check_out_item.php");
    $delQuery = " DELETE FROM `cart` WHERE `cart`.`cartId` = '$cId'  ";
    mysqli_query($mysqli,$delQuery);
}

if(isset($_POST['submit'])){
    $cartId = $_POST['cartId'];
    $updateQuantity = $_POST['quantity'];

    $upQuery = "UPDATE cart SET customerQty='$updateQuantity' WHERE cartId='$cartId'";
    mysqli_query($mysqli,$upQuery);
}

$sId = session_id();
$result = $mysqli->query("SELECT * FROM cart WHERE sId='$sId'");
	
	$empty="";

?>



<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Check Out| Item</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php include "header2.php" ?>
		<?php include "sidebar.php" ?>
	
	<div class="check_out_item">
		<h3>Items in your cart</h3>
		
		<table>
		<tr >
            <th>SL</th>
			<th>Item</th>
			<th>Quantity</th>
			<th>Unit Price</th>
			<th>Total</th>
			<th>Action</th>
		</tr>


      <?php
            $i = 0;
            $sum = 0;
            while ($cartInfo = mysqli_fetch_array($result)){
                $i++;
                $empty = $cartInfo['sId'];
      ?>
		<tr>
            <td><?= $i; ?></td>
			<td>
				<p>
<!--                    <img src="../images/logo.png">-->
                    <?php echo "<img src='../seller/productPic/".$cartInfo['proPic']."'>"; ?>
                    <?= $cartInfo['proName']; ?> <br>
                    Size: <?= $cartInfo['size']; ?>
                </p>
			</td>
			<td>
                <form action="" method="post">
                    <input type="hidden" name="cartId" value="<?= $cartInfo['cartId']; ?>">
                    <input class="check_out_item_input" style="width: 30%" type="number" name="quantity" value="<?= $cartInfo['customerQty']; ?>">
                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </form>
			</td>
			<td>৳ <?= $cartInfo['price']; ?></td>
			<td>৳ <?= $total = ($cartInfo['price'] * $cartInfo['customerQty']); ?></td>
            <td><a href="?del=<?= $cartInfo['cartId'];  ?>"  onclick='return confirm_delete()' class="btn btn-danger">X</a></td>
		</tr>
       <?php $sum = ($sum + $total); ?>
      <?php } ?>
	</table>
        <?php $_SESSION['cart'] = $i; ?>
</div>

	<a href="index.php"> <button class="check_out_item_continue">Continue Shopping</button></a>

	<div class="check_out_item_proceed">
		<p style="font-size: 20px;">
			Item Total : ৳ <?= $sum; ?><br>
			Shipping&nbsp;&nbsp;&nbsp;&nbsp;: ৳ <?= $shippingCost=100; ?><br>
			Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ৳ <?= $grandTotal = ($sum + $shippingCost); ?>

			<a href="payment.php"><button <?php  if ($empty==''){ ?> disabled <?php   } ?> class="btn">Proceed to Checkout</button></a>
		</p>
	</div>

	
	
<div style="margin-top: 250px">
<?php include "address.php" ?>
<?php include "footer.php" ?>
</div>



<script>
    function confirm_delete(){
        return confirm("Are you sure you want to delete this data?");
    }
    //end of delete operation
</script>

</body>
</html>