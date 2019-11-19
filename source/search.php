<?php

require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $email = $_SESSION['email'];
}

 $query = $_GET['searchQuery'];

 $query = htmlspecialchars($query);

  $raw_results = $mysqli->query("SELECT * FROM productlist WHERE (`shopName` LIKE '%".$query."%') OR (`productFor` LIKE '%".$query."%') OR (`productName` LIKE '%".$query."%') OR (`price` LIKE '%".$query."%') OR (`keyword` LIKE '%".$query."%')");
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
	<title>Search Result</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php include "header2.php" ?>
    <?php include "sidebar.php" ?>


<?php
	if($raw_results->num_rows > 0){ ?>

<div class="container" style="padding-left: 7%">

<div style="border-bottom: 3px solid #A9A9A9;margin-top: 5%;margin-bottom: 5%">

<div class="row">

    <?php while($row = mysqli_fetch_array($raw_results)){    ?>

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
    <?php }  ?>
</div>
</div>
</div>
<?php
	}
	else{
		echo "No Result Found!!!!!\nTry Again";
	}

?>


<?php include "address.php" ?>
<?php include "footer.php" ?>
</body>
</html>