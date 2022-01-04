<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DashBoard Admin</title>
	<style>
		body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
				#butt{
			border-radius: 10px;
			width: 130px;
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
</head>
<body>

<div class="row">
<?php
require('navbar.php');
?>
<div class="col-md-9" >
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                       <h3 class="text-primary text-center"  style="font-size: 25px;
							background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
							"><b>Update Room Record</b></h3>
                    </div>
                </div><br>
		
						<?php 
						$img ="";
			$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
			$room_no=$_GET["id"];
					$qry = "SELECT * FROM room INNER JOIN room_type ON room.type_id=room_type.type_id INNER JOIN status ON room.status_id=status.status_id INNER JOIN rent ON room.rent_id = rent.rent_id where room_no = '$room_no'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
							$img = $row['image'];
							?><div class="row" style="margin-left: 1%;">
								<div class="col-md-6">
								<form action="editcode.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
								
								<div class="form-group">
									<label>Room No</label>
									<input type="text" name="room_num"  class="form-control" value="<?php echo $row['room_no'];?>" readonly/><br>


									<?php
									$qry1 = "select * from room_type";
									$result1 = mysqli_query($conn,$qry1) or die("query failed");
									if(mysqli_num_rows($result1)>0){
										echo '
										<label>Room Type</label>
										<select name="type" class="form-control">';
									while($row1=mysqli_fetch_assoc($result1)){

										if($row['type_id']==$row1['type_id']){
											$select = "selected";
										}
										else{
											$select = "";
										}

										echo "<option {$select} value='{$row1['type_id']}'>{$row1['type']}</option>";
									}
										echo ";</select><br>";
									}
									?>
									<label>Status</label>
									<input type="text" name="status"  class="form-control" value="<?php echo $row['status'];?>" readonly/><br>
								
									<!--image-->
									<label>Image Change<small> **File must be Selected**</small></label>
									<input type="file" name="uploadfile" required class="form-control" value="<?php echo $row['image'];?>"/><br>
									<!--rent-->
									<label>Rent</label>
										<?php
									$qry1 = "select * from rent";
									$result1 = mysqli_query($conn,$qry1) or die("query failed");
									if(mysqli_num_rows($result1)>0){
										echo '<select name="rent" class="form-control">';
									while($row1=mysqli_fetch_assoc($result1)){

										if($row['rent_id']==$row1['rent_id']){
											$select = "selected";
										}
										else{
											$select = "";
										}

										echo "<option {$select} value='{$row1['rent_id']}'>{$row1['rent']}</option>";
									}
										echo ";</select><br>";
									}
									?>
									<!--facilities-->
									<label>Faciliies</label>
									<textarea name="facilities" id="fac" class="form-control" rows="4" cols="20"><?php echo $row['facilities'];?></textarea>
									<span id="faci"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br><br>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<center><img class="img-circle" height="300" width="300" src="<?php echo $img ;?>"></center><br><br>
									<label>Description</label>
									<textarea name="description" id="des" class="form-control" rows="4" cols="20"><?php echo $row['description'];?></textarea>
									<span id="desc"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br><br>

									<center>
									<input type="submit"  value="Update Now" id="butt" class="btn hvr-grow btn-lg">
								</div>
							</div>
						</div>
							</center>
							</form>
						</div>
				<?php  
				}
				}
				?>
	</div>
	</div>
</div>

</div>

</body>
</html>

<script>
	function validation(){
	
	var fac = document.getElementById('fac').value;
	var des = document.getElementById('des').value;
	
		if((fac.length <= 10) || (fac.length > 100)){
			 document.getElementById('faci').innerHTML = "** Facilities must be between 10 and 100 character.";
			return false;
			
		}
		if((des.length <= 10) || (des.length > 100)){
			 document.getElementById('desc').innerHTML = "** description must be between 10 and 100 character.";
			return false;
			
		}


	}
</script>