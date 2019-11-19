<?php

if(!isset($_SESSION)) session_start();

$userName="Sign in";
$register="Register";

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1 && $_SESSION["active"] == 1 ){
  $userName=$_SESSION['UserName'];

}
elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1 && $_SESSION["active"] == 0 ) {
  $userName=$_SESSION['UserName']." (not active)";
}
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_unset();
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- new added -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  


<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  .img:hover{
    opacity: 0.5;
  }
</style>
</head>
<body>


<nav class="navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="img" href="index.php"><img style="height: 50px;width: 80px;" src="../images/logo.png"> </a>
    </div>
 
    <ul class="nav navbar-nav navbar-right">

     <?php if(!isset($_SESSION['logged_in'])) :?>
         <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span><?php echo " ".$register;?></a></li>
         <li><a href="signIn.php" style="border-right:1px solid white"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
      
      <?php elseif ($_SESSION['logged_in']==1) :?>

        <li><a href="profile.php" style="border-right:1px solid white;"><span class="glyphicon glyphicon-user"></span><?php echo " ".$userName;?></a></li>
        <li><a href="?logout=1" style="border-right:1px solid white"> Log out</a></li>

      <?php endif; ?>

       <li>
          <a href="check_out_item.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart(<?php
                if(isset($_SESSION['cart'])){
                    echo $_SESSION['cart'];
                    
                }

              ?>)</a>
        </li>
    </ul>
     <!-- Search start -->
    <form class="navbar-form" action="search.php" method="GET">
    <div class="input-group search_box">
        <input type="text" class="form-control" placeholder="Search" name="searchQuery" id="searchQuery">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
      </form>
    <!-- Search End -->
  </div>
</nav>

</body>
</html>



<script>
$(document).ready(function(){
 
 $('#searchQuery').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"searchSugg.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>