<?php

require "../login-system/db.php";
require "../seller/storeProductList.php";
if(!isset($_SESSION)) session_start();

$email = $_SESSION['email'];
$result = $mysqli->query("SELECT * FROM store WHERE email='$email'");

$user = $result->fetch_assoc();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
  $store_name = $user['store_name'];
}
else{
  header("location:index.php");
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $singleRec = mysqli_query($mysqli, "SELECT * FROM productlist WHERE id=$id");
  $records = mysqli_fetch_array($singleRec);

  $productFor  = $records['productFor'];
  $productPic  = $records['productPic'];
  $productName = $records['productName'];
  $description = $records['description'];
  $price       = $records['price'];
  $quantity    = $records['quantity'];
  $edit_state  = true;
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../js/cp_seller.js"></script>

  <script type="text/javascript" src="../js/add_product.js"></script>

</head>
<body>
  <?php include "header.php" ?>

  <?php include "sidebar.php" ?>

  <div align="center">
    <h1> <b style="color: #F8A036"><?php echo " ".$store_name;?></b> Store </h1>
    <h4>Add Your Product</h4>
  </div>
  <form action="../seller/storeProductList.php" method="post" enctype="multipart/form-data">
    <? if(isset($_GET['edit'])){ ?>
      <input type="hidden" name="id" value="<?= $id ?>">
    <? } ?>
    <div style="border: 1px solid gray;margin-left: 10%;margin-right: 10%;border-radius: 10px;margin-bottom: 30px">
     <h4 style="margin-left: 5%;border-bottom: 1px solid gray"><b>Picture of Product</b></h4>


     <div style="margin: 30px;">
      <label class="btn btn-default">
        +maximum pic limit 2mb jpg or png formate<input type="file" name="productPic" style="display: none;" accept="image/*" id="product_select"/>
      </label>

      <?php if ($edit_state == false): ?>
       <img id="product_image" onchange="readURL4(this)" src="../img/addp.jpg" style="margin-left: 40%;height: 220px;width: 220px">
       <?php else: ?>
         <input type="hidden" name="productPic" value="<?= $productPic; ?>">
         <?php echo "<img style=\"margin-left: 40%;height: 220px;width: 220px\" id=\"product_image\" onchange=\"readURL4(this)\" src='../seller/productPic/".$records['productPic']."'>"; ?>
       <?php endif; ?>


       <div>
         <label for="continent">Select a category</label>
         <select name="productFor" style="border-radius: 10px;cursor: pointer;" id="continent" onchange="countryChange(this);" required>
          <option value="<?= $productFor; ?>"><?= $productFor; ?></option>
          <!-- <option name="itemFor" value="" disabled selected>Select</option> -->
          <option name="itemFor" value="Men\'s Fashion">Men's Fashion</option>
          <option name="itemFor" value="Women\'s Fashion">Women's Fashion</option>
          <option name="itemFor" value="Baby\'s Fashion">Baby's Fashion</option>
          <option name="itemFor" value="Phone and Tablets">Phone & Tablets</option>
          <option name="itemFor" value="Electronics">Electronics</option>
          <option name="itemFor" value="Home and Living">Home & Living</option>
          <option name="itemFor" value="Sports and Travels">Sports & Travels</option>
          <option name="itemFor" value="Others">Others</option>
        </select>
        <br/>
  <!-- <label for="country">Select a category</label>
  <select id="country" style="border-radius: 10px;cursor: pointer;">
    <option value="0">Category</option>
  --></select>
</div>


</div>
</div>

<h4 style="margin-left: 10%"><b>Name of the product</b></h4>
<input style="margin-left: 10%; height: 30px; border-radius: 10px; border: 1px solid gray; width: 20%;" type="text" name="productName" value="<?= $productName; ?>" required>

<h4 style="margin-left: 10%"><b>Description</b></h4>

<?php if ($edit_state == false): ?>
  <textarea style="overflow: hidden; width: 80%;height: 100px;border-radius: 10px;margin-left: 10%" name="productDes" placeholder="write about Product" required></textarea>
  <?php else: ?>
    <textarea style="overflow: hidden; width: 80%;height: 100px;border-radius: 10px;margin-left: 10%" name="productDes" required><?= $description; ?></textarea>
  <?php endif; ?>


  <h4 style="margin-left: 10%"><b>Price</b></h4>
  <input type="number" name="price" value="<?= $price; ?>" style="height: 30px;border-radius: 10px ;border: 1px solid gray;width: 10%;margin-left: 10%;">TK


  <h4 style="margin-left: 10%"><b>Quantity</b></h4>
  <input type="number" name="quantity" value="<?= $quantity; ?>" style="height: 30px;border-radius: 10px ;border: 1px solid gray;width: 10%;margin-left: 10%;">

  <br>

  <!--		<button class="btn btn-default" type="submit" name="submit" style="margin: 20px;margin-left: 10%;background-color: #222222;color: white;font-size: 12px">Add</button>-->
  <?php if ($edit_state == false): ?>
    <button type="submit" name="submit" class="btn btn-default" style="margin: 20px;margin-left: 10%;background-color: #222222;color: white;font-size: 12px">Add</button>
    <?php else: ?>
      <button type="submit" name="update" class="btn btn-default" style="margin: 20px;margin-left: 10%;background-color: #222222;color: white;font-size: 12px">Update</button>
    <?php endif; ?>

  </form>


  <!--		<button class="btn btn-default" style="margin: 20px;margin-left: 10%;background-color: #222222;color: white;font-size: 12px;">Add more</button>-->


  <?php include  "address.php" ?>

  <?php include "footer.php" ?>

</body>
</html>