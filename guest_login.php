<!DOCTYPE html>
<html>
<head>
    <title>DashBoard Admin</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap.min.js">
    <link rel="stylesheet" href="hover.css">
    <link rel="stylesheet" href="animate.css">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<style type="text/css">
    *{
        padding: 0px;
        margin: 0px;
    }
    #main{
    background-color:rgb(0,31,51,0.8);
    }
    #notif{
        color: red; 
        font-size: 25px; 
        background-color: white; 
        padding: 15px 80px;
        box-sizing: border-box;
        border:1px solid red;
        border-radius: 5px;
        display: none;
    }
    .input-group-addon{
    background-color:transparent;
    color: white;
    border:none;
    
}
.form-control{
    background: transparent;
    border-radius: 0px;
    border:0px;
    border-bottom: 1px solid white;
    color: orange;
    margin-top: 7px;
    padding:7px;

}

</style>
<!--//fonts-->
</head>
<body>


<!--work-->

<br><br>
<div class="row" id="main">
    <br><br>
	<div class="col-md-1"></div>
	<!--Image-->
	        <div class="col-md-4" ><br><br><br>
                <img src="b.jpg" id="chngimg" class="img-thumbnail">
            </div>
       
		
	
	<!--form -->
	<div class="col-md-5">
		<center>
	<br><h2 style="color: orange;">Welcome</h2><br>
	<form action=""  method="post"  autocomplete="off">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="guest_email" required  class="form-control input-lg" placeholder="Enter Your E-mail" autocomplete="off">
		</div><br><br>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
			<input type="password" name="guest_password" class="form-control input-lg" placeholder="Enter password">
	</div><br><br>
	<input type="submit" style="color: orange; width: 150px; font-weight: bold;" name="login_btn" class="btn btn-lg " value="LogIn">
	</form>
    <br>
    <a href="register.php" class="btn" style="color: white;">Create new account...?</a>
        <br><br>
	<span id="notif" ></span><br><br><br><br><br><br><br><br><br>
</center>
	</div>
    <div class="col-md-1"></div>
    </div>

<!--php-->
<?php
    session_start();
    if(isset($_POST["login_btn"]))
    {
        $conn = mysqli_connect("localhost","root","","hotel") or die("failed Connect");
        $email = $_POST["guest_email"];
        $pass = $_POST["guest_password"];
        $qry = "SELECT * FROM guest WHERE guest_email='$email'";
        $result = mysqli_query($conn,$qry) or die("query1 failed");
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){

                if($row['guest_email'] == $email){
                            if($row['guest_password'] == $pass){
                                $_SESSION['guest_name'] = $row['guest_name'];
                                $_SESSION['guest_email'] = $row['guest_email'];
                                $_SESSION['guest_contact'] = $row['contact_no'];
                                header("location:index.php");
                            }
                            else{
                                ?>
                                <script>
                                document.getElementById('notif').innerHTML = "Password Not Matched";
                                 document.getElementById('notif').style.display = "block";
                                </script>
                                <?php
                            }
                        }

                    }
                }
                else{
                    ?>
                        <script>
                            document.getElementById('notif').innerHTML = "Record Not Found";
                             document.getElementById('notif').style.display = "block";
                         </script>
                    <?php
                }
                    }
                    ?>
                    
</body>
</html>


