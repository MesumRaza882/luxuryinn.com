<!DOCTYPE html>
<html>
<?php
include('db.php');
$conn = mysqli_connect("localhost","root","","hotel") or die("Connection Failed");
    session_start();
    if(!isset($_SESSION["guest_email"])){
    if(!isset($_SESSION["guest_name"])){
    if(!isset($_SESSION['guest_contact'])){
        ?>
        <script>alert("You have to Login First!");
        window.location.href = "guest_login.php";
        </script>
        <?php
    }
}
}
else{$to = $_SESSION["guest_email"];}
?>
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
<!--//fonts-->
 <style>
        
            #butt{
            border-radius: 5px;
            width: 150px;
            height: 40px;
            line-height: 25px;
            border:none;
    background-color:rgb(0,102,0,0.7);
    color: white;
}
#butt:hover{
    background-color: rgba(0,31,51,1);
    color:#ff9900; 
    border-top-right-radius: 25px;
    border-bottom-left-radius: 25px;
    transition: 0.3s ease;
}
</style>
</head>
<body>

<div class="row">

<div class="col-md-12">
<!--page-->

<div class="w3_navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="index.php">LUXURY<span>INN</span><p class="logo_w3l_agile_caption">Your Dreamy Resort</p></a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                
            </nav>

        </div>
    </div>
</div></div><br>
<div class="row">
    <div class="col-md-2"></div>
                    <div class="col-md-6" style="margin-left: 5%;">

                  
            <center><br>
            <h2 style="font-size: 25px;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            ">Alert Message</h2><br>
							  <?php
					 $to = $_SESSION["guest_email"];
                    $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "SELECT * FROM message WHERE email = '$to' and status = '0' ORDER BY id DESC";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <br>
                        <div class="table-responsive" id="table-con">
                    <table class="table table-bordered table-condensed" id="tab2">
                            <tr>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                        } else{ 
						echo "<div class='alert alert-danger'>No Message!</div>";
						}
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                <td><?php echo $row['message']; ?></td>
                               
                                <td>
                                    <a id="action"
                                     href="delusermsg.php?didd=<?php echo $row['id'];?>" style="color: red;"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>                               
                            </tr>
                            <?php } ?>
                        </table>
                    </div>


             </div>
             <div class="col-md-3"></div>
        </div>


</body>
</html>
<script type="text/javascript">
        function validation(){
        
        var pass = document.getElementById('pass').value;

        //password
        if((pass.length <= 5) || (pass.length > 20)){
             document.getElementById('userpass').innerHTML = "** Password must be between 5 and 20.";
            return false;
        }
       
    
    }
    </script>