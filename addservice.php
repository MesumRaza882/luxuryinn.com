<?php 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{background-image:linear-gradient(rgba(255,153,0,0.1),rgba(255,153,0,0.1))}
						#butt{
			border-radius: 5px;
			width: 150px;
			height: 40px;
			border:none;
	background-color:rgb(0,31,51,0.5);
	color: black;
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


                <div class="row"><br>
                    <div class="col-md-12">
				<h3 class=" text-center" style="font-size: 25px;
                            background-color: rgba(0,31,51,0.6); padding: 1.5% 0; color: white; border-radius: 10px;
                            "><b>Add New Service</b></h3>
                    </div>
                </div><br>
                <!--Add Data-->

				<form action="saveservice.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
					
						
							
					<div class="form-group">
						
						<!--Title-->
						<label>Service Title</label>
						<input type="text" name="s_title" placeholder="Enter Service Title" class="form-control input-lg" autocomplete="off" id="name" required>
						<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br><br>
						<!--pic-->
						<label>Upload Room's Picture</label>
						<input type="file" name="uploadfile" value=""  class="form-control input-lg" required /><br>
						<!--desc-->
						<label>Description</label>
						<textarea class="form-control input-lg" id="des" placeholder="Enter Room's Description" name="description" rows="3" cols="20"></textarea>
						<span id="desc"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br><br>
						<!--submit-->
						<center><input type="submit" name="save" value="Save" class="btn btn-success hvr-grow" id="butt"></center>
					</div>
				
				</form>

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function validation(){
	var names = document.getElementById('name').value;
	var des = document.getElementById('des').value;
	if(!isNaN(names)){
			document.getElementById('username').innerHTML = "** Digits are not allowed. ";
			return false;
		}
		if((names.length <= 5) || (names.length >= 20)){
			 document.getElementById('username').innerHTML = "** Name must be between 5 to 20.";
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
	}
</script>





















	<div class="col-md-5">
		<br><br>
	</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>