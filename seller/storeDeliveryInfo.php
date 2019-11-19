<?php

    include ('../login-system/db.php');
    if(!isset($_SESSION)) session_start();

    //initialize variables
    $cardName    = "";
    $cardNumber  = "";
    $holderName  = "";
    $expiryDate  = "";
    $sCode       = "";
    $name        = "";
    $email       = "";
    $deliAddress = "";
    $phone       = "";


    //store data
    if(isset($_POST['submit'])){
        $id          = rand(); 
        $sId         = session_id();
        $cardName    = $_POST['card'];
        $cardNumber  = $_POST['cardNumber'];
        $holderName  = $_POST['holderName'];
        $expiryDate  = $_POST['expiryDate'];
        $sCode       = $_POST['sCode'];
        $name        = $_POST['name'];
        $email       = $_POST['email'];
        $deliAddress = $_POST['deliAddress'];
        $phone       = $_POST['phone'];

        $checkQuery = $mysqli->query("SELECT * FROM delivery_info WHERE id='$id' ");
       /* $checkResult = $checkQuery->fetch_assoc();*/

       /* if($checkResult){
            $_SESSION['msg'] = "Address already added!! Go to payment please.";
            header('location: ../source/payment.php');
        }*/
        if($result->num_rows > 0){
                    do{
                        $store_id = rand();
                    }while ($result->num_rows <= 0);
         }
         {

            $query = " INSERT INTO `delivery_info` ( `id`,`sId`, `card`, `cardNumber`, `holderName`, `exDate`, `sCode`, `name`, `email`, `deliAddress`, `phone`) VALUES ('$id','$sId', '$cardName', '$cardNumber', '$holderName', '$expiryDate', '$sCode', '$name', '$email', '$deliAddress', '$phone');  ";

            //        $mysqli->query($query);
           /* mysqli_query($mysqli, $query);*/
           if (mysqli_query($mysqli, $query) === TRUE){
            $_SESSION['delId'] = $id;
            $_SESSION['mail'] = $email;
            $_SESSION['name'] = $name;
           }


            header('location: ../source/paymentTwo.php');
        }
    }//end of store


