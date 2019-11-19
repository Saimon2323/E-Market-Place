<?php
/* Displays all successful messages */
if(!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  
</head>
<body>
<div class="form">
    <h1 style="font-size: 50px; color: green">Success</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];
        $_SESSION['active'] = 1;

    else:
        header( "location: ../source/header2.php" );
    endif;
    ?>
    </p>
    <a href="../source/index.php"><button class="button button-block" style="color: white; background-color: grey; cursor: pointer;font-size: 25px;">Home</button></a>
</div>
</body>
</html>
