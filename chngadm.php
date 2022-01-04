<?php
session_start();
		$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
		$passwordold = "";
		$qry = "SELECT * FROM admin  WHERE admin_email = '$_SESSION[admin_email]'";
		$result = mysqli_query($conn,$qry) or die("query failed");
		while($row = mysqli_fetch_assoc($result)){
			$passwordold = $row['admin_password'];
		}	
		if($passwordold == $_POST['passwordold']){
			$qry = "UPDATE admin SET admin_password = '$_POST[passwordnew]' WHERE admin_email = '$_SESSION[admin_email]'";
			$result = mysqli_query($conn,$qry) or die("query failed");
		
?>
<script type="text/javascript">
	alert("Password has successfully updated...");
	window.location.href = "viewAdminpro.php";
</script>
<?php } else { ?>

<script type="text/javascript">
	alert("Password not updated wrong password...");
	window.location.href = "chngAdmPass.php";
</script>
<?php } ?>