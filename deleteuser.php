<?php
$num_rows = "";
$admin_id = $_GET['did'];
$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
$qry = "SELECT count(admin_id) AS total FROM admin";
						$result = mysqli_query($conn,$qry) or die("query failed");
						$values = mysqli_fetch_assoc($result);
						$num_rows = $values['total'];
						$qry2 = "DELETE FROM admin WHERE   $num_rows>'1'AND admin_id='$admin_id'";
						$result = mysqli_query($conn,$qry2) or die("query failed");

header("Location: viewuser.php");


						echo "SuccessFully Deleted";
						if(!$qry2){
							echo "Can not Deleted";
						}
					
?>



























