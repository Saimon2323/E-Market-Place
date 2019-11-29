
<?php 

  require "../login-system/db.php";
  include ('../seller/storeProductList.php');

if(!isset($_SESSION)) session_start();

    $email = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM store WHERE email='$email'");
    $result2 = $mysqli->query("SELECT * FROM productlist WHERE email='$email'");

      $user = $result->fetch_assoc();

    if( $user['store'] == 0){
      header("location:create_new_store.php");
    }

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $store_name = $user['store_name'];
}
else{
        header("location:index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Store | Description</title>

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

<script type="text/javascript" src="../js/cp_seller.js"></script>


<style>


/*Style for Rating Start***************************************/

/* Three column layout */

.b{
  color: #F8A036;
}

.side {
    float: left;
    width: 15%;
    margin-top:10px;
}

.middle {
    margin-top:10px;
    float: left;
    width: 70%;
}

/* Place text to the right */
.right {
    text-align: right;
    
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* The bar container */
.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
    .side, .middle {
        width: 100%;
    }
    .right {
        display: none;
    }
}
/*Style for Rating End***************************************/


/*Style for Product Image show start***************************************/
.card {
    box-shadow: 0 14px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 220px;
    margin: 10px 0px 10px;
   padding: 15px;

    
}

.card:hover {
box-shadow: 2px 2px 20px;
}

/*Style for Product Image show End***************************************/

</style>

</head>
<body class="new_store_description">

	<?php include "header.php" ?>

	<?php include "sidebar.php" ?>


	<div style="float: right;">
    <a href="member_plane.php"> <button style="margin: 10px;background-color: #222222;color: white" class="btn btn-default">Update your membership</button></a>
    
  </div>

<!--	<img style="width: 100%;height: 350px;" id="store_banner_upload"   src="">-->
    <?php echo "<img style=\"width:100%;height:350px;\" id=\"store_banner_upload\" src='../seller/storePic/".$user['store_banner']."'>"; ?>

	
	<div align="center">
		<h1> <b class="b"><?php echo " ".$store_name;?></b> Store </h1>
	<div style="overflow: hidden; width: 80%;height: 100px;border-radius: 10px;font-size: 15px"><?= $user['store_description'] ?></div>
	</div>

	<a href="add_product.php"><button class="btn btn-default" style="margin: 20px;margin-left: 10%;background-color: #222222;color: white;font-size: 12px">+Add Product</button></a>

	<div class="row" style="overflow: hidden;width: 100%;margin-bottom: 20px">
	<div style="margin-left: 10%"  class="col-md-6">
	<h3><b>Store Review</b> </h3>
	<p style="font-size: 20px">
		1. This Store is awesome.<br>
		2. good product seller<br>
		    blah blah blah ..............
	</p>
	</div>

		<div class="col-md-4">
	<h3><b> Store Rating</b></h3>
	
<!-- ************************************************************* -->

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div>150</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div>63</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div>15</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div>6</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div>20</div>
  </div>
</div>


<!-- *************************************************************** -->	
	</div>

</div>

<!-- //////////////////////////////////Products start -->


        <div style="margin: 0 10% 10px">
            <h3 style="border-bottom: 1px solid gray;margin-bottom: 10px">Some Products</h3>


        <div class="row" style="width: 100%;overflow: hidden;">
            <?php while($row = mysqli_fetch_array($result2)){ ?>
        <div class="card col-md-4">
                <?php echo "<img style=\"width:100%;height:220px;\" src='../seller/productPic/".$row['productPic']."'>"; ?>
          <div class="container">
            <h4><b><?= $row['productName']; ?></b></h4>
            <!-- <p><?= $row['description']; ?></p> -->
              <h4>price: <?= $row['price']; ?>tk </h4>
              <a href="add_product.php?edit=<?= $row['id']; ?>" class='glyphicon glyphicon-pencil btn btn-success'>Edit</a>
              <a href="../seller/storeProductList.php?del=<?= $row['id']; ?>" class='glyphicon glyphicon-remove btn btn-danger' onclick="return confirm_delete()">Delete</a>
          </div>
        </div>

        <!--<div class="card col-md-4">-->
        <!--  <img src="../img/product.jpg" alt="Avatar" style="width:100%;height:220px">-->
        <!--  <div class="container">-->
        <!--    <h4><b>Formal Pant</b></h4> -->
        <!--    <p>Male Category</p> -->
        <!--  </div>-->
        <!--</div>-->
        <!---->
        <!--<div class="card col-md-4">-->
        <!--  <img src="../img/product.jpg" alt="Avatar" style="width:100%;height:220px">-->
        <!--  <div class="container">-->
        <!--    <h4><b>Watch</b></h4> -->
        <!--    <p>Female Category</p> -->
        <!--  </div>-->
        <!--</div>-->
            <?php } ?>

        </div>




        </div>


<!-- ///////////////////////////////////////Products End -->

	<!-- Address info start -->																		
<?php include "address.php" ?>  
<!-- Address info end -->

<?php include "footer.php" ?>

<script>
  
  function confirm_delete(){
        return confirm("Are you sure you want to permanently delete this data?");
    }

</script>

</body>
</html>