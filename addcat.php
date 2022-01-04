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
	color: purple;
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
                            "><b>Enter New Room Category</b></h3>
                    </div>
                </div><br>
                <!--Add Data-->

				<form action="savedatacat.php" onsubmit="return validation()" method="post" enctype="multipart/form-data">
					
						
							
					<div class="form-group">
						
						<!--Type-->
						<label>Category Type</label>
						<input type="text" name="type" placeholder="Enter Type" class="form-control input-lg" autocomplete="off" id="name" required><br>
						<span id="username"  style="font-weight: bold; color: white; background-color: red; font-size: 13px;"></span><br>
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





















	<div class="col-md-5">
		<br><br>
	</div>
	<div class="col-md-1"></div>
</div>
</body>
</html>