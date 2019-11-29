<?php 
if(!isset($_SESSION)) session_start();

require "../login-system/db.php";
//include ('../seller/storeProductList.php');

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
$email = $_SESSION['email'];

$result = $mysqli->query("SELECT * FROM store WHERE email='$email'");

$user = $result->fetch_assoc();
    $store_name = $user['store_name'];
}
$results = mysqli_query($mysqli, "SELECT * FROM productlist");

$result_boost = mysqli_query($mysqli, "SELECT * FROM productlist WHERE boost='1'");

//if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
//    $store_name = $user['store_name'];
//}
/*else{
    header("location:index.php");
}
*/
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

<!-- Custom JavaScript -->
 <script src="../js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="../js/j1.js"></script>

    <title>Home</title>
</head>
<body>

<div>

<?php 
include "header.php"; 
include "header2.php"; 
include "sidebar.php"; 
?>

 <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <div id="jssor_1" style="position:relative;margin: 0 auto; top:0px;left:0px;width:980px;height:392px;overflow:hidden;visibility:hidden;border-bottom: 3px solid #A9A9A9">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:390px;overflow:hidden;">
            <div>
                <img data-u="image" src="../img/2.jpg" />
            </div>
            <div>
                <img data-u="image" src="../img/1.jpg" />
            </div>
            <div>
                <img data-u="image" src="../img/3.jpg" />
            </div>
            <div>
                <img data-u="image" src="../img/4.jpg" />
            </div>
            <div>
                <img data-u="image" src="../img/5.jpg" />
            </div>
            <div>
                <img data-u="image" src="../img/6.jpg" />
            </div>
            <div>
                <img data-u="image" src="../img/7.jpg">
            </div>
            <div>
                <img data-u="image" src="../img/8.jpg">
            </div>
            <div>
                <img data-u="image" src="../img/9.jpg">
            </div>
            <a data-u="any" href="https://www.jssor.com" style="display:none">slider in bootstrap</a>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->

<!-- Product Information Start -->
<div class="container" style="padding-left: 7%">


<!-- Trending Part Start -->
<div style="border-bottom: 3px solid #A9A9A9;margin-top: 5%">
    <h3><b>Trending</b></h3>

<div class="row">

    <?php while($row = mysqli_fetch_array($result_boost)){ ?>
    <?php if($row['quantity']>0): ?>

<div class="col-md-4 product">
    <div style="border-bottom: 1px solid #A9A9A9">
    <a href="product_page.php?pId=<?= $row['id']; ?>"> <?php echo "<img style=\"width:100%;height:220px;\" src='../seller/productPic/".$row['productPic']."'>"; ?> </a>
    <p style="font-size: 10px;"><?= $row['shopName']; ?></p>
    </div>
     <p style="width: 220px"><b><a href="product_page.php?pId=<?= $row['id']; ?>"><?= $row['productName']; ?></a></b></p>
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
<!-- Trending Part End -->




    <!-- Popular part start -->
    <div style="border-bottom: 3px solid #A9A9A9;margin-top: 5%">
    <h3><b>Products</b></h3>

<div class="row">

    <?php while($row = mysqli_fetch_array($results)){ ?>

<div class="col-md-4 product">
    <div style="border-bottom: 1px solid #A9A9A9">
    <a href="product_page.php?pId=<?= $row['id']; ?>"> <?php echo "<img style=\"width:100%;height:220px;\" src='../seller/productPic/".$row['productPic']."'>"; ?> </a>
    <p style="font-size: 10px;"><?= $row['shopName']; ?></p>
    </div>
     <p style="width: 220px"><b><a href="product_page.php?pId=<?= $row['id']; ?>"><?= $row['productName']; ?></a></b></p>
     <span data-currency-iso="BDT">৳</span> <?= $row['price']; ?><br>

 
<div class="star-ratings-css">
  <div class="star-ratings-css-top"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span><span style="color: black;font-size: 12px">(5)</span></div>
  </div>

    <a style="margin: 5%" href="product_page.php?pId=<?= $row['id']; ?>" class="btn btn-primary">Details</a>

</div>
    <?php } ?>
</div>
</div>
<!-- Popolar Part End -->


</div>
<!-- Product Information End -->

<div align="center">
<h3><b>What is Ghuri.com</b></h3>
<p><a style="color: darkblue" href="about.php">read more...</a></p>
</div>

<div align="center" style="margin-top: 3%">
<img style="height: 300px; width: 100%;" src="../img/Buy Sell Banner.jpg">
</div>

<!-- Address info start -->                                                                     
<?php include "address.php" ?>  
<!-- Address info end -->
</div>

<?php include "footer.php" ?>




</body>
</html>

