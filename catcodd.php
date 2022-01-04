<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DashBoard Admin</title>
	<style>
		body{
		background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
				#butt{
			border-radius: 10px;
			width: 150px;
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
<div class="col-md-5" style="margin-left: 5%;">
<!--page-->
	 <div id="page-wrapper">
            <div id="page-inner">


                <div class="row"><br>
                    <div class="col-md-12">
                       <h3 class="text-primary text-center"  style="font-size: 25px;
							background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
							"><b>Update Room Category</b></h3>
                    </div>
                </div><br>
		
						<?php 
						
			$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
			$type_id=$_GET["id"];
					$qry = "SELECT * FROM room_type where type_id = '$type_id'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
							
							?>
								<form action="editcodecat.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
								
								<div class="form-group">
									
									<input type="hidden" name="type_id"  class="form-control" value="<?php echo $row['type_id'];?>"><br>


									<label>Room Type</label>
									<input type="text" name="type" id="name"  class="form-control input-lg" autocomplete="off" value="<?php echo $row['type'];?>"><br>
									<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
								
									<center>
									<input type="submit"  value="Update Now" class="btn btn-lg" id="butt">
								</div>
							
							</center>
							</form>
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


<script type="text/javascript">
	function validation(){
	var names = document.getElementById('name').value;
	if(!isNaN(names)){
			document.getElementById('username').innerHTML = "** Digits are not allowed. ";
			return false;
		}
		if((names.length <= 5) || (names.length >= 20)){
			 document.getElementById('username').innerHTML = "** Name must be between 5 to 20.";
			return false;
			
		}
	}
</script>