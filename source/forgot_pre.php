
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	<?php include "header.php" ?>

	<div align="center" style="margin: 50px">
		<h1 style="color: red">Reset Your Password</h1>
		<form action="../login-system/forgot.php" method="POST">
			<label style="font-size: 30px;"><b>E-mail</b></label><br>
		    <input style="width: 25%;height: 35px;border-radius: 10px;border: 1px solid grey" type="email" placeholder="Enter your email" name="email" required ><br>

			<button class="btn btn-default" style="padding: 20px;margin: 15px;width: 10%;font-size: 25px" type="submit" style="width: 30%;">Reset</button>
    

		</form>
	</div>

	<?php include "footer.php" ?>


</body>
</html>