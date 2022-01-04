<?php
					$conn = mysqli_connect("localhost","root","","hotel") or die("connection failed");
					
					$title = $_POST['s_title'];
					$description = $_POST['description'];

					$filename = $_FILES["uploadfile"]["name"];
					$tempname = $_FILES["uploadfile"]["tmp_name"];
					$folder = "room/".$filename;
					move_uploaded_file($tempname,$folder);

					
						$qry2 = "INSERT INTO services VALUES('','$title','$description','$folder')";
						$result = mysqli_query($conn,$qry2) or die("query failed2");
						header("Location:services.php");
					
?>
