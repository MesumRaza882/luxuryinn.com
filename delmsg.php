
<?php
				$email = $_GET['did'];
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$qry = "DELETE  FROM message WHERE email = '$email' ";
					$result = mysqli_query($conn,$qry) or die("query failed1");

?>
<script type="text/javascript">
	alert("Message Has Deleted by You!");
	window.location.href = "index.php";
</script>



















