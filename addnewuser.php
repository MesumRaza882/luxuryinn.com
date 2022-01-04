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
	<title>Add Room</title>
</head>
<body>

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-7" style="margin-left: 5%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
				<h2 style="font-size: 25px; text-align: center;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            ">Register New Admin</h2><br>
                    </div>
                </div>
                <!--Add Data-->

				<form action="addusercode.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
						<div>
							
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" autocomplete="off" required>
						<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>

						<label>E-mail</label>
						<input type="email" name="email" placeholder="Enter User's Email" class="form-control" autocomplete="off" required><br>

						<label>Password</label>
						<input type="text" name="Password" id="pass" placeholder="Enter Password" class="form-control" autocomplete="off" required>
						<span id="userpass"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>

						<!--Pic-->
						<label>Upload User's Picture</label>
						<input type="file" name="uploadfile" class="form-control" required /><br>

						<center><input type="submit" value="Enter Record" class="btn" id="butt"></center>
				</form>

			</div>
		</div>
	</div>
</div>

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






















	<div class="col-md-5">
		<br><br>
	</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>