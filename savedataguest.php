<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$room_no = $_POST['name'];
					$type = $_POST['email'];
					$status = $_POST['password'];
					$rent = $_POST['cn'];
					$facilities = $_POST['address'];
					$description = $_POST['optradio'];
					$city = $_POST['city'];
					
					
					$qry = "select * from guest where guest_email = '$type'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						echo "<h1>Already Exist Record!</h1>";
					}
					else{
						$qry2 = "INSERT INTO guest VALUES('','$room_no','$type','$status','$rent','$facilities','$description','$city')";
						$result = mysqli_query($conn,$qry2) or die("query failed2");
						header("Location:guest.php");
					}
?>
