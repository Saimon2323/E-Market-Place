<?php

require "../login-system/db.php";

if(!isset($_SESSION)) session_start();

$email = $_SESSION['email'];
$result = $mysqli->query("SELECT * FROM store WHERE email='$email'");
$result2 = $mysqli->query("SELECT * FROM sellerinfo WHERE email='$email'");

$user = $result->fetch_assoc();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $store_name = $user['store_name'];
}
else{
    header("location:index.php");
}


		$fileName1 = "";
		$fileName2 = "";
		$fileName3 = "";
		$address="";
		$category="";
		$postal_code="";
        $store_description="";

		if(isset($_POST['submit'])){
			

			$fileName1= time().$_FILES['sellerPic'] ['name'];
			$source = $_FILES['sellerPic'] ['tmp_name'];
			$destination= "sellerPic/".$fileName1;
			move_uploaded_file($source,$destination);
		
			$fileName2= time().$_FILES['sellerDoc'] ['name'];
			$source = $_FILES['sellerDoc'] ['tmp_name'];
			$destination= "sellerDoc/".$fileName2;
			move_uploaded_file($source,$destination);

			$fileName3= time().$_FILES['storePic'] ['name'];
			$source = $_FILES['storePic'] ['tmp_name'];
			$destination= "storePic/".$fileName3;
			move_uploaded_file($source,$destination);


			$address = $_POST['address'];
			$category = $_POST['category'];
			$postal_code = $_POST['Postalcode'];
			$store_description = $_POST['description'];


			if ($result2->num_rows > 0){
				$query = "UPDATE sellerinfo SET address='$address',category='$category',postal_code='$postal_code',seller_photo='$fileName1',seller_nid='$fileName2' WHERE email='$email'";
			}else{
			$query = " INSERT INTO `sellerinfo` (`email`,`address`,`category`,`postal_code`,`seller_photo`,`seller_nid`) VALUES ('$email','$address','$category','$postal_code','$fileName1','$fileName2')";
			}


			if ($result->num_rows > 0) {
					$query2 = "UPDATE store SET store_banner='$fileName3', 	store_description='$store_description' WHERE email='$email'";
					mysqli_query($mysqli,$query);
			$mysqli->query($query2);

	        $message = "Your profile has been updated successfully.\\nThank you.";
      	    echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh:0; url=../source/new_store_description.php");
			}else{
				$query2 = "INSERT INTO store ('email','store_banner','store_description') VALUES ('$email','$fileName3','$store_description') ";
				mysqli_query($mysqli,$query);
			$mysqli->query($query2);

	        $message = "Your prfile update successfully.\\nThank you.";
      	    echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh:0; url=../source/new_store_description.php");
			}

		


		}	

?>