<?php include('home.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/pages/index.css">

    <title>HYM</title>
</head>

<body>
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
                    <a class="nav-link" href="women.php
                    ">Women</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Wishlist</a>
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

    <?php
                        $con = mysqli_connect('localhost:3306','root','','test');
                        global $con;

                            if(isset($_GET['search'])){

                                $search_query = $_GET['user_query'];


                                //$get_pro = "select m.p_id, m.p_title, m.p_price, m.p_image,w.p_id, w.p_title, w.p_price, w.p_image from product_men as m , product_women as w where p_keyword like '%$search_query%'";
                                $get_pro = "select * from product_men where p_keyword like '%$search_query%' union all select * from product_women where p_keyword like '%$search_query%'";
                                $run_pro = mysqli_query($con, $get_pro);
                                $rowcount = 0;

                                while( $row_pro=mysqli_fetch_array($run_pro)){
                    
                                    $pro_id = $row_pro['p_id'];
                                    $pro_title = $row_pro['p_title'];
                                    $pro_price = $row_pro['p_price'];
                                    $pro_image = $row_pro['p_image'];
                                    
                                    echo "
                                        <style>
                                        .one, .two, #carousel-example-1z
                                        {   
                                            display: none;
                                        }
                                        .row {
                                            display: -ms-flexbox; /* IE10 */
                                            display: flex;
                                            -ms-flex-wrap: wrap; /* IE10 */
                                            flex-wrap: wrap;
                                            padding: 0 4px;
                                          }
                                          
                                          /* Create four equal columns that sits next to each other */
                                          .column {
                                            -ms-flex: 33%; /* IE10 */
                                            flex: 33%;
                                            max-width: 33%;
                                            padding: 0 4px;
                                          }
                                          
                                          .column img {
                                            margin-top: 8px;
                                            vertical-align: middle;
                                            width: 50% !important;
                                          }
                                          
                                          /* Responsive layout - makes a two column-layout instead of four columns */
                                          @media screen and (max-width: 800px) {
                                            .column {
                                              -ms-flex: 50%;
                                              flex: 50%;
                                              max-width: 50%;
                                            }
                                          }
                                          
                                          /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
                                          @media screen and (max-width: 600px) {
                                            .column {
                                              -ms-flex: 100%;
                                              flex: 100%;
                                              max-width: 100%;
                                            }
                                          }
                                        
                                        
                                        </style>
                                        
                                     

                                ";
                                if ($rowcount == 0) {
                                    echo "<div class='row' style='background:#FFFDF5;'>";
                                }
                                echo "
                                
                                        <div class='column' >
                                        <br>
                                         <div><center>
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
                            </div></center>
                             </div>";
                                $rowcount++;
                                if ($rowcount == 3) {
                                    echo "</div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    ";
                                    $rowcount = 0;
                                }
                                }
                                
                            }
                ?>
                </div>

    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" data-interval=2500>
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <img class="d-block w-100" src="../assets/C_2.jpg" style="height: 350px;" alt="First slide">
            </div>
            <!--/First slide-->
            <!--Second slide-->
            <div class="carousel-item">
                <img class="d-block w-100" src="../assets/C_3.jpg" style="height: 350px;" alt="Second slide">
            </div>
            <!--/Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
                <img class="d-block w-100" src="../assets/C_1.jpg" style="height: 350px;" alt="Third slide">
            </div>
            <!--/Third slide-->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <br>
    <br>

    <!--/.Carousel Wrapper-->

    <div class="one" style="background: rgb(213, 246, 248);">
        <br>
        <div class="container-fluid">

            <div class="container">
                <div class="container-fluid">
                    <center>
                        <h3 style="font-family: Cinzel;color: #44004A; "><img src="../assets/clock.png" style="margin-top: -0.7%;margin-right: 0.5%" alt=""> DEALS OF THE DAY ! <a href="#" style="float: right; font-size: 14px;margin-top: 0.5%;font-family:sans-serif ; text-decoration: none;color: #002366;">View
                                More
                                >></a></h3>
                    </center>
                    <br>
                    <div class="row">
                        <div class="column">
                            <a href=""><img src="../assets/DOD_1.jpg" style="width:100%;" alt="img1"></a>


                        </div>
                        <div class="column">
                            <a href=""><img src="../assets/DOD_2.jpg" style="width:100%" alt="img1"></a>
                            <a href=""><img src="../assets/DOD_3.jpg" style="width:100%;height: 25%;" alt="img1"></a>
                            <a href=""><img src="../assets/DOD_4.jpg" style="width:100%" alt="img1"></a>


                        </div>
                        <div class="column">
                            <a href=""><img src="../assets/DOD_5.jpg" style="width:100%" alt="img1"></a>

                            <a href=""><img src="../assets/DOD_6.jpg" style="width:100%;height: 25%;" alt="img1"></a>
                            <a href=""><img src="../assets/DOD_7.jpg" style="width:100%" alt="img1"></a>

                        </div>
                        <div class="column">
                            <a href=""><img src="../assets/DOD_8.jpg" style="width:100%" alt="img1"></a>
                            <a href=""><img src="../assets/DOD_9.jpg" style="width:100%;height: 34%;" alt="img1"></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="two" style="background: rgb(255, 250, 238);">
        <br>
        <div class="container-fluid">
            <div class="container">
                <div class="container-fluid">
                    <center>
                        <h3 style="font-family: Cinzel;color: #44004A; "><img src="../assets/lightning.png" style="margin-top: -0.7%;margin-right: 0.5%" alt=""> WHAT'S NEW ! <a href="#" style="float: right; font-size: 14px;margin-top: 0.5%;font-family:sans-serif ; text-decoration: none;color: #002366;">View
                                More
                                >></a></h3>
                    </center>
                    <br>
                    <div class="row">
                        <div class="column">
                            <a href=""><img src="../assets/WN_1.jpg" style="width:100%;" alt="img1"></a>


                        </div>
                        <div class="column">
                            <a href=""><img src="../assets/WN_2.jpg" style="width:100%" alt="img1"></a>
                            <a href=""><img src="../assets/WN_3.jpg" style="width:100%;height: 25%;" alt="img1"></a>
                            <a href=""><img src="../assets/WN_4.jpg" style="width:100%" alt="img1"></a>


                        </div>
                        <div class="column">
                            <a href=""><img src="../assets/WN_5.jpg" style="width:100%" alt="img1"></a>

                            <a href=""><img src="../assets/WN_6.jpg" style="width:100%;height: 25%;" alt="img1"></a>
                            <a href=""><img src="../assets/WN_7.jpg" style="width:100%" alt="img1"></a>

                        </div>
                        <div class="column">
                            <a href=""><img src="../assets/WN_8.jpg" style="width:100%" alt="img1"></a>
                            <a href=""><img src="../assets/WN_9.jpg" style="width:100%;height: 34%;" alt="img1"></a>

                        </div>
                    </div>
                </div>
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
                            <a href="mens.php">Men</a>
                        </li>
                        <li>
                            <a href="women.php">Women</a>
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
                            <a href="signup.php">Sign In</a>
                        </li>
                        <li>
                            <a href="cart.php">My shopping Cart</a>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>