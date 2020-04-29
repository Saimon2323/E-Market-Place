<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

<!-- Custom js -->
<script type="text/javascript" src="../js/phone_validation.js"></script>  <!-- Change new -->

	<title>Sign Up</title>
</head>
<body>

<?php include "header.php" ?>
  <?php include "sidebar.php" ?>

<!-- Sign Up form start -->
<h1 align="center">Signup Form</h1>

<form method="post" action="../login-system/register.php" class="sign_up_form" onsubmit="return phonenumber(this)">

  <div class="sign_up_container">

    <input style="margin-left: 5%" type="radio" name="account_type" value="Personal" required>  Personal Account
    <input style="margin-left: 30%" type="radio" name="account_type" value="Business" required>  Business Account <br><br>

    <label><b>Name</b></label>
    <input  type="text" placeholder="Enter your name" name="username" required>

    <label><b>Email</b></label><br>
    <input type="email" placeholder="Enter Email" name="email" required><br>

    <label><b>Mobile Number</b></label><br>
    <input type="number" placeholder="Mobile Number" name="phone" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name="password"  required>
   

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="rpt_password" required>

    <input style="margin-left: 5%" type="radio" name="gender" value="Male" required>   Male
    <input style="margin-left: 5%" type="radio" name="gender" value="Female" required>   Female 
    <input style="margin-left: 5%" type="radio" name="gender" value="Other" required>   Other <br>



    <input type="checkbox" checked="checked" required> I agree
    <p data-toggle="modal" data-target="#myModal"  >By creating an account you agree to our <a href="#">Terms & Conditions</a>.</p>

     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 align="center" class="modal-title sign_up_form_model_header">Terms & Conditions</h4>
        </div>
        <div style="height:100%;" class="modal-body">
          <p style="font-size: 20px">By choosing “I agree” below you agree to Google’s Terms of Service.<br>

You also agree to our Privacy Policy, which describes how we process your information, including these key points:
<br>
Data we process when you use Google
When you set up a Google Account, we store information you give us like your name, email address, and telephone number.<br>
When you use Google services to do things like write a message in Gmail or comment on a YouTube video, we store the information you create.
When you search for a restaurant on Google Maps or watch a video on YouTube, for example, we process information about that activity – including information like the video you watched, device IDs, IP addresses, cookie data, and location.<br>
We also process the kinds of information described above when you use apps or sites that use Google services like ads, Analytics, and the YouTube video player.
Depending on your account settings, some of this data may be associated with your Google Account and we treat this data as personal information. You can control how we collect and use this data at My Account (myaccount.google.com).
<br>
Why we process it
We process this data for the purposes described in our policy, including to:
<br>
Help our services deliver more useful, customized content such as more relevant search results;
Improve the quality of our services and develop new ones;
Deliver personalized ads, both on Google services and on sites and apps that partner with Google;
Improve security by protecting against fraud and abuse; and
Conduct analytics and measurement to understand how our services are used.
Combining data<br>
We also combine data among our services and across your devices for these purposes. For example, we show you ads based on information from your use of Search and Gmail, and we use data from trillions of search queries to build spell-correction models that we use across all of our services.
</p>
        </div>
        <div class="modal-footer">
          <button style="width: 20%" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Model End -->


    <div class="clearfix">
      <button style="width: 20%;" type="submit" name="signupbtn">Sign Up</button>
    </div>
  </div>
</form>



<?php include "footer.php" ?>

</body>
</html>