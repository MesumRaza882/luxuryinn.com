<!DOCTYPE html>
<html>
<?php
include('db.php');
$conn = mysqli_connect("localhost","root","","hotel") or die("Connection Failed");
    session_start();
    if(!isset($_SESSION["guest_email"])){
    if(!isset($_SESSION["guest_name"])){
        ?>
        <script>alert("You have to Login First!");
        window.location.href = "guest_login.php";
        </script>
        <?php
    }
}
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
</head>
<body>
<?php
$otype = $_GET['otype'];
?>
<div class="row">

<div class="col-md-12">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">

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
                    <h1><a class="navbar-brand" href="index.php">LUXUTY <span>INN</span><p class="logo_w3l_agile_caption">Your Dreamy Resort</p></a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                
            </nav>

        </div>
    </div><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <div class="container">
                            <b><span class="page-header" style="font-size: 25px;">
                            <?php echo $otype;?>
                        </span></b>&nbsp;
                    </div>
                        </div>
                        <div class="col-md-5"></div>
                        
                </div><br>
                <!--View Rooms-->
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6">
                        <div class="container">
                                <?php

                    $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
                    $qry = "SELECT * FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id WHERE type='$otype' ORDER BY status ASC, room_no ASC";
                    $result = mysqli_query($conn,$qry) or die("query failed");
                    if(mysqli_num_rows($result)>0){
                        ?>
                        <table class="table table-bordered table-condensed" id="tab2">
                            <tr>
                                <th>Room No</th>
                                <th>Image</th>
                                <th>Room Type</th>
                                <th>Status</th>
                                <th>Rent</th>
                                <th>Facilities</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                        }else{
                        ?>
                        <br>
                        <div class="alert alert-danger">No Room Available for Booking</div>
                        <?php
                        }


                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                                
                                <td><?php echo $row['room_no']; ?></td>
                                <td><img width="70" height="70" class="img-thumbnail bg-info" src="<?php echo $row['image'];?>"></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php 
                                if($row['status_id']==0 and $row['f_status_id']==0)
                                    {echo "Available";}
                                elseif($row['status_id']==1 and $row['f_status_id']==0)
                                    {echo "Reserved";}
                                else
                                    {echo "Booked";}


                                 ?></td>
                                <td><?php echo $row['rent']; ?></td>
                                <td><?php echo $row['facilities']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    
                                    
                                   <a id="action" style="color: white;" class="btn 
                                   <?php if($row['status_id']==0 and $row['f_status_id']==0){
                                    echo "btn-success";
                                   }
                                   elseif($row['status_id']==1 and $row['f_status_id']==0){
                                    echo "btn-primary";
                                   }
                                   else{
                                    echo "btn-danger";
                                   }

                                    ?>


                                    <?php if($row['status_id']==0){echo "active";}
                                    else{echo "disabled";} 

                                    ?>
                                    " 



                                    href="bookingfromuser.php?id=<?php echo $row['room_no']."&otp=$otype"?>" style="color: #0099cc;"><?php 
                                    if($row['status_id']==0 and $row['f_status_id']==0){
                                    echo "Available";
                                   }
                                   elseif($row['status_id']==1 and $row['f_status_id']==0){
                                    echo "Reserved";
                                   }
                                   else{
                                    echo "Book";
                                   }
                                    ?></a>

                                    
                                    
                                                            
                            </tr>
                            <?php } ?>
                        </table>
                        </div>
                    </div>
                </div>


</div>
</div>

</body>
</html>