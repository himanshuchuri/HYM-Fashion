
<?php


	$con = mysqli_connect('localhost:3306','root','');
	
	/*if($con){
		echo "Connection sucesfull";
	}else{
		echo "Not connected";
	}
	*/
    mysqli_select_db($con, 'test');
    if(isset($_POST['login'])){
    $username = $_POST['loginEmail'];
	$password = $_POST['loginPassword'];
    echo $username;

	$q = "select * from user where email = '$username' && password = '$password'";
	$result = mysqli_query($con, $q);
	$num = mysqli_num_rows($result);
	if($num == 1){
        setcookie('email',$username, time()+60*60*7);
        session_start();
        $_SESSION['email']=$username;
    echo "<script> alert('login succesfully! Welcome $username ')</script> ";	
    //echo "<script> window.location.assign('index.php')</script>";	
    header("location: index.php");
	}
	else{
        echo "<script> alert('invalid login')</script>";
        echo "<script> window.location.assign('login.php')</script>";
    }
}
?>

<html>

<head>
    <title></title>
    <meta content="">
    <style>
        .body {
            width: 100vw;
            height: 100vh;
            background: #ffffff;
        }

        .header {
            height: 7vh;
            background: #f6d6f9;
            width: 100vw;
        }

        .primary_button {
            border-radius: 20px;
            color: white;
            background: #002366;
            padding-bottom: 10px;
            padding-top: 10px;
            width: 100%;


            border-width: 0px;
        }

        .main_holder {
            height: 93vh;
            width: 100vw;
            padding: 10px;
            background: #FEFDFD;
        }

        #loginEmail {
            background: white;
        }

        #loginPassword {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        #header_logo {
            height: 7vh;
            padding: 2px;
            margin: 0px;
        }

        @media (min-width: 576px) {
            #welcome_gif {
                width: 80%;
            }

            #email_holder {
                display: block;
                margin-left: 15vw;
                margin-right: 15vw;
            }
        }

        @media (min-width: 992px) {
            #welcome_gif {
                width: 30%;
            }

            #email_holder {
                display: block;
                margin-left: 30vw;
                margin-right: 30vw;
            }
        }
    </style>
    <link rel="stylesheet" href="../css/font_awesome.css">
    <link href="../css/bootstap431.css" rel="stylesheet">
    <link href="../css/mdbootrsap481.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

</head>

<body class="body" style="font-family:Lato;">


    <div class="header shadow">
       <a href="index.php"> <img class="img-fluid" id="header_logo" src="../assets/logo.png" /></a>
    </div>

    <div class="main_holder">
        <div style="text-align: center;background: #FEFDFD;">
            <img class="img-fluid" id="welcome_gif" src="../assets/welcome.gif" />
        </div>
        <form method="POST">

            <div class="form-group" id="email_holder">
                <h4 for="exampleInputEmail1"><b>Login Now</b></h4>
                <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp"
                    placeholder="Enter Email ID">
                <small id="emailHelp" class="form-text text-muted">Never share your password with anyone else.</small>

                <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Enter Password">
                <br>
                <button type="submit" class="primary_button" name="login">Get
                        In.</button>
            </div>
        </form>

    </div>





    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap431.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdbootstrap480.js"></script>
    <script type="text/javascript" src="../js/login.js"></script>

</body>

</html>
