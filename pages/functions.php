<?php

$con = mysqli_connect("localhost:3306","root","","test");

//getting the ipaddress

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//creating the shopping cart
function cart(){

//if(isset($_GET['add_cart'])){

	global $con; 
	
	//$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where p_id='$pro_id'";
	
	$run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (p_id,qty) values ('123',1)";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('cart.php','_self')</script>";
	}
	
//}

}


//getting the total items

function total_items(){
 
	if(isset($_GET['add_cart'])){
	
		global $con; 
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where ip_add='$ip'";
		
		$run_items = mysqli_query($con, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
		
		else {
		
		global $con; 
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where ip_add='$ip'";
		
		$run_items = mysqli_query($con, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
	
	echo $count_items;
	}

	// Getting the total price of the items in the cart 
	
	function total_price(){
	
		$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ip_add='$ip'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			$pro_price = "select * from books where book_id='$pro_id'";
			
			$run_pro_price = mysqli_query($con,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$book_price = array($pp_price['book_price']);
			
			$values = array_sum($book_price);
			
			$total +=$values;
			
			}
		
		
		}
		
		echo "Rs " . $total;
		
	
	}



//getting the categories

function getCats() {

	global $con;
	$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

	echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

		
	}
}
function getPro(){

	if(!isset($_GET['cat'])){
		if(!isset($_GET['author'])){

	global $con;

	$get_pro = "select * from books order by RAND() LIMIT 0,10";
	$run_pro = mysqli_query($con, $get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){

		$pro_id = $row_pro['book_id'];
		$pro_cat = $row_pro['book_cat'];
		$pro_title = $row_pro['book_title'];
		$pro_author = $row_pro['book_author'];
		$pro_price = $row_pro['book_price'];
		$pro_image = $row_pro['book_image'];

		echo "
				<div id='single_book'>
				
					<h3>$pro_title</h3>
					<p><a href='details.php?pro_id=$pro_id'><img src='admin/book_images/$pro_image' width='200' height='200'/></a></p>
					<p><b>PRICE: INR $pro_price</b></p>
					<a href='index.php?add_cart=$pro_id'><button style='float:center; padding-top:10px;  border: 1px solid #FB8F3D; 
    background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
    background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
    background: -ms-linear-gradient(top, #FDA251, #FB8F3D); width:80px; height:30px
    '>Add to Cart</button></a>


					
				</div>
		";
	}
    }
	
		
}
}

function getCatPro(){

	if(isset($_GET['cat'])){

		$cat_id = $_GET['cat'];
		

	global $con;

	$get_cat_pro = "select * from books where book_cat='$cat_id'";
	$run_cat_pro = mysqli_query($con, $get_cat_pro);

	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
	
	echo "<h2 style='padding:20px;'>No products were found in this category!</h2>";
	
	}

	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

		$pro_id = $row_cat_pro['book_id'];
		$pro_cat = $row_cat_pro['book_cat'];
		$pro_title = $row_cat_pro['book_title'];
		$pro_author = $row_cat_pro['book_author'];
		$pro_price = $row_cat_pro['book_price'];
		$pro_image = $row_cat_pro['book_image'];

		echo "
				<div id='single_book'>
				
					<h3>$pro_title</h3>
					<p><a href='details.php?pro_id=$pro_id'><img src='admin/book_images/$pro_image' width='200' height='200'/></a></p>
					<p><b>PRICE: INR $pro_price</b></p>
					<a href='index.php?pro_id=$pro_id'><button style='float:center; padding-top:10px;  border: 1px solid #FB8F3D; 
    background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
    background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
    background: -ms-linear-gradient(top, #FDA251, #FB8F3D); width:80px; height:30px
    '>Add to Cart</button></a>


					
				</div>
		";
	}
    
	
		
}
}	



//getting the authors
?>








