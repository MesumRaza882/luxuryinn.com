<?php
					$_name=$_POST["name"];
					$_ename=$_POST["email"];
					$_pname=$_POST["password"];
					$filename = $_FILES["uploadfile"]["name"];
					$tempname = $_FILES["uploadfile"]["tmp_name"];
					$folder = "adminpic/".$filename;
					move_uploaded_file($tempname,$folder);
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "UPDATE admin SET admin_name='$_name',admin_email='$_ename',admin_password='$_pname', admin_pic='$folder' WHERE admin_email = '$_ename' ";
					$result = mysqli_query($conn,$qry) or die("query failed");
					?>
<script type="text/javascript">
	alert("Data Successfully Updated");
	window.location.href = "viewAdminpro.php";
</script>