<!DOCTYPE html>
<html>
<head>
	<title>New Account!</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap.min.js">
	<link rel="stylesheet" href="hover.css">
	<link rel="stylesheet" href="animate.css">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<style>
	*{
		padding: 0px;
		margin: 0px;
		font-family: new time roman;
	}


body{
	background-color:rgb(0,31,51,0.8);
}
#main{
	
}
#form-container{
	border-radius: 10px;
	border: 1px solid white;
	margin:1.5% 0 1% 0;
	box-shadow: 1px 1px  10px #ffffcc;


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
	color: white;
	margin-top: 7px;
	padding:7px;

}
form{
	padding: 0 10px;
	box-sizing: border-box;
	background:transparent;
	
}
option{
	color: black;
}
#but,#but2{
border-radius: 10px;
width: 90px;
border:none;
}
#but:hover, #but2:hover{
	font-weight: bold;
	background-color: #ff9900;
	color: white;
}
#but3{
	color: white;
	background-color: #ff9900;
	margin: 2.5%;
	width: 100px;

}
p.logo_w3l_agile_caption {
    text-transform: uppercase;
    letter-spacing: 5.7px;
    font-size: 11px;
    color: #c79f07;
    text-shadow: 0px 1px 3px #454a47;
    font-family: 'Lato', sans-serif;
    font-weight: 600;
}
#leftside{
	margin: 5% 0 0 1%;
	background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(lft.jpeg);
	background-size: cover;
	background-repeat: no-repeat;
	height: 500px;
	border:none;
	box-shadow: 2px 2px 6px white;
}
</style>
<body>


	<div class="row" style="margin-left: 3%;">
		<div class="col-md-1"></div>
		<div class="col-md-5" id="leftside">
			<br><br><br><br><br><br><br><br><br>
			<h1 class="text-center"><a href="index.php"><span style="color: white; font-size: 48px;">LUXURY </span> <span style="color: orange; font-size: 47px;">INN</span><p class="logo_w3l_agile_caption">A BEST HOTEL</p></a></h1><br>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-4" id="form-container"><br>
			<span style="color: #ffce14; font-size: 35px; margin:0  20% 0 5%; border-bottom: 1px solid white; padding-bottom: 7px;">User Registeration</span>
			<span class="glyphicon glyphicon-pencil" style="color: white; font-size: 27px;"></span>
			<br><br>
			<!--form-->
			<form action="addnewguest.php" onsubmit="return validation()" method="post" enctype="multipart/form-data" autocomplete="off">
								
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input type="text" name="name" id="name" required  class="form-control input-lg" placeholder="Enter Your Name" autocomplete="off">
			<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span>
		</div><br>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			<input type="email" name="email" id="mail" required  class="form-control input-lg" placeholder="Enter Your E-mail" autocomplete="off">
			<span id="usermail"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span>
		</div><br>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input type="password" name="password" id="pass" required  class="form-control input-lg" placeholder="Enter Your Password" autocomplete="off">
			<span id="userpass"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span>
		</div><br>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
			<input type="password" id="cpass" required  class="form-control input-lg" placeholder="Confirm Password" autocomplete="off">
			<span id="usercpass"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span>
		</div><br>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
			<input type="phone" id="phn" name="cn" required  class="form-control input-lg" placeholder="Enter Phone number" autocomplete="off">
			<span id="userphn"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span>
		</div><br>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
				<textarea required class="form-control input-lg" id="add" placeholder="Enter Address" name="address" rows="3" cols="20" autocomplete="off"></textarea>
				<span id="useradd"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span>
				<br>
		</div><br>
						<!--Gender-->
						
						<select name="optradio" class="form-control input-lg" required>
							<option selected disabled>Select Gender</option>
							<option value="Male">Male</option>
							<option value="Fe-Male">Fe-Male</option>
						</select><br>
						<!--city-->
						
						<select name="city" class="form-control input-lg" required>
							<option selected disabled>Select City</option>
							<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "select * from city";
					$result = mysqli_query($conn,$qry) or die("query failed");
					while($row=mysqli_fetch_assoc($result)){
							?>
							<option value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
						<?php } ?>
						</select><br>
						
						<center><input type="submit" name="save" id="but" value="Save" class="btn btn-lg">
							<input type="reset" name="" id="but2" class="btn btn-lg">
						</center>
				</form>				
				<a href="guest_login.php" class="btn" id="but3">Login</a>
			</div>

			
			
		
		<div class="col-md-1"></div>
	</div>
	<script type="text/javascript">
		function validation(){
		var name = document.getElementById('name').value;
		var mail = document.getElementById('mail').value;
		var pass = document.getElementById('pass').value;
		var cpass = document.getElementById('cpass').value;
		var phn = document.getElementById('phn').value;
		var add = document.getElementById('add').value;



		if((name.length <= 2) || (name.length > 20)){
			 document.getElementById('username').innerHTML = "** Name must be between 3 and 20.";
			return false;
			
		}

		if(!isNaN(name)){
			document.getElementById('username').innerHTML = "** Only Characters are allowed. ";
			return false;
		}
		//address

		if((add.length <= 20) || (add.length > 200)){
			 document.getElementById('useradd').innerHTML = "** Address must be between 20 and 200 character.";
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
		//phone number
		if(isNaN(phn)){
			document.getElementById('userphn').innerHTML = "** Characters are not allowed. ";
			return false;
		}
		if(phn.length!=11){
			document.getElementById('userphn').innerHTML = "** Mobile Number must be 11 digits only. ";
			return false;
		}

	}
	</script>


</body>
</html>