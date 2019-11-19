<?php

require "../login-system/db.php";
if(!isset($_SESSION)) session_start();
if(isset($_SESSION['logged_in'])){
    $email = $_SESSION['email'];

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();
    $user_name = $user['name'];
}

$post_query = $mysqli->query("SELECT * FROM community ORDER BY post_id DESC  ");

$comment_query = $mysqli->query("SELECT * FROM comment ORDER BY post_id DESC ");

if(isset($_POST['post_button'])){

    $post_text = $_POST['post_text'];
    date_default_timezone_set("Asia/Dhaka");
 	$time = date("h:i:sa");
    $date =  date("d/m/y");

    $query = "INSERT INTO community (email, name, post_text, date,time) VALUES ('$email', '$user_name', '$post_text', '$date','$time')";
    
    mysqli_query($mysqli, $query);
	header("Refresh:0; url=../source/community.php");
}

if(isset($_POST['comment_button'])){
	$post_id = $_POST['postId'];
    $comment_text = $_POST['comment_text'];
    $email = $_SESSION['email'];

    $query2 = "INSERT INTO comment (post_id,email,name, comment) VALUES ('$post_id','$email', '$user_name','$comment_text')";
    
    mysqli_query($mysqli, $query2);
	header("Refresh:0; url=../source/community.php");
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Community</title>
</head>
<body>

<?php include "header.php" ?>
<?php include "sidebar.php" ?>

<div class="community">
	<?php
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1) : ?>
	
	<form action="" method="post">
	<div class="post_input_div">
		<textarea class="post_input" type="text" name="post_text"></textarea><br>
		<button class="btn btn-success button_post" name="post_button">POST</button>
	</div>
	</form>
	<?php endif; ?>


	<div>
		<?php while($post_result = mysqli_fetch_array($post_query)){ ?>
		<div class="post_show">	
			<div>
    <h3 class="post_email"><?= $post_result['name']; ?></h3>
     <p class="post_text"><?= $post_result['post_text']; ?></p>
     <div align="center">
     <h6> <label style="color:red"><?php echo " Date: " ?></label> <?php echo $post_result['date']." at"."  ".$post_result['time'];?></h6></div>
     	</div>
     	<label style="margin-left: 3%;border-bottom: 1px solid gray;width: 70%">Comments</label>
     	<div style="margin-left: 5%;">
     		<?php $post_id=$post_result['post_id'];
     		$comment_query = $mysqli->query("SELECT * FROM comment where post_id= '$post_id' ORDER BY post_id DESC ");?>
     <?php  while($comment_result = mysqli_fetch_array($comment_query)){ ?>
     	<?php if($post_result['post_id'] == $comment_result['post_id']){ ?>
     	<div style="box-shadow: 2px 2px 5px red;padding: 5px;margin-bottom: 10px">
        <h5 style="color: purple;"><?= $comment_result['name']; ?></h5>
     	<p style="margin-left: 5%"><?= $comment_result['comment']; ?></p>
        </div>
     	<?php }  ?>
     <?php }  ?>  
     	</div>
     	<div>
     		<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1) : ?>
     <form action="" method="post">
     	<input type="hidden" name="postId" value="<?= $post_result['post_id']; ?>">
       <div style="padding-right: 10px;">
     <input class="post_comment" type="text" name="comment_text"><br><br>
     <button class="btn btn-info button_comment" name="comment_button">comment</button><br><br>
     </div>
     </form>
     	<?php endif; ?>
     	</div>
    	</div>
    <?php } ?>
    	
	</div>
	
</div>



<?php include "footer.php" ?>

</body>
</html>