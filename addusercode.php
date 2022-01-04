<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$name = $_POST['name'];
					$email = $_POST['email'];
					$password = $_POST['Password'];
				
					$filename = $_FILES["uploadfile"]["name"];
					$tempname = $_FILES["uploadfile"]["tmp_name"];
					$folder = "adminpic/".$filename;
					move_uploaded_file($tempname,$folder);

					$qry = "select * from admin where admin_email = '$email'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						echo "<h1>Already Exist Record!</h1>";
					}
					else{
						$qry2 = "INSERT INTO admin VALUES('','$name','$email','$password','$folder')";
						$result = mysqli_query($conn,$qry2) or die("query failed2");
					}
?>
<script type="text/javascript">
	alert("Successfully Added User.....");
	window.location.href = "addnewuser.php";
</script>