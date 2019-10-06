<?php 
$username = "root";
$password = "";
$dbname = "try_db";

$con = mysqli_connect('localhost:3307', $username, $password, $dbname) or die("Unable to connect");
if($con->connect_error) {
  exit('Could not connect');
}
if(isset($_POST['create'])){
	echo $fnm = $_POST['fnm'];
	echo $lnm = $_POST['lnm'];
	echo $phone = $_POST['phone'];
	echo $email = $_POST['eml'];
	echo $address = $_POST['addr'];
	echo $pass = $_POST['password'];
	echo $cpass = $_POST['cnfpassword'];
//onclick="validate()"
	if($pass == $cpass){
	$query= "insert into users values ('$fnm','$lnm','$phone','$email','$address','$pass'); ";
	mysqli_query($con,$query);
	echo "<script> window.location.assign('login.html')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/signup.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/pages/signup.css">

</head>
<body>
	<div class="container-fluid d1">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
			
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 div1">
			
				<h1 class="heading1"></h1><img src="../assets/logo.png" width="150px"></h1>
				<br>
				<br>
				<form class="form-container" method="post">
					<div class="form-group">
						<img class="imglg" src="../assets/p1.png">
					</div>
					<div class="form-group">
						<input class="form-control" type="text" id="fnm" placeholder="First Name" name="fnm" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" id="lnm" placeholder="Last Name" name="lnm" required>
					</div>
					<div class="form-group">					
						<input class="form-control" type="tel" id="phone"  maxlength="10" placeholder="Phone Number" name="phone" required>
					</div>
					<div class="form-group">
						<input class="form-control" type="email" maxlength="64" id="email_id" name="eml" placeholder="Email ID" >
					</div>
					
					<div class="form-group">
						<textarea class="form-control fc" type="text" id="addr" rows="2" columns="20"  placeholder="Address" name="addr" required></textarea>
					</div>
					
					<div class="form-group">
						<input class="form-control" type="password" id="password1" placeholder="Password" name="password" required>
					</div>
					
					<div class="form-group">
						<input class="form-control" type="password" id="password2" placeholder="Confirm Password" name="cnfpassword" required>
					</div>
					<div class="form-group" id="buttns">
						<button type="button" name="cancel" class="btn btn-default btn-cancel btn-outline-dark"><a class="can" href="signup.html">Cancel</a></button>
						<a herf="login.html"><button type="submit" id="create" class="btn btn-success btn-su"  name="create">Submit</button></a>
						
					</div>
				</form>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-11">
				<br>
				<!-- <br> -->
				<center>
			<a href="login.php"><button type="button" class="btn btn-light" >Log In Instead</button></a></center>
			</div>
		</div>
	</div>
</body>
</html>