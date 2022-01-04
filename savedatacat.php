<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$type_id = $_POST['type_id'];
					$type = $_POST['type'];
		
					$qry = "SELECT * FROM room_type WHERE type_id = '$type_id'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						echo "<h1>Already Exist Record!</h1>";
					}
					else{
						$qry2 = "INSERT INTO room_type VALUES('','$type')";
						$result = mysqli_query($conn,$qry2) or die("query failed2");
						header("Location:Categories.php");
					}
?>
