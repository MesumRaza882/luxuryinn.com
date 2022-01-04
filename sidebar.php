<?php
$conn = mysqli_connect("localhost","root","","hotel") or die("Connection Failed");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Hotel MS</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap.min.js">
	<link rel="stylesheet" href="hover.css">
	<link rel="stylesheet" href="animate.css">
	<!---->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
#sidebar{
	height: 100%;
	background-color: #0099cc;
	position:fixed;
	left: 83%;
	top:12%;
}
</style>
</head>
<body>
	<div class="row">
		
	<div class="col-md-2" id="sidebar"><br>
		<h3 style="display: inline; color: white;">Welcome<span style="font-size: 25px;"><i class="glyphicon glyphicon-heart"></i></span><br><?php echo $_SESSION['admin_name']?></h3><br><br>
		<center><img class="img-circle" width="100" height="100" src="<?php echo $_SESSION['admin_pic']?>"></center>
		<br><br>
		<button class="btn btn-warning" data-toggle="collapse" data-target="#rooms" id="roombtn">Room</button><br><br>
		<div id="rooms" class="collapse">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="rooms.php" class="btn btn-warning">View All Rooms</a><br><br>
					<a href="" class="btn btn-warning">Add New Rooms</a>
				</div>
			</div>
		</div>
		<!--Room Types-->
		<button class="btn btn-warning" data-toggle="collapse" data-target="#types" id="typebtn">Room Type</button><br><br>
		<div id="types" class="collapse">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="single_ac_room.php" class="btn btn-warning">Single-Ac-Room</a><br><br>
					<a href="" class="btn btn-warning">Double-Ac-Room</a>
				</div>
			</div>
		</div>
</div>
		</div>



<script>
	document.getElementById("roombtn").addEventListener("click",function(){
		document.getElementById("types").style.display="none";
		document.getElementById("rooms").style.display="block";
		
	});
		document.getElementById("typebtn").addEventListener("click",function(){
		document.getElementById("rooms").style.display="none";
		document.getElementById("types").style.display="block";
		
	});
	
</script>

</body>
</html>