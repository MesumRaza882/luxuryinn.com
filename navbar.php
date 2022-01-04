<?php
$conn = mysqli_connect("localhost","root","","hotel") or die("Connection Failed");
	session_start();
	if(!isset($_SESSION["admin_email"])){
		header("Location: admin_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap.min.js">
	<link rel="stylesheet" href="hover.css">
	<link rel="stylesheet" href="animate.css">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
#nav1{
	background-color:rgb(0,31,51,0.9);
	border-bottom: 3px groove #ff6600;
	padding-top: 1%;
}
#nav1 a,#nav2 a{
	color: white;
	font-family: cursive;
	font-size: 15px;
}
#nav2{

	background-color:rgb(0,31,51,0.9);
	padding:10px 5px;
	position: relative;
	top: 5px;
	border-top-right-radius: 30px;
	
}
#nav2 a:hover{
	background-color: white;
	color:#ff9900;
	font-weight: bold; 
	border-top-right-radius: 25px;
	border-bottom-left-radius: 25px;
	transition: 0.5s ease;
}
#nav2 li {
	padding: 4% 0 4% 1%;
}
#rightnav li a{
	color: orange;
}
#rightnav li a:hover{
	background-color: #0099cc;
	color: white;
}
.count{
		
		border-radius: 50px;
		position: relative;
		top: -10px;
		left: -2px;
	}
</style>
</head>
<body>
	<br>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="nav1">
        	<div class="container-fluid">
            <div class="navbar-header">
            	<a class="navbar-brand" href="#" style="font-size: 23px; margin-left: ;">LUXURY INN </a>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavmain">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            </div>
            <div class="collapse navbar-collapse" id="mynavmain">

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" >My Profile <span class="caret"></span></a>
				<ul class="dropdown-menu" id="rightnav">
			<li><a href="viewAdminpro.php">View profile</a></li>
			<li><a href="updateadmin.php">Edit profile</a></li>
			<li><a href="chngAdmPass.php">Change password</a></li>
		</ul>
	</li>
	<!--User detail-->
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" >User<span class="caret"></span></a>
		<ul class="dropdown-menu" id="rightnav">
			<li><a href="addnewuser.php">Register New User</a></li>
			<li><a href="viewuser.php">View All Users</a></li>
		</ul>
	</li>
	<li>
      <a href="logout_admin.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a><br>
                    </li>
                    <li></li>
		</ul>
	</div>
	</div>
        </nav><br><br><br>
        <!--/. NAV TOP  -->
        
        	<div class="col-md-2">
        <nav class="navbar-default navbar-side" role="navigation" id="nav2">
            <div class="sidebar-collapse">
            	<br>
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active" href="admin_dashboard.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-bookmark"></i> Status</a>
                    </li>
                    <li>
                        <a href="rooms.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-book"></i> Rooms</a>
                    </li>
					<li>
                <a href="roombook.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-folder-open"> </i> Room Booking</a>
                    </li>
                    <li>
                        <a href="Categories.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-stats"></i> Room Categories</a>
                    </li>
                    <li>
                        <a  href="guest.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-user"></i> Guest</a>
                    </li>
                     <li>
                        <a  href="services.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-user"></i> Services</a>
                    </li>
                     <li>
                        <a  href="report.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-user"></i> Report</a>
                    </li>

                     <?php 
        $conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
						$qry = "SELECT count(id) AS total FROM feedback WHERE status = '0' ";
						$result = mysqli_query($conn,$qry) or die("query failed");
						$values = mysqli_fetch_assoc($result);
						$num_rows = $values['total'];

        ?>
                    <li>
                        <a href="feedbackdisplay.php"><i style="margin-right: 2%;" class="glyphicon glyphicon-edit"></i> Feedback
                        	<span class="badge badge-danger count" style="<?php if($num_rows>0)echo "background-color: red;";?>"><?php echo $num_rows; ?></span>
					
                        </a><br>
                    </li>
                    <br>
					</ul>

            </div>
        </nav>
    </div>

</body>
</html>