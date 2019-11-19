<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>

</head>
<body>

<div class="form">
    <h1 style="color: red;font-size: 50px">Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];   
        unset($_SESSION['message']); 
    else:
        header( "location: ../source/index.php" );        
    endif;
    ?>
    </p>     
    <a href="../source/index.php"><button class="button button-block" style="color: white; background-color: grey; cursor: pointer;font-size: 25px;" />Home</button></a>

</div>

    <img src="../images/logo.png">

</body>
</html>
