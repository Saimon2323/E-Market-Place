<?php
/* Displays user information and some useful messages */

if(!isset($_SESSION)) session_start();

require ('../login-system/db.php');


// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] == 0 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $user_name = $_SESSION['UserName'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $account_type = $_SESSION['account_type'];

    $result = $mysqli->query("SELECT * FROM sellerinfo WHERE email='$email'");
    $user = $result->fetch_assoc();
    
}

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $user_name ?></title>
  
</head>

<body>
  <div class="form">

      <?php include "header.php" ?>
          
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
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info" style="margin-left: 40px">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>

          <div>
            <div class="col-md-1">
                <?php include "sidebar.php" ?>

            <?php if (($_SESSION['account_type'])== 'Business') :?>
              <a href="cp_seller.php"> <button class="btn btn-primary" style="margin: 20px; margin-left: 50px;border: none">Update your profile</button></a>
            </div>
            <?php endif; ?>


            <?php if (($_SESSION['account_type'])== 'Personal') :?>
              <a href="cp_buyer.php"> <button class="btn btn-primary" style="margin: 20px; margin-left: 50px;border: none">Update your profile</button></a>
            </div>
            <?php endif; ?>




            <div class="col-md-12">
            <div align="center">

                <?php if (($_SESSION['account_type'])== 'Personal') :?>
                     <img style="height: 50%;width: 200px;border-radius: 50%;" src="../images/car.jpg">
                <?php endif; ?>

                <?php if (($_SESSION['account_type'])== 'Business') :?>
                    <?php echo "<img style=\"width:200px;height:50%;border-radius: 50%;\" src='../seller/sellerPic/".$user['seller_photo']."'>"; ?>
                <?php endif; ?>


                <h2><?php echo $user_name; ?></h2>
          <p><?= $email ?></p>
          


                <?php $_SESSION['email'] = $email ?>
                    <a href="../login-system/delete.php"><button class="btn btn-default" style="margin-bottom: 20px" onclick="return confirm_delete()">Delete Account</button></a>
          </div>
          </div>

          <?php if (($_SESSION['account_type'])== 'Business') :?>

            <div style="margin-left: 85%;">
              <a href="new_store_description.php"> <button <?php if ($active == '0'){ ?> disabled <?php   } ?> class="btn btn-primary"  style="margin: 20px;margin-right: 50px ;border: none;">Go to store</button>
              </a>
            </div>

          <?php endif; ?>

</div>
    </div>
    
    <div style="position: fixed;bottom: 0;width: 100%;"><?php include "footer.php" ?></div>


<script>
  
  function confirm_delete(){
        return confirm("Are you sure you want to permanently delete this data?");
    }

</script>

</body>
</html>
