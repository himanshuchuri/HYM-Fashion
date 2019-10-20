<?php
//include ('functions.php');
session_start();
$con = mysqli_connect('localhost:3306', 'root', '', 'test');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/pages/cart.css">
    <title>Hello, world!</title>
</head>

<body>
        <nav class="navbar navbar-light navbar-expand-md  justify-content-center">
                <a href="/" class="navbar-brand mr-0"><img src="../assets/logo.svg" alt="HYM Fashion" style="width: 70%; height: 70%;"></a>
                <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item ">
                            <a class="nav-link" href="mens.php">Men<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="women.php">Women</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                        <?php
                            global $con;

                    
                            if(!isset($_SESSION['email']))
                            
                            {
                                echo "<a class='nav-link' href='mens.php?in=true'>Sign In</a>";
                                if(isset($_GET['in'])){
                                    echo "<script> window.location.assign('signup.php')</script>";	
                                }
                            }
                            else{
                                echo "<a class='nav-link' href='mens.php?out=true'>Sign Out</a>";
                               if(isset($_GET['out']))
                                {
                                    echo "<script> window.location.assign('signup.php')</script>";
                                    session_unset();
                                }
                            }

                            

                    ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><img src="../assets/cart.png" alt=""></a>
                        </li>
                        <li class="nav-item">
                        <form method="get">
                            <input type="text" placeholder="Search.." name="user_query" style="margin-top: 8px;
                            margin-right: 16px;
                            font-size: 17px;">
                           <input type="submit" style="margin-top: 8px;
                           margin-right: 16px; float: right;" name="search" value="Search" />
                        </form> 
                        </li>
                    </ul>
                    <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
                        <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-facebook mr-1"></i></a> </li>
                        <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-twitter"></i></a> </li>
                    </ul>
                </div>
            </nav>
    <div class="container">
        <br>
        
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-8 details"> 

                <!-- <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4 ">
                            <center><img src="../assets/100.jpg" class="product" alt="Your Product" style="width: 80%;height: 80%;margin-top: 5%; margin-bottom: 5%;"></center>
                        </div>
                        <div class="col-sm-7 cart-details" style="margin-top: 3%;">
                            Black T-Shirt <br> sold by : HYM Fashion
                            <br>
                            <br>
                            <div class=" row ">
                                <div class="col-sm-3 ">
                                    Size : 8
                                </div>
                                <div class="col-sm-4 ">
                                    Quantity : 1
                                </div>

                            </div>
                            <div class="row ">
                                <div class="col-sm-3 ">
                                    ₹ 600
                                </div>
                                <div class="col-sm-4 ">
                                    50% off
                                </div>

                            </div>
                            <br>
                            <div class="row ">
                                <div class="col-sm-3 ">
                                    <button type="button" class="btn btn-outline-dark">Remove</button>
                                </div>
                                <div class="col-sm-1">

                                </div>
                                <div class="col-sm-6 ">
                                    <button type="button" class="btn btn-outline-dark ">Move to Wishlist</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->
                <section name="edit_hriday">
                <?php
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
                            
                            
                            while($row_pro=mysqli_fetch_array($run_pro)){
                            
                                
                                $cidcart = $row_pro['p_id'];
                            
                                $cquant = $row_pro['qty'];

                                if($cquant<200){
                                $get_cakes = "select * from product_men where p_id =$cidcart"; 
                            
                                $cid=0;
                                $cname="";
                                $pdesc="";
                                $pprice=0;
                                $pimage="";
                                
                                
                                $run_cakes = mysqli_query($con, $get_cakes);
                                    if (!$run_cakes) {
                                    printf("Error inner: %s\n", mysqli_error($con));
                                
                                }
                            
                                $row_do=mysqli_fetch_array($run_cakes);
                            

                                    $cid = $row_do['p_id'];
                                    $cname = $row_do['p_title'];
                                    $pdesc = $row_do['p_desc'];
                                    $pprice = $row_do['p_price'];
                                    $pimage = $row_do['p_image'];

                                //} 
                                
                                
                                if($cname != ""){
                                
                                    echo " <div class='container-fluid'>
                                    <div class='row'>
                                        <div class='col-sm-4 '>
                                            <center><img src='../assets/$pimage' class='product' alt='Your Product' style='width: 80%;height: 80%;margin-top: 5%; margin-bottom: 5%;'></center>
                                        </div>
                                        <div class='col-sm-7 cart-details' style='margin-top: 3%;'>
                                            Black T-Shirt <br> sold by : HYM Fashion
                                            <br>
                                            <br>
                                            <div class='row'>
                                                <div class='col-sm-3'>
                                                    Size : 8
                                                </div>
                                                <div class='col-sm-4'>
                                                    Quantity : 1
                                                </div>
                
                                            </div>
                                            <div class='row '>
                                                <div class='col-sm-3 '>
                                                    ₹ 600
                                                </div>
                                                <div class='col-sm-4 '>
                                                    50% off
                                                </div>
                
                                            </div>
                                            <br>
                                            <div class='row '>
                                                <div class='col-sm-3'>
                                                    <button type='button' class='btn btn-outline-dark'>Remove</button>
                                                </div>
                                                <div class='col-sm-1'>
                
                                                </div>
                                                <div class='col-sm-6'>
                                                    <button type='button' class='btn btn-outline-dark'>Move to Wishlist</button>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                                    
                                
                                
                            
                            }
                            }
                        } 
                        } 
                    }
                    else{
                        echo "<script> alert('Please Login')</script> ";
                        echo "<script> window.location.assign('signup.php')</script>";
                    }
                            ?>
                            

        
      
                </section>
            </div>
            <!-- <div class="col-sm-3 bill">
                <div class='container'>
                    <br>
                    <p>Price Details</p>

                    <div class='row'>
                        <div class='col-sm-6'>
                            Total MRP

                        </div>
                        <div class='col-sm-6'>
                            ₹ 600

                        </div>

                    </div>

                    <div class='row'>
                        <div class='col-sm-6'>
                            Tax
                        </div>
                        <div class='col-sm-6'>
                            ₹ 38
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6'>
                            Delivery Charges
                        </div>
                        <div class='col-sm-6'>
                            ₹ 100
                        </div>
                    </div>
                    <hr>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <b>TOTAL</b>
                        </div>
                        <div class='col-sm-6'>
                            ₹ 738
                        </div>
                    </div>



                </div>
            </div> -->
        </div>
        <br>
        <div class='row'>
            <div class='col-sm-4'>
                <button type='button' class='btn btn-outline-dark' style='width: 100%;'> <img src='../assets/wishlist.png' alt='Wishlist' style='margin-right: 4%;'>     Proceed To Checkout  <img src='../assets/right_arrow.png' style='margin-left: 4%;' alt=''></button>
            </div>
            <div class='col-sm-1'>
            </div>
            <div class='col-sm-3'>
                <button type='button' class='btn btn-outline-dark' style='height: 100%;'>Add More...</button>
            </div>

        </div>



    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
   

    <!-- Footer -->
    <footer class='page-footer font-small blue pt-4'>

        <!-- Footer Links -->
        <div class='container-fluid text-center text-md-left'>

            <!-- Grid row -->
            <div class='row'>

                <!-- Grid column -->
                <div class='col-md-6 mt-md-0 mt-3'>

                    <!-- Content -->

                    <p><img src='../assets/logo.svg' alt='HYM'></p>

                </div>
                <!-- Grid column -->

                <hr class='clearfix w-100 d-md-none pb-3'>

                <!-- Grid column -->
                <div class='col-md-3 mb-md-0 mb-3'>

                    <!-- Links -->


                    <ul class='list-unstyled'>
                        <li>
                            <a href='#!'>Men</a>
                        </li>
                        <li>
                            <a href='#!'>Women</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class='col-md-3 mb-md-0 mb-3'>

                    <!-- Links -->


                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Wishlist</a>
                        </li>
                        <li>
                            <a href="#!">Sign In</a>
                        </li>
                        <li>
                            <a href="#!">My shopping Cart</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="font-size: 14px;">© 2019 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> hym.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous"></script>
</body>

</html>