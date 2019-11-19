<?php


require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}


if(isset($_GET['pCat'])){
    $pCat = $_GET['pCat'];
    if($pCat == "Men\'s Fashion"){
    	$category = "Men's Fashion";
    }
    if($pCat == "Women\'s Fashion"){
    	$category = "Women's Fashion";
    }
    if($pCat == "Baby\'s Fashion"){
    	$category = "Baby's Fashion";
    }
    if($pCat == "Phone and Tablets"){
    	$category = "Phone & Tablets";
    }
    if($pCat == "Sports and Travels"){
    	$category = "Sports & Travels";
    }
	$result = $mysqli->query("SELECT * FROM productlist WHERE productFor='$pCat'");

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

  <!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title></title>
</head>
<body>

	<?php include "header.php" ?>
	<?php include "header2.php" ?>
    <?php include "sidebar.php" ?>


<div class="container" style="padding-left: 7%">


<!-- Trending Part Start -->
<div style="border-bottom: 3px solid #A9A9A9;margin-top: 5%;margin-bottom: 5%">

    <h3><b><?php echo $category; ?></b></h3>

<div class="row">

    <?php while($row = mysqli_fetch_array($result)){ ?>
    <?php if($row['quantity']>0): ?>

<div class="col-md-4 product">
    <div style="border-bottom: 1px solid #A9A9A9;">
    <a href="product_page.php?pId=<?= $row['id']; ?>"> <?php echo "<img style=\"width:100%;height:220px;\" src='../seller/productPic/".$row['productPic']."'>"; ?> </a>
    <p style="font-size: 10px;"><?= $row['shopName']; ?></p>
    </div>
     <p style="width: 220px"><b><a href=""><?= $row['productName']; ?></a></b></p>
     <span data-currency-iso="BDT">৳</span> <?= $row['price']; ?><br>

 
<div class="star-ratings-css">
  <div class="star-ratings-css-top"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span><span style="color: black;font-size: 12px">(5)</span></div>
  </div>

    <a style="margin: 5%" href="product_page.php?pId=<?= $row['id']; ?>" class="btn btn-primary">Details</a>

</div>
    <?php endif; ?>
    <?php } ?>
</div>
</div>
</div>

<?php include "address.php" ?>
<?php include "footer.php" ?>
</body>
</html>
