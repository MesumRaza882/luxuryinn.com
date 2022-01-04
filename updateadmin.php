<?php 
error_reporting(0);
?>
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
	<title>DashBoard Admin</title>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" style="margin-left: 5%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">


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
                            "> Update Admin Detail</h2><br>
<img width="150" height="150" class="img-circle  animated fadeInLeft" src="<?php echo $pic  ?>">
</center>
	<form action="updAdmincode.php"  onsubmit="return validation()"  method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" id="name" name="name" class="form-control"  value="<?php echo $name;?>">
				<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
			</div>
			<div class="form-group">
			<label>Upload Your Picture</label>
						<input type="file" name="uploadfile"   class="form-control" required />
					</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control"  value="<?php echo $email;?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" id="pass" name="password" class="form-control"  value="<?php echo $password;?>">
				<span id="userpass"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span>
				<br>
		<center><button type="submit" id="butt" class="btn">Now Update</button></center>
	</form>
  		</div>
	</div>

</div>
</div>

</body>
</html>
<script type="text/javascript">
		function validation(){
		var name = document.getElementById('name').value;
		var pass = document.getElementById('pass').value;
	



		if((name.length <= 2) || (name.length > 20)){
			 document.getElementById('username').innerHTML = "** Name must be between 3 and 20.";
			return false;
			
		}

		if(!isNaN(name)){
			document.getElementById('username').innerHTML = "** Only Characters are allowed. ";
			return false;
		}
		

		//password
		if((pass.length <= 5) || (pass.length > 20)){
			 document.getElementById('userpass').innerHTML = "** Password must be between 5 and 20.";
			return false;
		}
		if(pass!=cpass){
			document.getElementById('usercpass').innerHTML = "** Password are not matching";
			return false;
		}
	
	}
	</script>