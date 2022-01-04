<?php
session_start();
		$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
		$passwordold = "";
		$qry = "SELECT * FROM guest  WHERE guest_email = '$_SESSION[guest_email]'";
		$result = mysqli_query($conn,$qry) or die("query failed");
		while($row = mysqli_fetch_assoc($result)){
			$passwordold = $row['guest_password'];
		}	
		if($passwordold == $_POST['passwordold']){
			$qry = "UPDATE guest SET guest_password = '$_POST[passwordnew]' WHERE guest_email = '$_SESSION[guest_email]'";
			$result = mysqli_query($conn,$qry) or die("query failed");
		
?>
<script type="text/javascript">
	alert("Password has successfully updated...");
	window.location.href = "index.php";
</script>
<?php } else { ?>

<script type="text/javascript">
	alert("Password not updated wrong password...");
	window.location.href = "chnguserpass.php";
</script>
<?php } ?>