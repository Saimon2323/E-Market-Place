<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>FAQ</title>

<script>
function on(id) {
    document.getElementById(id).style.display = "block";
}

function off(id) {
    document.getElementById(id).style.display = "none";
}
</script>

</head>
<body class="faq">

	<?php include "header.php" ?>
	<?php include "sidebar.php" ?>

<div align="center">
	<h1><b>Hello, How can we help you?</b></h1>
</div>

<!-- OVERLAY TEXT START -->

<div id="o1" class="overlay" onclick="off('o1')">
  <div id="text">Overlay Text 1 Overlay Text 1 Overlay Text 1 </div>  
</div>

<div id="o2" class="overlay" onclick="off('o2')">
  <div id="text">Overlay Text 2 Overlay Text 2 Overlay Text 2 </div>  
</div>

<div id="o3" class="overlay" onclick="off('o3')">
  <div id="text">Overlay Text 3 Overlay Text 3 Overlay Text 3 </div>  
</div>

<div id="o4" class="overlay" onclick="off('o4')">
  <div id="text">Overlay Text 4 Overlay Text 4 Overlay Text 4 </div>  
</div>

<div id="o5" class="overlay" onclick="off('o5')">
  <div id="text">Overlay Text 5 Overlay Text 5 Overlay Text 5 </div>  
</div>




<!-- OVERLAY TEXT END -->

	<div style="margin: 6%;">
		<label>Browse your help</label>
		<h3 onclick="on('o1')">1. Where's My Stuff? </h3>
		<h3 onclick="on('o2')">2. Managing Your Orders? </h3>
		<h3 onclick="on('o3')">3. Account Settings & Payment Methods? </h3>
		<h3 onclick="on('o4')">4. Returns & Refunds? </h3>
		<h3 onclick="on('o5')">5. Shipping Policies? </h3>
	</div>
<div style="margin: 6%;margin-left: 10%;font-size: 25px">
	<p>Further any query?<a href="contact.php"> click here.</a></p>
</div>

<?php include "address.php" ?>
<?php include "footer.php" ?>

</body>
</html>