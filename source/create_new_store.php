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

	<title>Creating new store</title>
</head>
<body>

	<?php include "header.php" ?>
		<?php include "sidebar.php" ?>

	<div align="center" class="create_new_store">
		<h2><b style="font-size: 30px">Name Your Store</b></h2>
		<p>Choose a name for your store. We use this name to refer to<br> your store here in the Dashboard.</p>

		<form method="post" action="../login-system/store-register.php">
			<input type="text" name="store_name" placeholder="Store Name"><br>
			<button>Submit</button>
		</form>
	</div>

<!-- Address info start -->																		
<?php include "address.php" ?>  
<!-- Address info end -->

<?php include "footer.php" ?>



</body>
</html>