<?php
session_start();
$con = mysqli_connect('localhost:3306', 'root', '', 'test');
                        $tablename = 'cart';
                        if(isset($_SESSION['email'])){
                        if(!isset($_GET[$tablename])){
                        
                            global $con;
                            $emailid =$_SESSION['email'];
                            $get_pro = "select * from $tablename where email = '$emailid'";
                            $run_pro = mysqli_query($con, $get_pro);
                            if (!$run_pro) {
                            printf("Error: %s\n", mysqli_error($con));
                            exit();
                        }
                            $rowcount =0;
                            //$result = mysqli_query($con,"SELECT * FROM user_list where username = '" . mysqli_real_escape_string($con, $username) . "'"); 
                            
                            $tot = 0;
                            while($row_pro=mysqli_fetch_array($run_pro)){

                            
                                $cidcart = $row_pro['p_id'];
                            
                                $cquant = $row_pro['qty'];

                                    
                                $get_cakes = "select * from product_men where p_id =$cidcart union all select * from product_women  where p_id=$cidcart "; 
                            
                                $cid=0;
                                $cname="";
                                $pdesc="";
                                $pprice=0;
                                $pimage="";
                                
                                
                                $run_cakes = mysqli_query($con, $get_cakes);
                                    if (!$run_cakes) {
                                    printf("Error inner: %s\n", mysqli_error($con));
                                
                                }
                                global $pprice;
                                $row_do=mysqli_fetch_array($run_cakes);
                            
                                    
                                    $cid = $row_do['p_id'];
                                    $cname = $row_do['p_title'];
                                    $pdesc = $row_do['p_desc'];
                                    $pprice = $row_do['p_price'];
                                    $pimage = $row_do['p_image'];
                                    $tot += ($pprice);
                                    
                                //} 
                                
                        } 
                        $total_price = sprintf("%.02f", $tot);
                       
                        } 

                    }


                            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="http://localhost/HYM_fashion_rev/PayTm/PaytmKit/pgRedirect.php">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value=<?php global $cid; echo"$emailid";?> ></td>
                </tr>
                <tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>Total Amount</label></td>
					<td><!--input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
                        value=""-->
                         <input title="TXN_AMOUNT"  tabindex="10"
						type="text" name="TXN_AMOUNT" value=<?php global $total_price;
                         echo "$total_price" ;?>>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>