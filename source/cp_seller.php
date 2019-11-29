<?php
/* Displays user information and some useful messages */

require '../login-system/db.php';

session_start();


	if(!isset($_SESSION['logged_in'])){
		$_SESSION['message'] = "You have to login first.";
			    header("location: error.php");

	}

	else{

	$email = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    	$user = $result->fetch_assoc();

    if( $user['active'] == 0){
    	$message = "You have to activate your account first.";
		  echo "<script type='text/javascript'>alert('$message');</script>";
		  header("Refresh:0; url=profile.php");
    }

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

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

<!-- Custom JavaScript -->
<script type="text/javascript" src="../js/cp_seller.js"></script>

	<title>Complete profile | Seller</title>
</head>
<body>
	
	<?php include "header.php" ?>
		<?php include "sidebar.php" ?>

	<p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>

<h3 align="center">Complete your profile</h3>

<form method="POST" action="../seller/cp_seller_b.php" enctype="multipart/form-data">
	<div class="container">
	<div class="col-md-8 complete_profile_seller">
		
		
		<label>Address</label><br>
		<input type="text" name="address" placeholder="address" required><br>

		<label>Shop Category</label><br>
		<input type="text" name="category" placeholder="category" required><br>

		<label>Postal code</label><br>
		<input type="number" name="Postalcode" placeholder="postal code" required><br>

		<label ><b>Store Banner</b></label><br>
		 <img  class="store_banner_image" id="store_banner_upload" onchange="readURL3(this)" src="../images/store_banner.png"><br>
		 
		 <input style="width: 100%;border: none" type="file" id="store_banner_image_select" name="storePic" class="filestyle" data-btnClass="btn btn-primary" accept=".jpg,.png" required><br>

		<label>Store Description</label><br>
		<textarea  name="description" placeholder="about you...." required></textarea>
	</div>

	<div class="col-md-4">
		 <label style="font-size: 25px">Profile picture</label><br>
		 <img class="profile_image" id="img-upload" onchange="readURL(this)" src="../images/upload.png"><br>
		 <input style="width: 100%;" type="file" id="imgInp" name="sellerPic" class="filestyle" data-btnClass="btn btn-primary" accept=".jpg,.png" required><br>

		 <label style="font-size: 25px">Scan of NID/Other valid document</label><br>
		 <img class="document_image" id="img-upload2" onchange="readURL2(this)" src="../images/upload2.png">
		 <input style="width: 100%;" type="file" accept=".jpg,.png" id="imgInp2" name="sellerDoc" class="filestyle" data-btnClass="btn btn-primary" required><br>	
		</div>
		<div class="complete_profile_seller">
			<button type="submit" name="submit" >Submit</button>
		</div>
	</div>
</form>

	<!-- Address info start -->																		
<!-- <div align="center" class="row container" style="padding: 20px;background-color: #182938;width: 100%;margin: 0;color: white">
		<div class="col-md-4">
		<h3>Address:</h3>
		<h5>Sample address</h5>
		<h6>1032, sample address</h6>
	</div>

	<div class="col-md-4">
		<h3>Address:</h3>
		<h5>Sample address</h5>
		<h6>1032, sample address</h6>
	</div>

	<div class="col-md-4">
		<h3>Address:</h3>
		<h5>Sample address</h5>
		<h6>1032, sample address</h6>
	</div>
</div> -->
<!-- Address info end -->

<?php include "footer.php" ?>


</body>
</html>