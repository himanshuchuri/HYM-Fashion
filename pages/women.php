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
    <link rel="stylesheet" href="../css/pages/mens.css">
    <title>Womens</title>




</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md  justify-content-center">
            <a href="index.php" class="navbar-brand mr-0"><img src="../assets/logo.svg" alt="HYM Fashion" style="width: 70%; height: 70%;"></a>
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
                        <a class="nav-link" href="#">Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        global $con;


                        if (!isset($_SESSION['email'])) {
                            echo "<a class='nav-link' href='mens.php?in=true'>Sign In</a>";
                            if (isset($_GET['in'])) {
                                echo "<script> window.location.assign('signup.php')</script>";
                            }
                        } else {
                            echo "<a class='nav-link' href='mens.php?out=true'>Sign Out</a>";
                            if (isset($_GET['out'])) {
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
                        <a class="nav-link" href="#"><img src="../assets/search.png" alt=""></a>
                    </li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
                    <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-facebook mr-1"></i></a> </li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-twitter"></i></a> </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3" style="background-color:rgb(236, 236, 251) ;">
                <br>

                <center>
                    <h3><b>Our Product Suppliers</b></h3>
                </center>

                <br>
                <center><img src="../assets/zara.png" alt="img1" style="width: 50%;"></center>
                <br>
                <br>

                <center><img src="../assets/tommy.png" alt="img1" style="width: 50%;"></center>
                <br>
                <br>

                <center><img src="../assets/levis.png" alt="img1" style="width: 80%;"></center>
                <br>
                <br>

                <center><img src="../assets/Gucci.png" alt="img1" style="width: 50%;"></center>
                <br>
                <br>


                <center><img src="../assets/allen_solly.png" alt="img1" style="width: 50%;"></center>
                <br>
                <br>

                <center><img src="../assets/hnm.png" alt="img1" style="width: 50%;"></center>


            </div>
            <div class="col-md-9" style="background:#fffdf5;">
                <div class="container">
                    <br>
                    <br>
                    <center>
                        <h3><b>WOMEN'S CLOTHING</b></h3>
                    </center>
                    <br>
                    <?php
                    if (!isset($_GET['product_women'])) {


                        global $con;

                        $get_pro = "select * from product_women";
                        $run_pro = mysqli_query($con, $get_pro);
                        $rowcount = 0;

                        while ($row_pro = mysqli_fetch_array($run_pro)) {

                            $pro_id = $row_pro['p_id'];
                            $pro_title = $row_pro['p_title'];
                            $pro_price = $row_pro['p_price'];
                            $pro_image = $row_pro['p_image'];


                            if ($rowcount == 0) {
                                echo "<div class='row'>";
                            }
                            echo "
                                    <div class='column' >
                                     <div>
                                <center><h5><b>$pro_title</b></h5></center>
                                <p><center><img src='../assets/$pro_image' /></center></p>
                                <p><center><b>PRICE: INR $pro_price</b></center></p>
                                <center><form method='POST'><button type='submit' style='float:center; padding-top:10px;  border: 1px solid #FB8F3D; 
                           background: -webkit-linear-gradient(top, #FDA251, #FB8F3D);
                           background: -moz-linear-gradient(top, #FDA251, #FB8F3D);
                           background: -ms-linear-gradient(top, #FDA251, #FB8F3D);height:30px;
                           width: 182px;
                           padding: 0px;
                           ' name='add_cart' value='$pro_id' >+Cart</button></form></center><br><br>
                        </div>
                         </div>";
                            $rowcount++;
                            if ($rowcount == 3) {
                                echo "</div>";
                                $rowcount = 0;
                            }
                        }
                    }
                    ?>
                </div>
                <br>
                <br>


            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->

                    <p><img src="../assets/logo.svg" alt="HYM"></p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->


                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Men</a>
                        </li>
                        <li>
                            <a href="#!">Women</a>
                        </li>
                        <li>
                            <a href="#!">Kids</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

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
    <?php
    function getIp()
    {
        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $ip;
    }


    if (isset($_POST['add_cart'])) {
        if (isset($_SESSION['email'])) {
            global $con;

            $ip = getIp();

            $e = $_SESSION['email'];
            $pro_id = $_POST['add_cart'];
            $check_pro = "select * from cart where p_id='$pro_id' and email='$e'";

            $run_check = mysqli_query($con, $check_pro);


            if (mysqli_num_rows($run_check) > 0) {
                echo "<script> alert('Item already added in the cart!!!!') </script>";
            } else {

                $insert_pro = "insert into cart (p_id,email,qty) values ($pro_id,'$e',1)";

                $run_pro = mysqli_query($con, $insert_pro);

                //echo "<script>window.open('cart.php','_self')</script>";
            }
        } else {
            echo "<script> alert('Please Login')</script> ";
            echo "<script> window.location.assign('signup.php')</script>";
        }
    }
    ?>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>