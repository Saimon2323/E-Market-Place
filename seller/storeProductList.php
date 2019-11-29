<?php
if(!isset($_SESSION)) session_start();

include ('../login-system/db.php');

$email = $_SESSION['email'];
$result = $mysqli->query("SELECT * FROM store WHERE email='$email'");

$user = $result->fetch_assoc();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $store_name = $user['store_name'];
}
else{
    header("location:index.php");
}
    $fileName    = "";
    $productFor  = "";
    $productName = "";
    $productDes  = "";
    $price       = "";
    $quantity    = "";
    $edit_state  = false;

    //store data
    if(isset($_POST['submit'])){

        $fileName= time().$_FILES['productPic'] ['name'];

        $source = $_FILES['productPic'] ['tmp_name'];

        $destination= "productPic/".$fileName;

        move_uploaded_file($source,$destination);

        $productFor = $_POST['productFor'];
        $productName = $_POST['productName'];
        $productDes = $_POST['productDes'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        if($productFor == "Men\'s Fashion"){
            $key = "mensmansboysmales";
        }
        elseif ($productFor == "Women\'s Fashion") {
            $key = "womenswomansgirlsfemales";
        }
        elseif($productFor == "Baby\'s Fashion"){
            $key = "childrentoybaby";
        }
        elseif ($productFor == "Phone and Tablets") {
            $key = "phonemobilembltablet";
        }
        elseif($productFor == "Electronics"){
            $key = "drillmachinescrewrange";
        }
        elseif($productFor == "Home and Living"){
            $key = "tvfridgeblandereggbedfurnitureshowpiecehomelivingself";
        }
        elseif($productFor == "Sports and Travels"){
            $key = "sportstravelsbastektballcricketbatfootball";
        }
        elseif($productFor = "Others"){
            $key="othersbook";
        }

        $query = " INSERT INTO `productlist` (`shopName`,`email`,`productPic`, `productFor`, `productName`, `description`, `price`, `quantity`, `keyword`) VALUES ('$store_name','$email', '$fileName', '$productFor', '$productName', '$productDes', '$price', '$quantity', '$key'); 
 ";

//        $mysqli->query($query);
        mysqli_query($mysqli,$query);
        $message = "Your product has been uploaded successfully.\\nThank you.";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header("Refresh:0; url=../source/new_store_description.php");

    }//end of store


    //update data
    if (isset($_POST['update'])){


        if($_FILES['productPic']['name'] == ''){
            $fileName = $_POST['productPic'];
        }
        else{
            $fileName= time().$_FILES['productPic'] ['name'];

            $source = $_FILES['productPic'] ['tmp_name'];

            $destination= "productPic/".$fileName;

            move_uploaded_file($source,$destination);
        }

        $id = $_POST['id'];
        $productFor = $_POST['productFor'];
        $productName = $_POST['productName'];
        $productDes = $_POST['productDes'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        mysqli_query($mysqli, "UPDATE productlist SET shopName='$store_name', email='$email', productPic='$fileName', productFor='$productFor', productName='$productName', description='$productDes', price='$price', quantity='$quantity' WHERE id='$id'");

        $message = "Your product has been updated successfully.\\nThank you.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh:0; url=../source/new_store_description.php");
    }//end of update


    //delete data
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($mysqli, " DELETE FROM productlist WHERE id='$id'");
        $message = "Your product has been deleted successfully.\\nThank you.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh:0; url=../source/new_store_description.php");
    }//end of delete

    //retrieve data
//        $results = mysqli_query($mysqli, "SELECT * FROM productlist WHERE email=$email");