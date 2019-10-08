<?php
$username = "root";
$password = "";
$dbname = "test";

$con = mysqli_connect('localhost:3306', $username, $password, $dbname) or die("Unable to connect");
if($con->connect_error) {
  exit('Could not connect');
}
if(isset($_GET['add_cart'])){

global $con; 

//$ip = getIp();

$pro_id = $_GET['add_cart'];

$check_pro = "select * from cart where p_id='$pro_id'";

$run_check = mysqli_query($con, $check_pro); 

if(mysqli_num_rows($run_check)>0){

echo "";

}
else {

$insert_pro = "insert into cart (p_id,qty) values ('$pro_id',1)";

$run_pro = mysqli_query($con, $insert_pro); 

echo "<script>window.open('cart.php','_self')</script>";
}

}

?>