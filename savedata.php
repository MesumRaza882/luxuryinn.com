<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					$room_no = $_POST['room_no'];
					$type = $_POST['type'];
					$status = $_POST['status'];
					$rent = $_POST['rent'];
					$facilities = $_POST['facilities'];
					$description = $_POST['description'];
					$f_stat = '0';
					$filename = $_FILES["uploadfile"]["name"];
					$tempname = $_FILES["uploadfile"]["tmp_name"];
					$folder = "room/".$filename;
					move_uploaded_file($tempname,$folder);

					$qry = "select * from room where room_no = '$room_no'";
					$result = mysqli_query($conn,$qry) or die("query failed");
					if(mysqli_num_rows($result)>0){
						echo "<h1>Already Exist Record!</h1>";
					}
					else{
						$qry2 = "INSERT INTO room VALUES('','$room_no','$type','$status','$f_stat','$folder','$rent','$facilities','$description')";
						$result = mysqli_query($conn,$qry2) or die("query failed2");
						header("Location:addrooms.php");
					}
?>
