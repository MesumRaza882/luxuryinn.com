<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Room</title>
	<style type="text/css">
		body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
		#but{
			border-radius: 10px;
			width: 130px;
			border:none;
	background-color:rgb(0,31,51,0.5);
	color: white;
}
#but:hover{
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
<?php
require('navbar.php');
?>
<div class="col-md-7" style="margin-left: 5%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner"><br>
                <div class="row">
                    <div class="col-md-12">
				<h3 class=" text-center" style="background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;"><b>Enter New Room</b></h3>
                    </div>
                </div><br>
                <!--Add Data-->
                <div class="row">
                	<div class="col-md-6">
				<form action="savedata.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
							
					<div class="form-group">
						<label>Room No</label>
						<input type="text" name="room_no" id="name" placeholder="Enter Room No" class="form-control input-lg" autocomplete="off" required>
						<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
						<!--Type-->
						<label>Room Type</label>
						<select name="type" class="form-control input-lg" required>
							<option selected disabled>Select Type</option>
							<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "select * from room_type";
					$result = mysqli_query($conn,$qry) or die("query failed");
					while($row=mysqli_fetch_assoc($result)){
							?>
							<option value="<?php echo $row['type_id'];?>"><?php echo $row['type'];?></option>
						<?php } ?>
						</select><br>
						<!--status-->
						<label>Default Status</label>
								<select name="status" class="form-control input-lg">
							<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "SELECT * FROM status WHERE status_id = '0'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					while($row=mysqli_fetch_assoc($result)){
							?>
							<option value="<?php echo $row['status_id'];?>"><?php echo $row['status'];?></option>
							<?php } ?>
						</select><br>
				
						<!--Room Pic-->
						<label>Upload Room's Picture</label>
						<input type="file" name="uploadfile" value=""  class="form-control input-lg" required /><br>
					</div>
				</div>
					<div class="col-md-6">
							<!--Rent-->
							<label>Rent</label>
								<select name="rent" class="form-control input-lg" required>
							<option selected disabled>Select Rent</option>
							<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "select * from rent";
					$result = mysqli_query($conn,$qry) or die("query failed");
					while($row=mysqli_fetch_assoc($result)){
							?>
							<option value="<?php echo $row['rent_id'];?>"><?php echo $row['rent'];?></option>
						<?php } ?>
						</select><br>
						<label>Facilities</label>
						<!--Facilities & des-->
						<textarea class="form-control input-lg" id="fac" placeholder="Enter Facilities" name="facilities" rows="3" cols="20"></textarea>
						<span id="faci"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
						<label>Description</label>
						<textarea class="form-control input-lg" id="des" placeholder="Enter Room's Description" name="description" rows="3" cols="20"></textarea>
						<span id="desc"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
						<center>
						<input type="submit" name="save" value="Save" class="btn  hvr-grow btn-lg" id="but"></center>
					</div>
				
				</form>
			</div>
			</div>
		</div>
	</div>
</div>

<script>
	function validation(){
	var name = document.getElementById('name').value;
	var fac = document.getElementById('fac').value;
	var des = document.getElementById('des').value;
	if(isNaN(name)){
			document.getElementById('username').innerHTML = "** Only Numbers are allowed. ";
			return false;
		}
		if((fac.length <= 10) || (fac.length > 100)){
			 document.getElementById('faci').innerHTML = "** Facilities must be between 10 and 100 character.";
			return false;
			
		}
		if((des.length <= 10) || (des.length > 100)){
			 document.getElementById('desc').innerHTML = "** description must be between 10 and 100 character.";
			return false;
			
		}
		if(!isNaN(des)){
			document.getElementById('desc').innerHTML = "** Digits are not allowed.";
			return false;
		}
		if(!isNaN(fac)){
			document.getElementById('faci').innerHTML = "** Digits are not allowed.";
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