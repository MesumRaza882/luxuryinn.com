<!DOCTYPE html>
<html>
<head>
	<style>
		body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
			#butt{
			border-radius: 5px;
			width: 150px;
			height: 40px;
			line-height: 25px;
			border:none;
	background-color:rgb(0,31,51,0.5);
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
	<title>DashBoard Admin</title>
</head>
<body>
<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" style="margin-left: 5%;">
<!--page-->


                <div class="row"><br>
                	<div class="col-md-1"></div>
                    <div class="col-md-7">
   <?php
$name = "";
$email = "";
$password = "";
$pic="";
		$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
		$qry = "SELECT * FROM admin WHERE admin_email = '$_SESSION[admin_email]'";
		$result = mysqli_query($conn,$qry) or die("query failed");
		while($row = mysqli_fetch_assoc($result)){
			$name = $row['admin_name'];
			$email = $row['admin_email'];
			$password = $row['admin_password'];
			$pic = $row['admin_pic'];

		}
					
?>
<center>
<h2 style="font-size: 25px;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            ">Admin Detail</h2><br>
<img width="150" height="150" class="img-circle  animated fadeInLeft" src="<?php echo $pic  ?>">
</center>
	<form action="" method="post"><br>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" disabled value="<?php echo $name;?>">
				<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" disabled value="<?php echo $email;?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control" disabled value="<?php echo $password;?>">
		</form><br><br>
		<center><a href="updateadmin.php" id="butt" class="btn">Click For Update</a></center>
  		</div>
  		
	</div>

</div

</body>
</html>